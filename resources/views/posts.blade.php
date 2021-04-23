<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Blog home</title>

        <link rel="stylesheet" href="/app.css">


    </head>

<body>
    <?php foreach($posts as $post) : ?>
    <article>
        <h1>
            <a href="/posts/<?=$post->slug;?>">
                <?=$post->title;?>
            </a>
        </h1>
        <p>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            <?=$post->excerpt;?>
        </div>

    </article>
    <?php endforeach; ?>
</body>
</html>
