<?php
require "dbConnector.php";
$query_getExcursion = 'SELECT * FROM article WHERE article.type = "Excursion" ORDER BY article.ID DESC';
$excursions = mysqli_query($conn, $query_getExcursion);

while($row = mysqli_fetch_array($excursions)) {
    echo ' <div class="card mb-3 article">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="./assets/i/articles/'.$row['Picture'].'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$row['Name'].'</h5>
                    <p class="card-text article__text">'.$row['Description'].'</p>
                    <p class="card-text article__text article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($row['Date'])).'</small></p>
                </div>
            </div>
        </div>
    </div>';
}


