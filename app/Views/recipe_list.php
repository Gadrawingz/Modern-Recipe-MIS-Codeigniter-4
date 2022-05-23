<?php
/**
 * @var string $page_title                       The page title (automatically created by CI from the $data array)
 * @var string $page_subtitle                    The page subtitle (automatically created by CI from the $data array)
 * @var array $search                            Search criteria
 * @var array $recipes                           List of recipes (automatically created by CI from the $data array)
 * @var App\Entities\Recipe $recipe              One recipe (created by the foreach instruction)
 * @var \CodeIgniter\Pager\PagerRenderer $pager  Pagination class instance
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

        <h3>List of recipe</h3>
        <div class="my-3">
            <?= form_open('/', ['class' => 'form-inline']) ?>
                <?= form_input('search_text',
                               $search['text'] ?? '',
                               ['class' => 'form-control my-1 mr-3', 'placeholder' => "Text"]) ?>

                <?= form_label("Number per page", 'search_nb_per_page', ['class' => 'my-1 mr-2']) ?>

                <?= form_input('search_nb_per_page',
                               $search['nb_per_page'] ?? '',
                               ['id' => 'search_nb_per_page', 'class' => 'form-control my-1 mr-3', 'style' => 'width:70px']) ?>

                <?= form_submit('search_submit',
                                "Search",
                                ['class' => 'btn btn-outline-primary my-1']) ?>
            <?= form_close() ?>
        </div>

        <ul>
<?php foreach ($recipes as $recipe): ?>
            <li><?= anchor('recipe/' . $recipe->slug, $recipe->title) ?></li>
<?php endforeach; ?>
        </ul>

        <?= $pager->links('default', 'bootstrap') ?>

    </div>

</main>

<footer>
    <p class="text-center">&copy; 2020 My recipe website</p>
</footer>

</body>
</html>
