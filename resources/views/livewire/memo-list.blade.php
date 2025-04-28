<div class="space-y-4"> {{-- ← 全体を包む！！ --}}
    <div class="mb-4">
        <input type="text" wire:model.debounce.300ms="search"
               placeholder="検索ワードを入力"
               class="w-full border border-gray-400 px-3 py-2 rounded shadow-sm" />
    </div>
    
    <div class="max-w-2xl mx-auto mt-6 space-y-4">
        <h3 class="text-xl font-bold text-gray-700">保存されたメモ一覧</h3>
    
        @foreach ($memos as $memo)
            <div class="bg-white border-2 border-gray-300 rounded-xl p-4 shadow">
                @if ($editId === $memo->id)
                    <input type="text" wire:model="editTitle" class="border border-gray-600 p-2 w-full rounded mb-2">
                    <textarea wire:model="editContent" class="border p-2 w-full rounded mb-2"></textarea>
                    <div class="flex gap-2">
                        <button wire:click="update" class="bg-blue-500 text-white px-4 py-1 rounded">更新</button>
                        <button wire:click="$set('editId', null)" class="bg-gray-300 px-4 py-1 rounded">キャンセル</button>
                    </div>
                @else
                    <h4 class="font-semibold text-lg">{{ $memo->title }}</h4>
                    <p class="text-gray-600">{{ $memo->content }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $memo->created_at->diffForHumans() }}
                    </p>
                    <div class="flex gap-2 mt-2">
                        <button wire:click="edit({{ $memo->id }})" class="text-sm text-blue-600 hover:underline">編集</button>
                        <button wire:click="delete({{ $memo->id }})" class="text-sm text-red-600 hover:underline">削除</button>
                    </div>
                @endif
            </div>
        @endforeach
    
        @error('editTitle')
            <div style="color:red;">{{ $message }}</div> @enderror
        @error('editContent')
            <div style="color:red;">{{ $message }}</div> @enderror
    
        @if ($memos->isEmpty())
            <p class="text-gray-500">メモがまだありません。</p>
        @endif
    
        <h1 class="text-3xl text-blue-500 font-bold">Tailwind効いてるかテスト</h1>
    
    </div>
</div>
