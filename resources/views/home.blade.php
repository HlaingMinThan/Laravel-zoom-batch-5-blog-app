<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>Document</title>

    <link
        rel="stylesheet"
        href="/style.css"
    >

</head>

<body>

    <div class="container">
        <h1>
            <?= $title; ?>
        </h1>
        <?php foreach($blogs as $blog) : ?>
        <div class="blog-card">
            <h3>
                <a href="/blogs/<?= $blog->slug ?>">
                    <?= $blog->title;  ?>
                </a>
            </h3>
            <p>
                <?= $blog->intro; ?>
            </p>
            <p>published at -
                <?= $blog->created_at; ?>
            </p>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>