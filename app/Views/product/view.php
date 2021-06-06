<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/">Homepage<span class="sr-only">(current)</span></a>
        </li>
</nav>
<div class="container">
    <?php /** @var \Mvc\Models\Product $product */
    if (is_null($product)) : ?>
        <h1>Product not found</h1>
    <?php else : ?>
        <h1><?= $product->getName() ?></h1>
        <span><?= $product->getDescription() ?></span>
    <?php endif; ?>
</div>
</body>

</html>
