<!--Скрипт логинизации-->
<?php
require "../components/universal/dbConnector.php";

$conn = connectToDb(); // Подключение к БД

// Загружает данные о найденном в БД пользователе в сессию и создает hash для автоматической авторизации (при отмеченном RememberMe)
function setSessionDataAndHash($conn, $user, $userType, $rememberMe) {
    session_start(); // Запуск сессии
    while ($row = mysqli_fetch_assoc($user)) { // Представляет результат выборки в виде ассоциативного массива
        $_SESSION['login'] = $row['Login']; // Запись в сессию значения логина пользователя
        $_SESSION['name'] = $row['Name']; // Запись в сессию значения полного имени пользователя
        $_SESSION['desc'] = $row['Description']; // Запись в сессию значения описания пользователя
        $_SESSION['picture'] = $row['Picture']; // Запись в сессию названия файла аватарки пользователя
        $_SESSION['type'] = $userType;

        $userId = $row['ID'];
    }

    if($rememberMe) {
        $hash = substr(md5(time()), 0, 16); // Генерация хеша
        $addHash_query = 'INSERT INTO hu VALUES ("'.$hash.'", '.$userId.', "'.$userType.'")';
        $addHash = mysqli_query($conn, $addHash_query);
        if($addHash) {
            setcookie("hash", $hash, time()+86400, "/"); // Установка куки на 24 часа
        }
    }

}
if(isset($_POST['signIn'])) {
    if(!empty($_POST['login']) && !empty($_POST['password'])) { // Если все обязательные поля заполнены
        $enteredLogin = mysqli_real_escape_string($conn, $_POST['login']); // Введённый логин
        $enteredPassword = mysqli_real_escape_string($conn, $_POST['password']); // Введённый пароль
        if(!isset($_POST['rememberMe'])) $rememberMe = false; // Если checkbox rememberMe не выбран
        else $rememberMe = true; // Если rememberMe checkbox выбран
        // Запрос на поиск пользователя вида "посетитель" с введённым логином или паролем
        $getVisitor_query = '
    SELECT * FROM visitor WHERE login = "'.$enteredLogin.'" AND password = "'.$enteredPassword.'"
    ';
        $visitor = mysqli_query($conn, $getVisitor_query); // Осуществление запроса на получение пользователя вида "посетитель"
        // Запрос на поиск пользователя вида "ассистент" с введённым логином или паролем
        $getAssistant_query = '
    SELECT * FROM assistant WHERE login = "'.$enteredLogin.'" AND password = "'.$enteredPassword.'"
    ';
        $assistant = mysqli_query($conn, $getAssistant_query); // Осуществление запроса на получение пользователя вида "посетитель"
        if(mysqli_num_rows($visitor) != 0) { // Если количество найденных по логопассу строк с пользователями вида "посетитель" != 0
            session_start(); // Запуск сессии
            setSessionDataAndHash($conn, $visitor, "visitor", $rememberMe);
            header("Location: ../index.php"); // Переадресация
            exit;
        }
        elseif(mysqli_num_rows($assistant) != 0) { // Если количество найденных по логопассу строк с пользователями вида "ассистент" != 0
            session_start(); // Запуск сессии
            setSessionDataAndHash($conn, $assistant, "assistant", $rememberMe);
            header("Location: ../index.php"); // Переадресация
            exit;
        }
        else { // Если пользователь с введённым логопассом не был найден
            echo '<div class="alert alert-danger" role="alert">
        Incorrect email or password
        </div>';
        }
    }
    else { // Если одно из обязательных полей заполнено не было
        echo '<div class="alert alert-danger" role="alert">
        Please fill in all text fields
        </div>';
    }
}
?>