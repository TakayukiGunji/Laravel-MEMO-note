<div>
    <form>
        <x-input class="w-full" wire:model="name" />
        

        <ul>
            <li><x-checkbox />GunG</li>
            <li><x-checkbox />Hyaku</li>
            <li><x-checkbox />Shiori</li>
            <li><x-checkbox id="label" />Maki</li>
        </ul>

        <x-label value="WALK" for="label" />

        {{ $name }}

    </form>

    <x-danger-button wire:click="save">保存</x-danger-button>

    @foreach ( $members as $member ) 
        <p>{{ $member -> name }}</p>
    @endforeach

</div>
