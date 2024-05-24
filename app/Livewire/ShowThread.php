<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;

class ShowThread extends Component
{
    public Thread $thread;
    public $body='';

    public function postReply()
    {

        // dd($this->body);
        //validar
        $this->validate(['body'=>'required']);
        //crear
        auth()->user()->replies()->create([
            'thread_id'=> $this->thread->id,
            'body'=> $this->body
        ]);
        //refrescar
        $this->body='';
    }

    public function render()
    {
        return view('livewire.show-thread',[
            'replies'=> $this->thread
            ->replies()
            ->whereNull('reply_id')
            ->with('user', 'replies.user', 'replies.replies')
            ->get()
        ]);
    }
}
