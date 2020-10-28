<?php
// Компонент одного человека
function Human($name, $description, $picturePath) {
    echo '
        <div class="col human">
            <div class="human__photoContainer">
                <img src="'.$picturePath.'" alt="" class="human__photo">
            </div>
            <div class="titleBlock">
                <span class="titleBlock__title">'.$name.'</span>
            </div>
            <p class="human__desc">'.$description.'</p>
        </div>
    ';
}