<hr>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                Article manager
            </h3>
            <?php foreach ($data['data']['posts'] as $post): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title">
                        <a href="index.php?a=show&r=post&id=<?= $post->id; ?>"><?= $post->title; ?></a>
                    </h2>
                    <?php if (isset($_SESSION['user'])): ?>
                        <div>
                            | <a href="index.php?a=confirmDelete&r=post&id=<?= $post->id ?>">delete post</a> |
                        </div>
                    <?php endif; ?>
                    <b class="d-inline-block mb-2 text-primary">
                        <?= $post->category; ?>
                    </b>
                    <p class="blog-post-meta"><?= $post->date; ?> by <a href="index.php#"><?= $post->create_by; ?></a>
                    </p>
                    <p><?= $post->content; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <aside class="col-md-4 blog-sidebar">
            <div>
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    About manager
                </h3>
                <form action="index.php" method="POST">
                    <label for="category" id="category" class="d-inline-block mb-2 text-primary">
                        select the category
                    </label>
                    <select name="category" id="category">
                        <?php foreach($data['data']['categories'] as $category): ?>
                            <option value="<?= $category->name; ?>"><?= $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="about" id="about" class="d-inline-block mb-2 text-primary">
                        About
                    </label>
                    <br>
                    <textarea name="about" id="about" cols="30" rows="10"></textarea>
                    <br>
                    <input type="hidden" name="a" value="changeAbout">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="change about">
                </form>
            </div>
            <div>
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Catergories manager
                </h3>
                <form action="index.php" method="POST">
                    <label for="addCat" id="addCat" class="d-inline-block mb-2 text-primary">
                        Add categories
                    </label>
                    <br>
                    <input type="text" id="addCat" name="addCat">
                    <br>
                    <input type="hidden" name="a" value="addCat">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="Add category">
                </form>
                <form action="index.php" method="POST">
                    <label for="removeCat" id="removeCat" class="d-inline-block mb-2 text-primary">
                        Remove categories
                    </label>
                    <br>
                    <select name="removeCat" id="removeCat">
                        <option value=""></option>
                        <?php foreach($data['data']['categories'] as $category): ?>
                            <option value="<?= $category->name; ?>"><?= $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <input type="hidden" name="a" value="removeCat">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="delete category">
                </form>
            </div>
            <?php if($_SESSION['user']->id == 3): ?>
            <div>
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Admin manager
                </h3>
                <form action="index.php" method="POST">
                    <label for="toggleAdmin" id="toggleAdmin" class="d-inline-block mb-2 text-primary">
                        Add/remove admin
                    </label>
                    <br>
                    <select name="toggleAdmin" id="toggleAdmin">
                        <option value=""></option>
                        <?php foreach($data['data']['users'] as $user): ?>
                            <option value="<?= $user->name; ?>"><?= $user->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="choice" id="choice" class="d-inline-block mb-2 text-primary">
                        choice
                    </label>
                    <br>
                    <select name="choice" id="choice">
                        <option value="Admin">Admin</option>
                        <option value="notAdmin">Not admin</option>
                    </select>
                    <br>
                    <input type="hidden" name="a" value="toggleAdmin">
                    <input type="hidden" name="r" value="post">
                    <input type="submit" value="change">
                </form>
            </div>
            <?php endif; ?>
        </aside>
    </div>
</main>

