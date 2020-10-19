<?php
if(!isset($_SESSION['login'])) {
    header("Location: ./auth/auth.php");
    exit;
}

require_once "MainInfo.php";
require_once "./components/content/articles/article.php";

$login = $_SESSION['login'];
$name = $_SESSION['name'];
$userType = $_SESSION['type'];
$description = $_SESSION['desc'];
$pictureName = $_SESSION['picture'];
?>

<div class="profile container">
    <h1 class="profile__title profile__title_red">Your personal account</h1>
    <div class="profileInfo">
        <?php MainInfo($login, $name, $userType, $description, $pictureName);?>
        <hr class="profileInfo__divider">
        <div class="secInfo">
            <span class="secInfo__title">The excursions you signed up for</span>
            <div class="secInfo__scrollContent">
               <?php
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               Article("Title", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid animi delectus et expedita facere
    facilis impedit ipsum quam quibusdam, quis saepe tempore, vero? Commodi explicabo impedit odio sit ullam?", "./assets/i/excursion/01.png", time());
               ?>
            </div>
        </div>
    </div>
</div>
