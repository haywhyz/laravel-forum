<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateDiscussionRequest;
use App\User;
use App\Reply;
class Discussion extends Model
{
   protected  $fillable = [
        'title', 'content', 'slug', 'channel_id', 'user_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function getRouteKeyname()
    {
        return 'slug';
    }
    // public function markAsBestReply(Reply $reply)
    // {
    //   return $this->update([
    //         'reply_id'=>$reply->id
    //     ]);
    // }
}
