<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/main.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand text-light" href="?scope=page&action=home">LOGO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="?scope=page&action=home">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link text-light" href="?scope=page&action=contact">CONTACT</a>
                    </li>
                </ul>
                <form action="">
                    <input type="text" name="" id="keyword" class="form-control" placeholder="Serch product..">
                </form>
            </div>
        </div>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Product</button>
    </nav>
    <!--Message-->
    <!--End navbar-->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./public/images/banner1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./public/images/banner2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./public/images/banner3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--End carosel-->
    <div class="container">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger container text-center" role="alert">
                    Add Product failed!
                <ul>
                    <?php foreach($error as $item): ?>
                        <li class="" role="alert">
                            <?= $item ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['message'])) : ?>
            <div class="alert alert-success container text-center" role="alert">
                <?= $_GET['message'] ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <aside class="col-sm-12 col-md-3 shadow p-3">
                <section class="h-menu border-bottom">
                    <div>
                        <h3 class="text-center bg-dark text-white mt-4">CATEGORY LIST</h3>
                        <ul>
                            <?php foreach ($categories as $key => $cate) : ?>
                                <?php if ($cate->getParent() == 0) : ?>
                                    
                                    <li> <a href="?scope=page&action=home&cate_id=<?= $cate->getId()?>"><?= $cate->getName() ?></a>
                                        <ul>
                                            <?php foreach ($categories as $key => $cate1) : ?>
                                                <?php if ($cate1->getParent() == $cate->getId()) : ?>
                                                    <li><a href="?scope=page&action=home&cate_id=<?= $cate1->getId()?>"><?= $cate1->getName() ?></a>
                                                        <ul>
                                                        <?php foreach ($categories as $key => $cate2) : ?>                                                            
                                                            <?php if ($cate2->getParent() == $cate1->getId()) : ?>
                                                                <li><a href="?scope=page&action=home&cate_id=<?= $cate2->getId()?>"><?= $cate2->getName() ?></a> </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        </ul>
                                                    </li>
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
                    <h3 class="text-center bg-dark text-white mt-4">SORT BY COLOR</h3>
                    <div class="p-3">
                        <div >
                            <form action="" id="myform" class="row">
                                <?php foreach ($colors as $key => $color) : ?>
                                    <div class="col-3 d-flex align-items-center">
                                    <input type="checkbox" name="color[]" value="<?=$color->getId()?>"><label class="border p-3" for="" style=" background-color: <?= $color->getName() ?>"></label>
                                    </div>
                                <?php endforeach; ?>
                            </form>
                            
                        </div>
                    </div>
                </section>
            </aside>

            <!--End Siderbar-->

            <main class="col-sm-12 col-md-9">
                <section class="content mt-4 mb-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-4"><hr></div>
                        <h2 class=" col-4 title text-center"><?= $title ?></h2>
                        <div class="col-4"><hr></div>
                    </div>
                    <div class="row" id="product">
                        <?php foreach ($products as $key => $pro) : ?>
                            <div class="card col-sm-12 col-md-6 col-lg-4 text-center mt-2 border-0">
                                <a href="?scope=product&action=view&id=<?= $pro->getId() ?>">
                                    <img src="<?= $pro->getImage() ?>" class="card-img-top">
                                </a>
                                <div class="card-body">
                                    <a href="?scope=product&action=view&id=<?= $pro->getId() ?>">
                                     <h5 class="card-title"><?= $pro->getName() ?></h5>
                                    </a>
                                    <p class="card-text">Price: <?= $pro->getPrice() ?>$</p>
                                    <a href="?scope=product&action=view&id=<?= $pro->getId() ?>" class="btn btn-dark rounded-pill shadow mb-5">DETAIL</a>
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
                        <form method="POST" id="add-form" enctype="multipart/form-data" action="?scope=product&action=store">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <span class="text-danger" id="nameError"></span>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">image</label>
                                <input type="file" id="image" name="image" class="form-control" required>
                                <span class="text-danger" id="imageError"></span>
                            </div>
                            <div class="form-group">
                                <label for="price" class="col-form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                                <span class="text-danger" id="priceError"></span>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                                <span class="text-danger" id="descriptionError"></span>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Category:</label>
                                <br>
                                <?php foreach ($categories as $cate) : ?>
                                    <label for=""><?= $cate->getName() ?></label>
                                    <input type="checkbox" name="cate_id[]" value="<?= $cate->getId() ?>">
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Color:</label>
                                <br>
                                <?php foreach ($colors as $color) : ?>
                                    <label for="" style="background-color: <?= $color->getName() ?>"><?= $color->getName() ?></label>
                                    <input type="checkbox" name="color_id[]" value="<?= $color->getId() ?>">
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--End Model-->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./public/js/main.js"></script>
</body>

</html>