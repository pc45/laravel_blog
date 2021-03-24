<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Blog Entry</title>

    <link rel="stylesheet" href="/app.css">


</head>
<body>
    <article>
        <?= $post ?>
    </article>

    <a href="/">Back Home</a>
</body>
</html>
