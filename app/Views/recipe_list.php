<!DOCTYPE html>
<html lang="en">
<head>
<title><?= esc($page_title) ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous">

<style type="text/css">
.title
{
    padding: 3rem 1.5rem;
}

article
{
    padding: 1.5rem 1.5rem;
}
</style>

</head>

<body>

<main role="main" class="container">
    <div class="title">
        <h1>
            <?= esc($page_title) ?>
            <small class="text-muted"><?= esc($page_subtitle) ?></small>
        </h1>
    </div>

    <div class="container">

<?php foreach ($recipes as $recipe): ?>
        <article>
            <h3><?= esc($recipe['title']) ?></h3>
            <h5>Ingredients</h5>
            <ul>
            <?php foreach ($recipe['ingredients'] as $ingredient): ?>
                <li><?= esc($ingredient) ?></li>
            <?php endforeach; ?>
            </ul>
            <h5>Instructions</h5>
            <p><?= esc($recipe['instructions']) ?></p>
        </article>
        <hr>
<?php endforeach; ?>

    </div>

</main>

<footer>
    <p class="text-center">&copy; <?= date('Y') ?> My recipe website</p>
</footer>

</body>
</html>