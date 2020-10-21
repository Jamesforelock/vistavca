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
                if($userType === "visitor") {
                    $getUserArticles_query = "SELECT * FROM `ev` WHERE Visitor_Login = '$login'";
                    $userArticles = mysqli_query($conn, $getUserArticles_query);
                    $userArticlesId = array();
                    while ($row = mysqli_fetch_array($userArticles)) {
                        $userArticlesId[] = $row['Excursion_ID'];
                    }
                    if(count($userArticlesId) != 0) {
                        echo '
                         <span class="secInfo__title">The excursions you signed up for</span>
                         <div class="secInfo__scrollContent">
                        ';
                        $getArticles_query = "SELECT * FROM `excursion` WHERE ";
                        for($i = 0; $i<count($userArticlesId); $i++) {
                            $getArticles_query = $getArticles_query . "ID = $userArticlesId[$i]";
                            if($i === count($userArticlesId) - 1) continue;
                            $getArticles_query = $getArticles_query . " OR ";
                        }
                        $articles = mysqli_query($conn, $getArticles_query);
                        while ($item = mysqli_fetch_array($articles)) {
                            Article($item['ID'], $item['Name'], $item['Description'], 'assets/i/' . 'excursion' . '/' . $item['Picture'],
                                $item['Date'], array("isAdded" => true));
                        }
                    }

                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>
