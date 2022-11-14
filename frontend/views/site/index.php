<?php

/** @var yii\web\View $this */
use frontend\assets\AppAsset;
$this->title = 'home';
AppAsset::register($this);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <h6 class="navbar-brand" >Kun.uz</h6>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Bo'limlar
          </a>
          <ul class="dropdown-menu">
            <?php
            foreach($ctg as $key){
            echo '<li><a class="dropdown-item" href="/ctg/'.$key['id'].'">'.$key['title'].'</a></li>';
        }
            ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" action='/file/search' method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- corusel -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <?php
    for($img=1; $img<7;$img++){
echo "<div class='carousel-item active'> <img src='img/news-500x280-$img.jpg' class='d-block w-100'   ></div>";
}
    ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- card -->
<div class='row'>

<?php
foreach($articles as  $item){
echo '<div class="card" style="width: 18rem; margin:10px; padding:0;">'.
  '<img src='.$item['image_adress'].' class="card-img-top" style=" width: 257px;
    height: 241px;
    margin: 6px;
    padding-right: 72px;
    padding: 15px;  >'.
  '<div class="card-body">
    <h5 class="card-title">'.$item['title'].'</h5>
    <p class="card-text">'.substr($item['full_text_article'], 0, 50).'</p>
    <a href=/detail/'.$item['id'].' class="btn btn-primary">Batafsil</a>
  </div>

';}
?>

</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>