<!doctortype html>

<title>My blg</title>
<link rel="stylesheet" href="/app.css">
<body>

<title>Hello world</title>


<body>
<?php foreach ($posts as $post) : ?>

<article>
    <h1>
        <a href="/posts/<?= $post->slug;?>">
                <?= $post->title; ?>

        </a>
    </h1>
    <div>
            <?= $post->excerpt; ?>
    </div>

</article>
<?php endforeach; ?>
</body>
