<?php

namespace App\Traits;

use App\Http\Controllers\followController;
use app\Models\User;

trait followTrait
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollowing(User $user)
    {
        if($this->isFollowing($user))
        {
          return $this->unfollow($user);
        }
        return $this->follow($user);
    }

    public function follows()
    {
        return $this->belongsToMany(
                User::class,
                'follows',
                'user_id',
                'following_user_id'
            );
    }

    public function isFollowing(User $user)
    {
        //return $this->follows->contains($user);
        return $this->follows()
                ->where('following_user_id',$user->id)
                ->exists();
            }
}