<?php
require_once "../../universal/dbConnector.php";
$conn = connectToDb();
session_start();
if($_SESSION['type'] === "visitor") {
    switch ($_GET['action']) {
        case "add":
            echo addArticle($GLOBALS['conn'], $_POST['articleId'], $_SESSION['login']);
            break;
        case "delete":
            echo deleteArticle($GLOBALS['conn'], $_POST['articleId'], $_SESSION['login']);
            break;
    }
}

function addArticle($db, $articleId, $userLogin) {
    $addArticle_query = "INSERT INTO `ev` (Excursion_ID, Visitor_Login) VALUES ('$articleId', '$userLogin')";
    if(mysqli_query($db, $addArticle_query)) {
        return 1;
    }
    return 0;
}

function deleteArticle($db, $articleId, $userLogin) {
    $deleteArticle_query = "DELETE FROM `ev` WHERE Excursion_ID = '$articleId' AND Visitor_Login = '$userLogin'";
    if(mysqli_query($db, $deleteArticle_query)) {
        return 1;
    }
    return 0;
}
