<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CATEGORIES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?scope=page&action=contact">CONTACT</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Product</button>
            </div>
        </div>
    </nav>
    <!--End navbar-->
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3">
                <section class="h-menu">
                    <div>
                        <h2>Category List</h2>
                        <ul>
                            <?php foreach ($categories as $key => $cate) : ?>
                                <?php if ($cate->getParent() == 0) : ?>
                                    <li> <?= $cate->getName() ?>
                                        <ul>
                                            <?php foreach ($categories as $key => $cate1) : ?>
                                                <?php if ($cate1->getParent() == $cate->getId()) : ?>
                                                    <li><?= $cate1->getName() ?> </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
                <!--End Category List-->
                <section class="color-filter">
                    <div>
                        <?php foreach ($colors as $key => $color) : ?>
                            <input type="checkbox" name="color" id=""><label for=""><?= $color->getName() ?></label>
                        <?php endforeach; ?>
                    </div>
                </section>
            </aside>

            <!--End Siderbar-->

            <main class="col-sm-12 col-md-9">
                <section class="content">
                    <div class="row">
                        <?php foreach ($products as $key => $pro) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 text-center">
                                <img src="<?= $pro->getImage() ?>" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $pro->getName() ?></h5>
                                    <p class="card-text">Price: <?= $pro->getPrice() ?>$</p>
                                    <a href="?scope=product&action=view&id=1" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </section>
            </main>
            <!--End content-->
        </div>

        <!--Open Model-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="add-form" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="pro-name" class="col-form-label">Product Name</label>
                                <input type="text" class="form-control" id="pro-name">
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">image</label>
                                <input type="file" id="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="description"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End Model-->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>

</html>