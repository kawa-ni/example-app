<x-layout title="編集 | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => '#', 'label' => '編集']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"></x-element.breadcrumbs>
        <x-tweet.form.put :tweet="$tweet"></x-tweet.form.put>
    </x-layout.single>
</x-layout>

{{-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1.0,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>つぶやきアプリ</title>
</head>

<body>
    <h1>つぶやきを編集する</h1>
    <button type="button" onclick="history.back()">戻る</button>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
        <p style="color:green">{{ session('feedback.success') }}</p>
    @endif
    <p>つぶやき140字まで</p>
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <textarea id="tweet-content" type="text" name="tweet" placeholder="{{ $tweet->content }}"></textarea>
        @error('tweet')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        <input type="submit" value="編集">
    </form>
</body>

</html> --}}
