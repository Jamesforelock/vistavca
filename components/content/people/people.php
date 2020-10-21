<div class="div people container">
    <?php
    require "components/content/dataConnector.php";
    require_once "components/universal/intro.php";
    require_once "components/content/people/PeopleRenderer.php";
    $conn = $GLOBALS['conn'];
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
            Intro("Visitors", "Here you can see our nice Visitors");
            renderData($conn,6, new PeopleRenderer(), "visitor", $currentPage);
            break;
        case 'assistant': // Если тип статей - стенды
            Intro("Assistants", "Here you can see our nice Assistants");
            renderData($conn, 6, new PeopleRenderer(), "assistant", $currentPage);
            break;
    }
    ?>
    <!--Скрипт плавного появления блока людей-->
    <script>
        let people = document.getElementsByClassName("people")[0]
        smoothAppear(people)
    </script>
</div>