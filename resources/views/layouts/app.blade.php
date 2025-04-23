<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Livewire Layout</title>
    @livewireStyles
</head>
<body>
    {{ $slot }}

    @livewireScripts
    <script src="https://unpkg.com/@livewire/livewire@3.x/dist/livewire.min.js"></script>
</body>
</html>
