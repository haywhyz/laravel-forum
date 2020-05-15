<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CreateDiscussionRequest;
use App\Discussion;
use App\Reply;
use App\Notifications\replyMarkAsBestReply;

class DiscussionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('discussion.index')->with('discussions', Discussion::all());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('discussion.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateDiscussionRequest $request)
    {
        
        // $this->validate(request(),[
            //     'title'=>'required',
            //     'content'=>'required',
            //     'channel_id'=>'required',
            // ]);
            
            $data = request()->all();
            $discussion= new Discussion;
            
            
            $discussion->title = $data['title'];
            $discussion->content = $data['content'];
            $discussion->slug = $data['title'];
            $discussion->channel_id = $data['channel_id'];
            $discussion->user_id = auth()->user()->id;
            
            
            $discussion->save();
            
            session()->flash('success', 'discussion succesffully added');
            return view('/discussion');
            
        }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show(Discussion $discussion)
        {
            return view('discussion.show',
            [
                'discussion'=> $discussion
                ]);
            }
            
            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                //
            }
            
            /**
            * Update the specified resource in storage.
            *
            * @param  \Illuminate\Http\Request  $request
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function update(Request $request, $id)
            {
                //
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                //
            }
            
            public function reply(Discussion $discussion, Reply $reply)
            {
                //   dd( $discussion->markAsBestReply($reply));
                
                
                $discussion->reply_id = $reply->id;
                $discussion->save();

                $reply->owner->notify(new replyMarkAsBestReply($reply->discussion));
                session()->flash('success', 'marked as best reply');
                return redirect()->back();
            }
        }
        