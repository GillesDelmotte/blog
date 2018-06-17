<div>
    <h1>
        Suppression de l'article
    </h1>
    <div>
        <p>
            <?= $data['data']['post']->title ?>
        </p>
    </div>
    <div>
        <p>
            <?= $data['data']['post']->content ?>
        </p>
    </div>
</div>
<div>
    <form action="index.php" method="POST">
            <input type="hidden" name="a" value="destroy">
            <input type="hidden" name="r" value="post">
            <input type="hidden" name="id" value="<?= $data['data']['post']->id ?>">
            <input type="submit" value="Oui, je veux supprimer cet article">
        </form>
    <a href="index.php?a=adminPage&r=post">non, je ne veux pas le supprimer</a>
    </form>
</div>