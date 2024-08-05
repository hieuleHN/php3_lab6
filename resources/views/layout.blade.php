<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("tile")</title>
</head>
<body>
    <header>Header</header>
    <nav>Navigator
        @foreach ($theloai as $book)
    

        <a href="{{route("theloai", $book->id)}}">
            <h3>{{$book->name}}</h3>
        </a>
    
@endforeach
    </nav>
    <article>
        @yield("content")
    </article>
    <aside>Aside</aside>
    <footer>Footer</footer>
</body>
</html>