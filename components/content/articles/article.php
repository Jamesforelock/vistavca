<?php
function Article($title, $description, $picturePath, $date) {
    echo '
    <div class="card mb-3 article">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="'.$picturePath.'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$title.'</h5>
                    <p class="card-text article__text">'.$description.'</p>
                    <p class="card-text article__text article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($date)).'</small></p>
                </div>
            </div>
        </div>
    </div>
    ';
}