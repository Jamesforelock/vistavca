<?php

function Intro($title, $description) {
    echo '
     <div class="intro container">
     <span class="intro__title">'.$title.'</span>
     <p class="intro__description">'.$description.'</p>
     </div>
     ';
}
