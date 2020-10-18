<?php
session_start();

// Загружает данные о найденном в БД пользователе в сессию
function setSessionData ($user, $userType) {
    while ($row = mysqli_fetch_assoc($user)) { // Представляет результат выборки в виде ассоциативного массива
        $_SESSION['login'] = $row['Login']; // Запись в сессию значения логина пользователя
        $_SESSION['name'] = $row['Name']; // Запись в сессию значения полного имени пользователя
        $_SESSION['desc'] = $row['Description']; // Запись в сессию значения описания пользователя
        $_SESSION['picture'] = $row['Picture']; // Запись в сессию названия файла аватарки пользователя
        $_SESSION['type'] = $userType; // Запись в сессию типа пользователя
    }
}

if(!isset($_SESSION['login'])) { // Если в сессии не устрановлен login
    if(isset($_COOKIE['hash'])) { // Если в куках есть hash
        $hash = mysqli_real_escape_string($conn, $_COOKIE['hash']); // Получение значения hash
        $getUser_query = 'SELECT * FROM hu WHERE hash = "'.$hash.'"';
        $user = mysqli_query($conn, $getUser_query); // Получение пользователя из таблицы hu
        if(mysqli_num_rows($user) != 0) { // Если количество найденных по хэшу строк с пользователями != 0
            while ($row = mysqli_fetch_assoc($user)) { // Представляет результат выборки в виде ассоциативного массива
                $userId = $row['user_ID']; // Пользовательский Id
                $userType = $row['userType']; // Тип пользователя
            }
            switch ($userType) {
                case "visitor": // Если тип пользователя = "посетитель"
                    $getVisitor_query = 'SELECT * FROM visitor WHERE ID = "'.$userId.'"';
                    $visitor = mysqli_query($conn, $getVisitor_query); // Получение данных о посетителе из БД
                    if(mysqli_num_rows($visitor) != 0) { // Если количество найденных по id строк с пользователями вида "посетитель" != 0
                        setSessionData($visitor, "visitor");
                    }
                    break;
                case "assistant":
                    $getAssistant_query = 'SELECT * FROM assistant WHERE ID = "'.$userId.'"';
                    $assistant = mysqli_query($conn, $getAssistant_query); // Получение данных об ассистенте из БД
                    if(mysqli_num_rows($assistant) != 0) { // Если количество найденных по id строк с пользователями вида "стендист" != 0
                        setSessionData($assistant, "assistant");
                    }
                    break;
            }
        }
    }
}