<?php
/**
 * @var string $page_title           The page title (automatically created by CI from the $data array)
 * @var string $page_subtitle        The page subtitle (automatically created by CI from the $data array)
 * @var array  $recipes              List of recipes (automatically created by CI from the $data array)
 * @var App\Entities\Recipe $recipe  One recipe (created by the foreach instruction)
 */
?>
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

    <h3>List of recipe by id</h3>
    <ul>
<?php foreach ($recipes as $recipe): ?>
          <li><?= anchor('recipe/' . $recipe->id, $recipe->title) ?></li>
<?php endforeach; ?>
    </ul>

    <h3>List of recipe by slug</h3>
    <ul>
<?php foreach ($recipes as $recipe): ?>
          <li><?= anchor('recipe/' . $recipe->slug, $recipe->title) ?></li>
<?php endforeach; ?>
    </ul>

    </div>

</main>


<footer>
    <p class="text-center">&copy; 2020 My recipe website</p>
</footer>

</body>
</html>