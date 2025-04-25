<div class="max-w-2xl mx-auto mt-8 bg-white shadow-lg rounded-xl p-6 space-y-4">

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 font-semibold px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div>
        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">タイトル</label>
                <input type="text" wire:model="title"
                    class="w-full border-2 border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">内容</label>
                <textarea wire:model="content" rows="4"
                        class="w-full border-2 border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                @error('content')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-right">
                <button type="submit" 
                class="bg-gray-500 hover:bg-gray-800 text-white font-semibold px-6 py-2 rounded transition duration-200">
                保存
                </button>
            </div>
        </form>
    </div>

    {{-- 🔽 フォームの外に出して一覧表示 --}}
    <div class="max-w-2xl mx-auto mt-4">
        <livewire:memo-list />
    </div>

</div>