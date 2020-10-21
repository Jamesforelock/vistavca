// Устанавливает значение стиля экскурсии
const setExcursionStyle = (excursionId, isAdded) => {
    let excursion = document.getElementById(excursionId) // Получение экскурсии по id
    let button = excursion.getElementsByClassName("article__btn")[0] // Получение кнопки экскурсии
    if(isAdded) { // Если экскурсия стала добавленной
        // Установка соответствующих стилей
        excursion.classList = "card mb-3 article article_added"
        button.classList = "fas fa-minus-circle article__btn article__btn_delete"
        // Изменение поведения при нажатии кнопки на удаление экскурсии
        button.setAttribute('onclick', `removeExcursion(${excursionId})`)
    }
    else { // Если экскурсия стала удаленной
        // Установка соответсвующих стилей
        excursion.classList = "card mb-3 article"
        button.classList = "fa fa-plus article__btn article__btn_add"
        // Изменение поведения при нажатии кнопки на добавление экскурсии
        button.setAttribute('onclick', `addExcursion(${excursionId})`)
    }
}

// Производит ajax-запрос на добавление экскурсии посетителю
const addExcursion = (excursionId) => {
    $.ajax({ // Функция выполнения ajax-запроса (принимает объект со свойствами запроса в качестве параметра)
        type: 'POST', // Тип запроса
        url: './components/content/articles/excursionSignUpper.php?action=add', // Путь к php-скрипту
        data: { // Отсылаемые данные серверу
            excursionId // id экскурсии
        },
        success: (response) => { // Выполнится при успешном запросе
            if(response == 1) { // Если запрос вывел 1, значит экскурсия была привязана к посетителю
                setExcursionStyle(excursionId, true) // Установка стиля экскурсии
            }
        }
    })
}
// Производит ajax-запрос на удаление экскурсии посетителя
const removeExcursion = (excursionId) => {
    $.ajax({
        type: 'POST',
        url: './components/content/articles/excursionSignUpper.php?action=delete',
        data: {
            excursionId
        },
        success: (response) => {
            if(response == 1) {
                setExcursionStyle(excursionId, false)
            }
        }
    })
}