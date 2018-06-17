<div>
    <h1>
        <?= $data['data']['post']->title ?>
    </h1>
    <div>
        <p>
            <?= $data['data']['post']->date ?> by <?= $data['data']['post']->create_by ?>
        </p>
        <div>
            <b class="d-inline-block mb-2 text-primary">
            <?= $data['data']['post']->category ?>
            </b>
        </div>
        <div>
            <?= $data['data']['post']->content ?>
        </div>
        <div>
            <img src="/assets/<?= $data['data']['post']->imgFile; ?>" alt="">
        </div>
    </div>
</div>