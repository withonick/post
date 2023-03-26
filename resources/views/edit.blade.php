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

<form class="create-comment" style="width: 400px; margin-right: auto; margin-left: auto; margin-top: 50px;" action="{{route('comments.update', $comment)}}" method="post" enctype="multipart/form-data">
    <span style="margin-bottom: 10px">Редактировать комментарии: </span>
    @csrf
    @method('PUT')
    <label for="username">Имя:</label>
    <input type="text" name="username" value="{{$comment->username}}">
    <label for="text">Комментарии:</label>
    <textarea name="text">{{$comment->text}}</textarea>
    <div style="display: flex; justify-content: space-between">
        <input type="file" name="image" style="display: none" id="imageInput">
        <i class='bx bxs-image' id="imageBtn"></i>
        <button type="submit">Отправить</button>
    </div>
</form>

<script src="{{asset('js/script.js')}}"></script>

</body>
</html>
