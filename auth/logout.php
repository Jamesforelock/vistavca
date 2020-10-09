<?php
    require "../components/universal/dbConnector.php";
    session_start(); // Запуск сессии
    session_unset(); // Удаление всех значений из сессии
    session_destroy(); // Уничтожение сессии
    if(isset($_COOKIE['hash'])) { // Если в куках есть hash
        $conn = connectToDb(); // Подключение к БД
        $hash = $_COOKIE['hash']; // Получение значения hash
        $deleteHash_query = 'DELETE FROM hu WHERE hash = "'. mysqli_real_escape_string($conn, $hash).'"';
        $deleteHash = mysqli_query($conn, $deleteHash_query);
        if($deleteHash) {
            setcookie("hash", "", time()-3600, "/"); // Удаление хеша из куков
        }
   }
    header("Location: ../index.php");
    end;