<?php
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
          <a class="nav-link active" aria-current="page" href="http://yii/">Home</a>
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
      <form class="d-flex" role="search"  action='/file/search' method='get'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name='search' >
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="card mb-3" style="">
  <img src= "/<?=$article['image_adress']?>" class="card-img-top" style='height: 557px;'>
  <div class="card-body">
    <h5 class="card-title"><?php echo $article['title']?></h5>
    <p class="card-text"><?php echo $article['full_text_article']?></p>
    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>