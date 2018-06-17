<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <?php if (!isset($_SESSION['user'])): ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?a=register&r=auth">Subscribe</a>
                    <?php else: ?>
                        <a class="btn btn-sm btn-outline-secondary" href="index.php?a=create&r=post">
                            create post
                        </a>
                        <a class="btn btn-sm btn-outline-secondary" href="index.php?a=userPage&r=post">
                            <?= $_SESSION['user']->name; ?>'s page
                        </a>
                    <?php if($_SESSION['user']->admin == 'Admin'): ?>
                            <a class="btn btn-sm btn-outline-secondary" href="index.php?a=adminPage&r=post">
                                admin
                            </a>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="index.php">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="index.php#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg>
                </a>
                <?php if (!isset($_SESSION['user'])): ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?a=getLoginForm&r=auth">Sign in</a>
                <?php else: ?>
                    <a class="btn btn-sm btn-outline-secondary" href="index.php?a=logOut&r=auth">
                        Sign out
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">

            <?php foreach($data['data']['categories'] as $category): ?>
                <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=<?= $category->name; ?>"><?= $category->name; ?></a>
            <?php endforeach; ?>

            <!--<a class="p-2 text-muted" href="index.php?a=category&r=post&cat=world">World</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=U.S">U.S.</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=technologie">Technology</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=design">Design</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=culture">Culture</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=business">Business</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=politics">Politics</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=opinion">Opinion</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=science">Science</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=health">Health</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=style">Style</a>
            <a class="p-2 text-muted" href="index.php?a=category&r=post&cat=travel">Travel</a>-->
        </nav>
    </div>
    <?php
    include $data['view']
    ?>
    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                    href="https://twitter.com/mdo">@mdo</a>.</p>

    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="./js/jquery-slim.min.js"><\/script>')</script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/holder.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
</body>
</html>
