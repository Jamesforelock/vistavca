<div class="articles container">
    <?php
        require "components/content/dataConnector.php";
        if(isset($_GET['type'])) { // Проверяем, установлен ли тип статей
            $sectionType = $_GET['type'];
        }
        else { // Если тип статей не установлен
            $sectionType = 'excursion';
        }
        if(isset($_GET['page'])) { // Проверяем, задан ли параметр page
            $currentPage= $_GET['page'];
        }
        else { // Если page не задан, то отрисуется первая страница
            $currentPage = 1;
        }
        switch ($sectionType) {
            case 'excursion': // Если тип статей - экскурсии
                echo '<h1>Excursions</h1>
                 <p>Here you can see our nice Excursions</p>';
                renderData(5, "excursion", $currentPage);
                break;
            case 'stand': // Если тип статей - стенды
                echo '<h1>Stands</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nulla at corporis assumenda iusto nostrum
                adipisci temporibus corrupti similique expedita placeat aut sed necessitatibus praesentium, veritatis,
                dignissimos neque nisi consequatur?Earum nemo aperiam aspernatur sint assumenda ea. Nobis fugiat quia cupiditate
                odio eius hic earum, atque sit quas ut quae enim ad vero, omnis molestiae tempora rerum harum voluptas delectus.</p>';
                renderData(5, "stand", $currentPage);
                break;
        }
    ?>
</div>