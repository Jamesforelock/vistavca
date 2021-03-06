<?php
if(!isset($GLOBALS['user'])) { // Если данные пользователя не установлены
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/vistavca/auth/auth.php');
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/profile/mainInfo.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/profile/secInfo.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/articles/article.php';

$user = $GLOBALS['user'];
$login = $user['login'];
$name = $user['name'];
$userType = $user['type'];
$description = $user['description'];
$pictureName = $user['picture'];
$conn = $GLOBALS['conn'];
?>

<div class="profile container">
    <h1 class="profile__title">Profile</h1>
    <hr>
    <div class="profileInfo">
        <?php MainInfo($login, $name, $userType, $description, $pictureName);?>
        <hr class="profileInfo__divider">
        <div class="secInfo">
            <?php
            switch ($userType) {
                case "visitor": // Если пользовательский тип = посетитель
                    SecVisitorInfo($conn, $login);
            }
            ?>
        </div>
    </div>
</div>
