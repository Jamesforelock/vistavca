<?php

// Абстрактный класс рисовальщика данных на текущей странице
abstract class Renderer {
    public abstract function render ($items, $table, $currentPage, $pagesCount);
}