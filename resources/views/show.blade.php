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
    <h2 style="margin-left: 450px"><a href="{{route('posts.index')}}">Все посты</a></h2>
    <div class="post" style="margin-bottom: 50px;">
        <div>
            <i class='bx bx-dots-vertical-rounded' style="float: right" onclick="openModal()"></i>
            <span>{{$post->title}}</span>
        </div>
        <p>{{$post->text}}</p>
        @if($post->image != 'noimg')
            <img src="{{asset($post->image)}}" alt="">
        @endif

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Редактировать пост</h2>
                <form action="{{route('posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-post">Удалить пост</button>
                </form>
                    <form action="{{route('posts.update', $post)}}" method="post" class="edit-modal" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="title">Заголовок:</label>
                        <input type="text" placeholder="Введите название" name="title" value="{{$post->title}}">
                        <label for="text">Текст:</label>
                        <textarea name="text">{{$post->text}}</textarea>
                        <div style="display: flex; justify-content: space-between">
                            <input type="file" name="image" style="display: none" id="imageInput">
                            <i class='bx bxs-image' id="imageBtn"></i>
                            <button type="submit">Обновить пост</button>
                        </div>
                    </form>
            </div>
        </div>


        <form class="create-comment" action="{{route('comments.store', $post)}}" method="post" enctype="multipart/form-data">
            <span style="margin-bottom: 10px">Оставить комментарии: </span>
                @csrf
                <label for="username">Имя:</label>
                <input type="text" name="username">
                <label for="text">Комментарии:</label>
                <textarea name="text"></textarea>
                <div style="display: flex; justify-content: space-between">
                    <input type="file" name="image" style="display: none" id="imageInput">
                    <i class='bx bxs-image' id="imageBtn"></i>
                    <button type="submit">Отправить</button>
            </div>
        </form>

        <div class="comments-section">
            <span>Все комментарии:</span>
            @foreach($post->comments as $comment)
               <div class="comment">
                   <div style="display: block">
                       <span>{{$comment->username}}</span><br>
                       <i style="font-weight: 0; font-size: 14px; cursor: auto; float: none">{{$comment->created_at->diffForHumans()}}</i>
                   </div>

                   <p>{{$comment->text}}</p>
                   @if($comment->image != 'noimg')
                       <img src="{{asset($comment->image)}}" alt="">
                   @endif
                   <div class="comment-links">
                       <form action="{{route('comments.delete', $comment)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button type="submit">Удалить комментарии</button>
                       </form>
                       <button><a href="{{route('comments.edit', $comment)}}">Редактировать комментарии</a></button>

                   </div>
               </div>
            @endforeach
        </div>
    </div>

    <script src="{{asset('js/script.js')}}"></script>

</body>
</html>
