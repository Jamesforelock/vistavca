<?php
$timestamp = date("YmdHis"); // Для автоматического обновления стилей
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="fontawesome/css/all.css?v=<?php echo $timestamp;?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css?v=<?php echo $timestamp;?>" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css?v=<?php echo $timestamp;?>">
    <title>Vistavca</title>
</head>
<body>
    <div class="container-fluid wrapper">
<header class="header">
    <div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="logo">
            <span class="logo__name">VISTAVCA</span>
        </div>
        <nav class="nav">
            <a href="#" class="nav__link">Stands</a>
            <a href="#" class="nav__link">Stand assistants</a>
            <a href="#" class="nav__link">Excursions</a>
            <a href="#" class="nav__link">Our visitors</a>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="auth.php">Login</a>
                    <!-- divider - разделитель, на случай дополнительных опций -->
                    <!-- <div class="dropdown-divider"></div> -->
                </div>
            </div>
        </nav>
    </div>
    </div>
</header>        <main class="content">
<div class="articles container">
    <h1>Articles</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla at corporis assumenda iusto nostrum adipisci temporibus corrupti similique expedita placeat aut sed necessitatibus praesentium, veritatis, dignissimos neque nisi consequatur?Earum nemo aperiam aspernatur sint assumenda ea. Nobis fugiat quia cupiditate odio eius hic earum, atque sit quas ut quae enim ad vero, omnis molestiae tempora rerum harum voluptas delectus.</p>
<div class="card mb-3 article">
    <div class="row no-gutters">
      <div class="col-md-4 article__imgContainer">
        <img src="./i/article.jpeg" class="card-img article__img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title article__title">Article</h5>
          <p class="card-text article__text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestiae mollitia numquam officiis. Alias aliquid asperiores beatae cum ea ipsa nostrum voluptatum? Assumenda at dicta non nostrum omnis sapiente ut!</span><span>Aliquam, error odio! Aspernatur possimus quas rem voluptatibus? Accusamus adipisci aliquid blanditiis corporis debitis dolores ducimus eos illo, incidunt inventore ipsam libero molestias nemo nostrum, nulla quas tenetur. Cupiditate, suscipit.</span></p>
          <p class="card-text article__text article__text_muted"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div><div class="card mb-3 article">
    <div class="row no-gutters">
      <div class="col-md-4 article__imgContainer">
        <img src="./i/article.jpeg" class="card-img article__img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title article__title">Article</h5>
          <p class="card-text article__text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestiae mollitia numquam officiis. Alias aliquid asperiores beatae cum ea ipsa nostrum voluptatum? Assumenda at dicta non nostrum omnis sapiente ut!</span><span>Aliquam, error odio! Aspernatur possimus quas rem voluptatibus? Accusamus adipisci aliquid blanditiis corporis debitis dolores ducimus eos illo, incidunt inventore ipsam libero molestias nemo nostrum, nulla quas tenetur. Cupiditate, suscipit.</span></p>
          <p class="card-text article__text article__text_muted"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div><div class="card mb-3 article">
    <div class="row no-gutters">
      <div class="col-md-4 article__imgContainer">
        <img src="./i/article.jpeg" class="card-img article__img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title article__title">Article</h5>
          <p class="card-text article__text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestiae mollitia numquam officiis. Alias aliquid asperiores beatae cum ea ipsa nostrum voluptatum? Assumenda at dicta non nostrum omnis sapiente ut!</span><span>Aliquam, error odio! Aspernatur possimus quas rem voluptatibus? Accusamus adipisci aliquid blanditiis corporis debitis dolores ducimus eos illo, incidunt inventore ipsam libero molestias nemo nostrum, nulla quas tenetur. Cupiditate, suscipit.</span></p>
          <p class="card-text article__text article__text_muted"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div><div class="card mb-3 article">
    <div class="row no-gutters">
      <div class="col-md-4 article__imgContainer">
        <img src="./i/article.jpeg" class="card-img article__img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title article__title">Article</h5>
          <p class="card-text article__text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestiae mollitia numquam officiis. Alias aliquid asperiores beatae cum ea ipsa nostrum voluptatum? Assumenda at dicta non nostrum omnis sapiente ut!</span><span>Aliquam, error odio! Aspernatur possimus quas rem voluptatibus? Accusamus adipisci aliquid blanditiis corporis debitis dolores ducimus eos illo, incidunt inventore ipsam libero molestias nemo nostrum, nulla quas tenetur. Cupiditate, suscipit.</span></p>
          <p class="card-text article__text article__text_muted"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div><div class="card mb-3 article">
    <div class="row no-gutters">
      <div class="col-md-4 article__imgContainer">
        <img src="./i/article.jpeg" class="card-img article__img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title article__title">Article</h5>
          <p class="card-text article__text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam molestiae mollitia numquam officiis. Alias aliquid asperiores beatae cum ea ipsa nostrum voluptatum? Assumenda at dicta non nostrum omnis sapiente ut!</span><span>Aliquam, error odio! Aspernatur possimus quas rem voluptatibus? Accusamus adipisci aliquid blanditiis corporis debitis dolores ducimus eos illo, incidunt inventore ipsam libero molestias nemo nostrum, nulla quas tenetur. Cupiditate, suscipit.</span></p>
          <p class="card-text article__text article__text_muted"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div><nav aria-label="Page navigation example" class="paginationContainer">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav></div>
</div>        </main>
    </div>
<footer class="footer">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col">
                <span class="footer__title">Title</span>
                <ul class="list">
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                </ul>
            </div>
            <div class="col">
                <span class="footer__title">Title</span>
                <ul class="list">
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                </ul>
            </div>
            <div class="col">
                <span class="footer__title">Title</span>
                <ul class="list">
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                    <li class="list__item">item</li>
                </ul>
            </div>
        </div>
        <div class="social">
            <a href="#" class="social__link"><i class="social__icon fab fa-vk"></i></a>
            <a href="#" class="social__link"><i class="social__icon fab fa-instagram"></i></a>
            <a href="#" class="social__link"><i class="social__icon fab fa-twitter"></i></a>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>