<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <?php if(!empty($data['data']['articles'])): ?>
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic"><?= $data['data']['articles'][0]->title; ?></h1>
        <p class="lead my-3"><?=$data['data']['articles'][0]->description; ?></p>
        <p class="lead mb-0"><a href="index.php?a=show&r=post&id=<?= $data['data']['articles'][0]->id ?>" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
    <?php else: ?>
        <h1 class="display-4 font-italic">There are no articles</h1>
    <?php endif; ?>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <?php if(!empty($data['data']['articles'])): ?>
                <strong class="d-inline-block mb-2 text-primary"><?= $data['data']['articles'][1]->category; ?></strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="index.php#"><?= $data['data']['articles'][1]->title; ?></a>
                </h3>
                <div class="mb-1 text-muted"><?= $data['data']['articles'][1]->date; ?></div>
                <p class="card-text mb-auto"><?= $data['data']['articles'][1]->description; ?></p>
                <a href="index.php?a=show&r=post&id=<?= $data['data']['articles'][1]->id ?>">Continue reading</a>
                <?php else: ?>
                    <h3 class="display-4 font-italic">There are no articles</h3>
                <?php endif; ?>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <?php if(!empty($data['data']['articles'])): ?>
                <strong class="d-inline-block mb-2 text-primary"><?= $data['data']['articles'][2]->category; ?></strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="index.php#"><?= $data['data']['articles'][2]->title; ?></a>
                </h3>
                <div class="mb-1 text-muted"><?= $data['data']['articles'][2]->date; ?></div>
                <p class="card-text mb-auto"><?= $data['data']['articles'][2]->description; ?></p>
                <a href="index.php?a=show&r=post&id=<?= $data['data']['articles'][2]->id ?>">Continue reading</a>
                <?php else: ?>
                    <h3 class="display-4 font-italic">There are no articles</h3>
                <?php endif; ?>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
    </div>
</div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                <?= $data['data']['pageTitle']?>
            </h3>
            <?php if(!empty($data['data']['posts'])): ?>
            <?php foreach($data['data']['posts'] as $post): ?>
            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                </h2>
                <b class="d-inline-block mb-2 text-primary">
                    <?= $post->category; ?>
                </b>
                <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?= $post->create_by; ?></a></p>
                <p><?= $post->content; ?></p>
            </div>
                <hr>
            <?php endforeach;?>
            <?php else: ?>
                <h3 class="display-4 font-italic">There are no articles</h3>
            <?php endif; ?>




        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-3 mb-3 bg-light rounded">
                <h4 class="font-italic">About</h4>
                <?php if(empty($data['data']['about']) || $data['data']['about'] === ""): ?>
                    <p class="mb-0">Voici le blog de Gilles vous pouvez y retrouver pleins d'articles concernant pleins de categories en tous genre</p>
                <?php else: ?>
                    <p class="mb-0"><?= $data['data']['about']->about;?></p>
                <?php endif; ?>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Archives</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="index.php?a=archive&r=post&month=12&year=2018">December 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=11&year=2018">November 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=10&year=2018">October 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=9&year=2018">September 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=8&year=2018">August 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=7&year=2018">July 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=6&year=2018">June 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=5&year=2018">May 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=4&year=2018">April 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=3&year=2018">March 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=2&year=2018">February 2018</a></li>
                    <li><a href="index.php?a=archive&r=post&month=1&year=2018">January 2018</a></li>
                </ol>
            </div>

            <div class="p-3">
                <h4 class="font-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="index.php#">GitHub</a></li>
                    <li><a href="index.php#">Twitter</a></li>
                    <li><a href="index.php#">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
