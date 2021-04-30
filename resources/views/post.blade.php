<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Blog home</title>

    <link rel="stylesheet" href="/app.css">


</head>

<body>

    <article>
        <h1><?=$post->title;?></h1>

        <p>
            <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>

        <div>
            <?=$post->body;?>
        </div>

    </article>

    <a href="/">Back Home</a>

</body>
</html>
