<hr>
<?php foreach($data['data']['posts'] as $post): ?>
    <div class="blog-post">
        <h2 class="blog-post-title">
            <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
        </h2>
        <?php if(isset($_SESSION['user'])): ?>
            <div>
                <a href="index.php?a=edit&r=post&id=<?= $post->id?>">modify post</a> |
                <a href="index.php?a=confirmDelete&r=post&id=<?= $post->id?>">delete post</a>
            </div>
        <?php endif; ?>
        <b class="d-inline-block mb-2 text-primary">
            <?= $post->category; ?>
        </b>
        <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?= $post->create_by; ?></a></p>
        <p><?= $post->content; ?></p>
    </div>
    <hr>
<?php endforeach;?>

