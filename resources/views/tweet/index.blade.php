<x-layout title="TOP | つぶやきアプリ">
	<x-layout.single>
		<h2 class="
			text-center 
			text-blue-500 
			text-4xl 
			font-bold 
			mt-8 
			mb-8">
			つぶやきアプリ
		</h2>
		<x-tweet.form.post></x-tweet.form.post>
		<x-tweet.list :tweets="$tweets"></x-tweet.list>
	</x-layout.single>
	{{-- <h1>ここ内容</h1> --}}
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
    <h1>つぶやきアプリ</h1>
@auth
	<form action="{{ route('logout') }}" method="post">
	@csrf
	<input type="submit" value="ログアウト">
	</form>
	<div>
		<h2>投稿フォーム</h2>
		@if(session('feedback.success'))
        	<p style="color:green">{{session('feedback.success')}}</p>
    	@endif
		<p>つぶやき140字まで</p>
		<form action="{{route('tweet.create')}}" method="POST">
			@csrf
			<textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea>
			@error('tweet')
			<p style="color:red;">{{ $message }}</p>
			@enderror
			<input type="submit" value="投稿">
		</form>
	</div>
@endauth
		@foreach($tweets as $tweet)
			<!-- おりたたみで要素追加 -->
			<details>
				<summary>{{$tweet->content}}by {{$tweet->user->name}}</summary>
				@if(\Illuminate\Support\Facades\Auth::id()===$tweet->user_id)
					<div>
						<a href="{{route('tweet.update.index',['tweetId'=>$tweet->id])}}">編集</a>
					</div>
					<form action="{{route('tweet.delete',['tweetId'=>$tweet->id])}}" method="post">
						@method('DELETE')
						@csrf
						<button type="submit">削除</button>
					</form>
				@else
					編集できません
				@endif
			</details>
		@endforeach
--}}
	{{--<p>名称{{ $name }}*/</p>
	<p>バージョン{{ $version }}</p>--}}
{{-- 
	<!-- <div>
	@foreach($tweets as $tweet)
	<p>{{$tweet->content}}</p>
	@endforeach
	</div> -->
	<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>  --}}
