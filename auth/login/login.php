<!--Скрипт логинизации-->
<?php
require "../components/universal/dbConnector.php";
require_once "../components/universal/errorMessage.php";

$conn = connectToDb(); // Подключение к БД

// Загружает данные о найденном в БД пользователе в сессию и создает hash для автоматической авторизации (при отмеченном RememberMe)
function setSessionDataAndHash($conn, $userArr, $userType, $rememberMe) {
    session_unset(); // Удаляем все данные из сессии на случай, если они были
    session_destroy(); // Удаляем сессию
    session_start(); // Запускаем новую сессию
    $_SESSION['login'] = $userArr['Login']; // Запись в сессию значения логина пользователя
    $_SESSION['name'] = $userArr['Name']; // Запись в сессию значения полного имени пользователя
    $_SESSION['desc'] = $userArr['Description']; // Запись в сессию значения описания пользователя
    $_SESSION['picture'] = $userArr['Picture']; // Запись в сессию названия файла аватарки пользователя
    $_SESSION['type'] = $userType;
    $userId = $userArr['ID'];

    if($rememberMe) {
        $hash = substr(md5(time()), 0, 16); // Генерация хеша
        $addHash_query = 'INSERT INTO hu VALUES ("'.$hash.'", '.$userId.', "'.$userType.'")';
        $addHash = mysqli_query($conn, $addHash_query);
        if($addHash) {
            setcookie("hash", $hash, time()+86400, "/", "", false, true); // Установка куки на 24 часа
        }
    }

}

function isUserInTable($conn, $table, $login, &$user, &$userType) {
    $getUser_query = "
    SELECT * FROM `$table` WHERE login = '$login'";
    $foundUser = mysqli_query($conn, $getUser_query);
    if(mysqli_num_rows($foundUser) != 0) {
        $user = $foundUser;
        $userType = $table;
        return true;
    }
    return false;
}

if(isset($_POST['signIn'])) {
    if(empty($_POST['login']) || empty($_POST['password'])) {
        ErrorMessage("Please fill in all text fields");
        return;
    }
    $enteredLogin = mysqli_real_escape_string($conn, $_POST['login']); // Введённый логин
    $enteredPassword = mysqli_real_escape_string($conn, $_POST['password']); // Введённый пароль
    if(!isCorrectSymbols(array($enteredLogin, $enteredPassword))) {
        ErrorMessage("Error! The entered data may contain invalid characters.");
        return;
    }
    if(!isset($_POST['rememberMe'])) $rememberMe = false; // Если checkbox rememberMe не выбран
    else $rememberMe = true; // Если rememberMe checkbox выбран
    $user = null;
    $userType = null;
    $isUserInDb = isUserInTable($conn, "visitor", $enteredLogin, $user, $userType)
        || isUserInTable($conn, "assistant", $enteredLogin, $user, $userType);
    if(!$isUserInDb) {
        ErrorMessage("Incorrect login or password");
        return;
    }
    $userArr = mysqli_fetch_array($user);
    $hashedPassword = $userArr['Password'];
    if(!password_verify($enteredPassword, $hashedPassword)){
        ErrorMessage("Incorrect login or password");
        return;
    }
    setSessionDataAndHash($conn, $userArr, $userType, $rememberMe);
    header("Location: ../index.php"); // Переадресация
    exit;
}
?>