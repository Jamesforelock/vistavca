<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/auth/register/visitorAdder.php';

class AssistantAdder extends VisitorAdder {

    private $enteredSecretCode;

    public function __construct($db, $userData, $enteredSecretCode) {
        parent::__construct($db, $userData);
        $this->table = 'assistant';
        $this->enteredSecretCode = $enteredSecretCode;
    }

    public function addUser() {
        // Если был введен неверный секретный код
        if(!$this->checkSecretCode($this->enteredSecretCode, $_SERVER['DOCUMENT_ROOT'].'/vistavca/edit/secretAssistantCode.txt')) {
            $this->error = "Sorry, but you entered the incorrect secret code";
            return false;
        }
        $this->generateNewSecretCode($_SERVER['DOCUMENT_ROOT'].'/vistavca/edit/secretAssistantCode.txt');
        parent::addUser();
        return true;
    }

    // Генерирует новый секретный код и записывает его в файл
    private function generateNewSecretCode ($filePath) {
        $newSecretCode = substr(md5(time()), 0, 5); // Генерация нового секретного кода
        $secretAssistantCode_file = fopen($filePath, "w");
        fwrite($secretAssistantCode_file, $newSecretCode); // Запись нового секретного кода в файл
        fclose($secretAssistantCode_file); // Закрытие файла секретного кода
    }

    // Проверяет совпадение введённого секретного кода с тем, что есть в файле
    private function checkSecretCode ($enteredSecretCode, $filePath) {
        // Открытие файла с секретным кодом
        $secretAssistantCode_file = fopen($filePath, "r+");
        // Получение секретного кода из файла
        $secretAssistantCode = fgets($secretAssistantCode_file, 150);
        fclose($secretAssistantCode_file);
        return $enteredSecretCode === $secretAssistantCode;
    }
}