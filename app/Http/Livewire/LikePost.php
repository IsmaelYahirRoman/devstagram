<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
            $this->likes--; // Disminuir la cantidad de likes
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++; // Aumentar la cantidad de likes
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
