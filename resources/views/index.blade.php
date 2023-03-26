<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='{{asset('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css')}}' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <h2 style="text-align: center">Создать пост</h2>
    <form action="{{route('posts.store')}}" method="post" class="create-post" enctype="multipart/form-data">
        @csrf
            <label for="title">Заголовок: </label>
            <input type="text" name="title">
            <label for="text">Текст: </label>
            <textarea name="text" maxlength="280"></textarea>
            <div style="display: flex; justify-content: space-between">
                <input type="file" name="image" style="display: none" id="imageInput">
                <i class='bx bxs-image' id="imageBtn"></i>
                <button type="submit">Создать пост</button>
            </div>
    </form>
    <div class="posts">
    @foreach($posts as $post)
        <div class="post">
            <div>
                <a href="{{route('posts.show', $post->id)}}"><span>{{$post->title}}</span></a>
            </div>

          <p>{{$post->text}}</p>
            @if($post->image != 'noimg')
                <img src="{{asset($post->image)}}">
            @endif

            <a href="{{route('posts.show', $post)}}"><i class='bx bx-comment-edit' title="Оставить комментарии" style="margin-top: 15px; margin-left: 5px"></i></a>
        </div>

    @endforeach
</div>


    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
