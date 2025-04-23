<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoForm extends Component
{
    public $title = '';
    public $content = '';

    protected $rules = [
        'title' => 'required|string|max:100',
        'content' => 'required|string',
    ];

    public function save()
    {
        $this->validate();

        Memo::create([
            'user_id' => Auth::id(), // ログインユーザーのID
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);

        session()->flash('message', 'メモを保存しました！');
    }

    public function render()
    {
        return view('livewire.memo-form');
    }
}
