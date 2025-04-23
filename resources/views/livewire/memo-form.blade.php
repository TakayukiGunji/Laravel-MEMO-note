<div>
    @if (session()->has('message'))
        <div style="color: green; font-weight: bold;">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <div>
            <label>タイトル</label><br>
            <input type="text" wire:model="title">
            @error('title') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-top: 10px;">
            <label>内容</label><br>
            <textarea wire:model="content"></textarea>
            @error('content') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <button type="submit" style="margin-top: 10px;">保存</button>
    </form>
</div>