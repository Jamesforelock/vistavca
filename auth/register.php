<!--Скрипт регистрации-->
<?php
    require "../components/universal/dbConnector.php";
    $conn = connectToDb(); // Подключение к БД
    if(isset($_POST['signUp'])) {
        // Если все обязательные поля заполнены
        if(!empty($_POST['login_reg']) && !empty($_POST['password_reg']) && !empty($_POST['description_reg']) && !empty($_POST['name_reg'])) {
            $login = mysqli_real_escape_string($conn, $_POST['login_reg']);
            $password = mysqli_real_escape_string($conn, $_POST['password_reg']);
            $description = mysqli_real_escape_string($conn, $_POST['description_reg']);
            $name = mysqli_real_escape_string($conn, $_POST['name_reg']);
            $getUser_query = '
            SELECT * FROM visitor WHERE login = "'.$login.'"
            UNION
            SELECT * FROM assistant WHERE login = "'.$login.'"
            ';
            $user = mysqli_query($conn, $getUser_query);
            if(mysqli_num_rows($user) != 0) { // Если пользователь с введенным логином уже существует
                echo '<div class="alert alert-danger" role="alert">
                Sorry, but a user with this login already exists
                </div>';
            }
            else { // Если пользователя с таким логином нет в БД
                if(!isset($_POST['isAssistant'])) $isAssistant = false; // Если checkbox isAssistant не выбран
                else $isAssistant = true; // Если rememberMe checkbox выбран

                if($isAssistant) { // Если пользователь желает себя зарегистрировать как ассистента
                    if(!empty($_POST['secretCode_reg'])) { // Если поля секретного кода не является пустым
                        $enteredSecretCode = $_POST['secretCode_reg'];
                        // Открытие файла с секретным кодом
                        $secretAssistantCode_file = fopen("../edit/secretAssistantCode.txt", "r+");
                        // Получение секретного кода из файла
                        $secretAssistantCode = fgets($secretAssistantCode_file, 150);
                        if($enteredSecretCode === $secretAssistantCode) { // Если был введен верный секретный код
                            // Добавление ассистента
                            $addUser_query = 'INSERT INTO assistant (Login, Password, Name, Description)
                            VALUES ("'.$login.'", "'.$password.'", "'.$name.'", "'.$description.'")
                            ';
                            $addUser = mysqli_query($conn, $addUser_query);
                            if($addUser) { // Если пользователь был успешно добавлен
                                $newSecretCode = substr(md5(time()), 0, 5); // Генерация нового секретного кода
                                fclose($secretAssistantCode_file);
                                $secretAssistantCode_file = fopen("../edit/secretAssistantCode.txt", "w");
                                fwrite($secretAssistantCode_file, $newSecretCode); // Запись нового секретного код в файл
                                fclose($secretAssistantCode_file); // Закрытие файла секретного кода
                                header("Location: ./auth.php"); // Переадресация
                                exit;
                            }
                        }
                        else { // Если был введен неверный секретный код
                            echo '<div class="alert alert-danger" role="alert">
                        Sorry, but you entered the incorrect secret code
                        </div>';
                        }
                    }
                    else { // Если поле секретного кода пустое
                        echo '<div class="alert alert-danger" role="alert">
                        Sorry, but you did not enter the secret code to register as a stand-assistant
                        </div>';
                    }
                }
                else { // Если пользователь желает себя зарегистрировать как посетителя
                    // Добавление посетителя
                    $addUser_query = 'INSERT INTO visitor (Login, Password, Name, Description)
                            VALUES ("'.$login.'", "'.$password.'", "'.$name.'", "'.$description.'")
                            ';
                    $addUser = mysqli_query($conn, $addUser_query);
                    if($addUser) { // Если пользователь был успешно добавлен
                        echo '<div class="alert alert-success" role="alert">
                        Congratulations! You have successfully registered. You will be redirected to the login page in 5 seconds.
                        </div>';
                        sleep(5);
                        header("Location: ./auth.php"); // Переадресация
                        exit;
                    }
                }

            }
        }
        else { // Если одно из обязательных полей заполнено не было
            echo '<div class="alert alert-danger" role="alert">
        Please fill in all text fields
        </div>';
        }
    }
?>