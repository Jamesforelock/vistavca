<?php
// Компонент одной статьи
function Article($id, $title, $description, $picturePath, $date) {
    $description = strTrim($description); // Обрезка описания статьи
    if(!$picturePath) $picturePath = "assets/i/noPhoto_a.png";
    echo '
    <div class="card mb-3 article" id="'.$id.'">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="'.$picturePath.'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$title.'</h5>
                    <hr>
                    <p class="card-text article__text">'.$description.'</p>
                    <p class="card-text article__date article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($date)).'</small></p>
                </div>
            </div>
        </div>
    </div>
    ';
}

// Компонент одной экскурсии
function Excursion($id, $title, $description, $picturePath, $date, $isAdded) {
    $description = strTrim($description); // Обрезка описания экскурсии
    if($isAdded) { // Если экскурсия у посетителя есть
        $addAndDeleteBtn = '<i class="fas fa-minus-circle article__btn article__btn_delete" onclick="removeExcursion('.$id.')"></i>';
    }
    else { // Если экскурсии у посетителя нет
        $addAndDeleteBtn = '<i class="fa fa-plus article__btn article__btn_add" onclick="addExcursion('.$id.')"></i>';
    }
    echo '
    <div class="card mb-3 article '.($isAdded ? "article_added" : "").'" id="'.$id.'">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="'.$picturePath.'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$title.' '.$addAndDeleteBtn.'</h5>
                    <hr>
                    <p class="card-text article__text">'.$description.'</p>
                    <p class="card-text article__date article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($date)).'</small></p>
                </div>
            </div>
        </div>
    </div>
    ';
}

// Обрезает текст статьи до 350 первых символов, если его длина больше 350 символов и добавляет ссылку Read more
function strTrim($str) {
    if(strlen($str) > 350) {
        $substr = mb_substr($str, 0, 350, "UTF-8");
        $str = $substr.'...<br><a class="article__readMore" href="#">Read more</a>';
    }
    return $str;
}