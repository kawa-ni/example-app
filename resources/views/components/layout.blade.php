<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width,user-scalable=no,initial-scale=1.0,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>{{$title ?? 'つぶやきアプリ'}}</title>
        {{-- @pushで指定したコードが追記される。特定の場所のみ利かせたいときにつかう --}}
        @stack('css')

</head>
<body class="bg-gray-50">
	{{$slot}}
</body>

</html>
