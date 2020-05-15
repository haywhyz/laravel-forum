@extends('layouts.app')

@section('content')

@foreach ($discussions as $discussion )
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
                </div>
            </div>
            @endforeach
     {{-- {{$discussions->links()}} --}}
@endsection

