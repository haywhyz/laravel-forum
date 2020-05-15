

@extends('layouts.app')

@section('content')


            <div class="card">
                <div class="card-header">Notifications </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($notifications  as $notifications)
                            
                        @endforeach
                        <li class="list-group-item">
                           @if($notifications->type === 'App\Notifications\NewReplyAdded')
                           A new message has been discussion
                            <strong>
                             {{ $notifications->data['discussion']['title'] }}
                            </strong>
                           <a href="{{route('discussion.show', $notifications->data['discussion']['slug']) }}" class="btn btn-primary">
                               view Discussion
                           </a>
                           @endif

                           @if($notifications->type === 'App\Notifications\replyMarkAsBestReply')
                           your reply to discussion h
                            <strong>
                             {{ $notifications->data['discussion']['title'] }}
                            </strong> was marked as best reply
                           <a href="{{route('discussion.show', $notifications->data['discussion']['slug']) }}" class="btn btn-primary">
                               view Discussion
                           </a>
                           @endif
                        </li>

                        
                    </ul>

                   
                </div>
            </div>
     
@endsection
