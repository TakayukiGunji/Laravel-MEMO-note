<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class MemoList extends Component
{
    public $memos;

    public function mount()
        {
            if (!Auth::check()) {
                $this->memos = collect(); // 空のコレクション
                return;
            }

            $this->fetchMemos();
        }

    public function fetchMemos()
    {
        $this->memos = Memo::where('user_id', Auth::id())
                           ->latest()
                           ->get();
    }

    public $editId = null;
    public $editTitle = '';
    public $editContent = '';

    public function edit($id)
    {
        $memo = Memo::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $this->editId = $memo->id;
        $this->editTitle = $memo->title;
        $this->editContent = $memo->content;
    }

    public function update()
    {
        $this->validate([
            'editTitle' => 'required|string|max:100',
            'editContent' => 'required|string',
        ]);

        Memo::where('id', $this->editId)
            ->where('user_id', Auth::id())
            ->update([
                'title' => $this->editTitle,
                'content' => $this->editContent,
            ]);

        $this->reset(['editId', 'editTitle', 'editContent']);
        $this->fetchMemos(); // 一覧更新
    }

    public function delete($id)
    {
        Memo::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        $this->fetchMemos(); // 再読込
    }

    public $search = '';

    public function render()
    {
        \Log::debug('MemoList レンダリング開始');
        return view('livewire.memo-list');
    }
}

