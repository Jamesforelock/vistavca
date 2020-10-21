<?php

// Абстрактный класс рисовальщика данных на текущей странице
abstract class Renderer {
    public abstract function render ($items, $table);
    public abstract function getTableType();
    // Переворачивает результат Mysql-выборки и возвращает его в виде массива
    protected function reverseMySqlRes ($items) {
        $itemsArray = array();
        while ($item = mysqli_fetch_array($items)) {
            $itemsArray[] = $item;
        }
        return array_reverse($itemsArray);
    }
}