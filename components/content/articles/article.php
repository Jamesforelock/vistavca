<?php
// Компонент одной статьи
function Article($id, $title, $description, $picturePath, $date, $addable) {
    if(strlen($description) > 350) {
        $subDesc = mb_substr($description, 0, 350, "UTF-8");
        $description = $subDesc.'...<br><a class="article__readMore" href="#">Read more</a>';
    }
    if($addable != false) {
        if($addable["isAdded"]) {
            $addAndDeleteBtn = '<i class="fas fa-minus-circle article__btn article__btn_delete" onclick="removeArticle('.$id.')"></i>';
        }
        else {
            $addAndDeleteBtn = '<i class="fa fa-plus article__btn article__btn_add" onclick="addArticle('.$id.')"></i>';
        }
    }
    echo '
    <div class="card mb-3 article '.($addable["isAdded"] ? "article_added" : "").'" id="'.$id.'">
        <div class="row no-gutters">
            <div class="col-md-4 article__imgContainer">
                <img src="'.$picturePath.'" class="card-img article__img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title article__title">'.$title.' '.($addable != false ? $addAndDeleteBtn : "").'</h5>
                    <hr>
                    <p class="card-text article__text">'.$description.'</p>
                    <p class="card-text article__date article__text_muted"><small class="text-muted">'.date("d.m.Y", strtotime($date)).'</small></p>
                </div>
            </div>
        </div>
    </div>
    ';
}