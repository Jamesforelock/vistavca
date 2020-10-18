<!--Скрипт регистрации-->
<?php
    require_once "../components/universal/dbConnector.php"; // Для работы с БД
    require_once "../components/universal/errorMessage.php"; // Компонент сообщений об ошибке
    require_once "VisitorAdder.php"; // Добавлятель посетителя
    require_once "AssistantAdder.php"; // Добавлятель ассистента
    $conn = connectToDb(); // Подключение к БД

    // Проверяет наличие записи в таблице БД
    function isInDb($db, $table, $attribute, $value) {
        $getFromDb_query = 'SELECT * FROM '.$table.' WHERE '.$attribute . ' = "'.$value.'"';
        $getFromDb = mysqli_query($db, $getFromDb_query);
        return mysqli_num_rows($getFromDb) != 0;
    }

    // Обработчик нажатия на кнопку
    if(isset($_POST['signUp'])) {
        // Если одно из обязательных полей заполнено не было
        if(empty($_POST['login_reg']) || empty($_POST['password_reg']) || empty($_POST['description_reg']) || empty($_POST['name_reg'])) {
            ErrorMessage("Please fill in all text fields");
            return;
        }
        // Получение значений из формы
        $login = mysqli_real_escape_string($conn, $_POST['login_reg']);
        $password = mysqli_real_escape_string($conn, password_hash($_POST['password_reg'], PASSWORD_DEFAULT));
        $name = mysqli_real_escape_string($conn, $_POST['name_reg']);
        $description = mysqli_real_escape_string($conn, $_POST['description_reg']);
        $formData = array($login, $_POST['password_reg'], $name, $description);
        if(!isCorrectSymbols($formData)) {
            ErrorMessage("Error! The entered data may contain invalid characters.");
            return;
        }
        $picture = null;
        if($_FILES['picture']['error'] == UPLOAD_ERR_OK) { // Если пользователь загрузил картинку
            $picture = $_FILES['picture'];
        }
        // Проверка наличия пользователя в БД
        $isUserInDb = isInDb($conn, "visitor", "login", $login)
            || isInDb($conn, "assistant", "login", $login);
        if($isUserInDb) {
            ErrorMessage("Sorry, but a user with this login already exists");
            return;
        }
        // Упаковка значений нового пользователя
        $userData = array(
            "login" => $login,
            "password" => $password,
            "name" => $name,
            "description" => $description,
            "picture" => $picture
        );
        // Добавление пользователя в БД
        if(!isset($_POST['isAssistant'])) $isAssistant = false; // Если checkbox isAssistant не выбран
        else $isAssistant = true; // Если rememberMe checkbox выбран
        if($isAssistant) { // Если пользователь желает себя зарегистрировать как ассистента
            if(empty($_POST['secretCode_reg'])) { // Если поле секретного кода пустое
                ErrorMessage("Sorry, but you did not enter the secret code to register as a stand-assistant");
                return;
            }
            $enteredSecretCode = $_POST['secretCode_reg'];
            $assistantAdder = new AssistantAdder($conn, $userData, $enteredSecretCode);
            if(!$assistantAdder->addUser()) { // Попытка добавления нового ассистента
                ErrorMessage($assistantAdder->error);
                return;
            }
            header("Location: ./auth.php"); // Переадресация
            exit;
        }
        else { // Если пользователь желает себя зарегистрировать как посетителя
            // Добавление посетителя
            $visitorAdder = new VisitorAdder($conn, $userData);
            if(!$visitorAdder->addUser()) { // Попытка добавления нового пользователя
                ErrorMessage($visitorAdder->error);
                return;
            }
            header("Location: ./auth.php"); // Переадресация
            exit;
            }
        }
?>
