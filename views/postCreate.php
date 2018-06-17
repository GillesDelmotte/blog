<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="title" id="title">
        titre
    </label>
    <input type="text" id="title" name="title">
    <label for="category">
        category
    </label>
    <select name="category" id="category">

        <option value=""></option>
        <?php foreach($data['data']['categories'] as $category): ?>
            <option value="<?= $category->name; ?>"><?= $category->name; ?></option>
        <?php endforeach; ?>

        <!--<option value="World">World</option>
        <option value="U.S">U.S</option>
        <option value="Technologie">Technologie</option>
        <option value="Design">Design</option>
        <option value="Culture">Culture</option>
        <option value="Business">Business</option>
        <option value="Politics">Politics</option>
        <option value="Opinion">Opinion</option>
        <option value="Science">Science</option>
        <option value="Health">Health</option>
        <option value="Style">style</option>
        <option value="Travel">Travel</option>-->
    </select>
    <br>
    <label for="desc" id="desc">
        description
    </label>
    <textarea name="desc" id="desc" cols="50" rows="5"></textarea>
    <br>
    <label for="contenu" id="content">
        contenu
    </label>
    <textarea name="content" id="contenu" cols="100" rows="10"></textarea>
    <br>
    <input type="hidden" name="a" value="store">
    <input type="hidden" name="r" value="post">
    <input type="submit" value="créer cet article">
</form>