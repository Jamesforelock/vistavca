<?php

class VisitorAdder {
    public $error;
    protected $db;
    protected $userData;
    protected $table;

    public function __construct($db, $userData) {
        $this->db = $db;
        $this->table = 'visitor';
        $this->userData = $userData;
    }

    public function addUser() {
        // Распаковка значений пользователя
        $login = $this->userData['login'];
        $password = $this->userData['password'];
        $name = $this->userData['name'];
        $description = $this->userData['description'];
        $picture = $this->userData['picture'];

        if($picture) {
            if (!$this->isPictureValid($picture)) {
                return false;
            }
            $pictureName = '"'.$this->getPictureName($picture).'"';
        }
        else {
            $pictureName = "NULL";
        }

        $table = $this->table;

        // Добавление пользователя в БД
        $addUser_query = "INSERT INTO `$table` (`Login`, `Password`, `Name`, `Description`, `Picture`) 
                VALUES ('$login', '$password', '$name', '$description', $pictureName)";
        if(!mysqli_query($this->db, $addUser_query)) { // Попытка добавить посетителя в БД
            $this->error = "Error! You have not been registered.";
            return false;
        }
        // Добавление картинки
        $this->uploadPicture($picture);
        return true;
    }

    // Генерирует название изображения
    public function getPictureName($picture) {
        return md5(time()).'_'.$picture['name'];
    }

    // Проверяет изображение на валидность
    public function isPictureValid($picture) {
        $types = array('image/gif', 'image/png', 'image/jpeg'); // Типы допустимых файлов для загрузки
        if(!in_array($picture['type'], $types)) { // Если файл не является картинкой
            $this->error = "Error! You can only upload images with the extensions png, jpg and gif.";
            return false;
        }
        if($picture['size'] > 1000000) { // Если файл весит больше 1000000 байт (1 МБ)
            $this->error = "Error! The uploaded image should not weigh more than 1 mb.";
            return false;
        }
        return true;
    }

    // Загрузка картинки в качестве аватарки пользователя
    // В случае успеха возвращает true
    public function uploadPicture($picture) {
        // Путь к папке с фотографиями посетителей + сгенерированное название файла
        $path = $_SERVER['DOCUMENT_ROOT'].'/vistavca/assets/i/'.$this->table.'/' . $this->getPictureName($picture);
        move_uploaded_file ($picture['tmp_name'], $path);
        return true;
    }
}