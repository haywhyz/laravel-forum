@extends('layouts.app')

@section('content')


            <div class="card">
                <div class="card-header">Create Discussion</div>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item">
                        {{$error}}
                        </li>
                    @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body">
                   <form action="{{route('discussion.store')}}" method="POST">
                      @csrf
                       <div class="form-group">
                           <label for="title">title</label>
                           <input type="text" name="title" value="" class="form-control">
                       </div>

                       <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="" cols="5" rows="5"></textarea>
                    </div>

                    {{-- <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" value="" class="form-control">
                    </div> --}}
                    
                    <div class="form-group">
                        <select name="channel_id" id="" class="form-control">
                            <option value="">--select - channel--</option>
                            @foreach ($channels as $channel)
                           
                            <option value="{{$channel->id }}" >{{$channel->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class=" btn btn-info form-control"> Add Discussion</button>
                        {{-- <input type="submit" name="submit" value="Add Discussion" class=" btn btn-info form-control"> --}}
                    </div>


                   </form>
                </div>
            </div>
     
@endsection
