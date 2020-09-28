<div class="div people container">
    <?php
    require "components/content/dataConnector.php";
    if(isset($_GET['type'])) { // Проверяем, установлен ли тип отображаемых людей
        $sectionType = $_GET['type'];
    }
    else { // Если тип отображаемых людей не установлен
        $sectionType = 'visitor';
    }
    if(isset($_GET['page'])) { // Проверяем, задан ли параметр page
        $currentPage= $_GET['page'];
    }
    else { // Если page не задан, то отрисуется первая страница
        $currentPage = 1;
    }
    switch ($sectionType) {
        case 'visitor': // Если тип статей - экскурсии
            echo '<h1>Visitors</h1>
                 <p>Here you can see our nice Visitors</p>';
            renderData(6, "visitor", $currentPage);
            break;
        case 'assistant': // Если тип статей - стенды
            echo '<h1>Assistants</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla at corporis assumenda iusto nostrum
                adipisci temporibus corrupti similique expedita placeat aut sed necessitatibus praesentium, veritatis,
                dignissimos neque nisi consequatur?Earum nemo aperiam aspernatur sint assumenda ea. Nobis fugiat quia cupiditate
                odio eius hic earum, atque sit quas ut quae enim ad vero, omnis molestiae tempora rerum harum voluptas delectus.</p>';
            renderData(6, "assistant", $currentPage);
            break;
    }
    ?>
</div>