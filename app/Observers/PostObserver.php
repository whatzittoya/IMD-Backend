<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->created_by = Auth::user()->id;
        $post->updated_by = Auth::user()->id;
    }

    public function updating(Post $post)
    {
        $post->updated_by = Auth::user()->id;
    }
}
