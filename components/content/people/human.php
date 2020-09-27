<?php
function Human($name, $description, $picturePath) {
    echo '
        <div class="col human">
            <img src="'.$picturePath.'" alt="" class="human__photo">
            <div class="titleBlock">
                <span class="titleBlock__title">'.$name.'</span>
            </div>
            <p class="human__desc">'.$description.'</p>
        </div>
    ';
}