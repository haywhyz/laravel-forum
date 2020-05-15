@extends('layouts.app')

@section('content')


<div class="card">
    
    
    
    <div class="card-header">
        
        <div class="d-flex justify-content-between"> 
            <div>
                <Span>{{$discussion->author->name}}</Span>
            </div>
            <div>
                <a href="{{route('discussion.show', $discussion->slug)}}" class="btn btn-info sm">view </a>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="text-center">
            <strong>  {{$discussion->title}} </strong>
        </div>
        
        <hr>
        
        {{$discussion->content}}

        @if ($discussion->bestReply)
        <div class="card bg-success my-5">
            <div class="card-header">
                Best reply
            </div>
            <div class="card-body">
                {{$discussion->bestReply->content}}
            </div>
        </div>

        @endif

    </div>
</div>
@foreach ($discussion->replies()->paginate(2) as $reply)

<div class="card mt-4">
    <div class="card-header">
        <div class="d-flex justify-content-between"> 
            <div>
                {{$reply->owner->name}}
            </div>
            @auth
            @if(auth()->user()->id === $discussion->user_id)
            <div>
                
                <form action="{{route('discussion.best-reply', ['discussion'=>$discussion->slug, 'reply'=>$reply->id])}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Mark as Best reply</button>
                </form>
               
            </div>
            @endif

            @endauth
            
        </div>
    </div>
    <div class="card-body">
        {{$reply->content}}
    </div>
    
</div>
@endforeach
{{$discussion->replies()->paginate(2)->links()}}

@auth
<div class="card-body">
    <div class="card-header"> Add a reply </div>
    <form action="{{route('replies.store', $discussion->slug)}}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" id="content" cols="2" rows="2" class="form-control"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" class="form-control mt-2" value="add reply">
    </form>
</div>
@else
<a href="{{route('login')}}" class="btn btn-primary"> Login to add reply</a>
@endauth


@endsection

