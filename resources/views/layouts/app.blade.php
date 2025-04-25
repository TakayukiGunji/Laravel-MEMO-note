<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Livewire Layout</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-b from-neutral-200 to-neutral-50">
    {{ $slot }}

    @livewireScripts
    {{-- 絶対に下記は入れない！！ --}}
    <!-- {{-- <script src="https://unpkg.com/..."> はLaravelが内部処理として扱うことがあります --}} -->
</body>
</html>