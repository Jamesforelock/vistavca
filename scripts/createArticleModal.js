let modalForm = document.getElementById("modal-form")
let new_article = document.getElementById("proto")
let title = new_article.getElementsByClassName("article__title")[0]
let text = new_article.getElementsByClassName("article__text")[0]
let articleImage = new_article.getElementsByClassName("article__img")[0]
let enteredTitle = document.getElementById("newArticle_title")
let enteredText = document.getElementById("newArticle_text")
const setTitle = () => { // Меняем заголовок статьи при изменении соответствующего input'а
    title.innerText = enteredTitle.value
}
const setText = () => { // Меняем описание статьи при изменении соответствующего input'а
    text.innerText = enteredText.value
}

// Ассоциативный массив, в котором ключом является id названия типа создаваемой статьи,
// а значением - само название типа создаваемой статьи
let articlesType = {
    "excursionArticleType": "excursion",
    "standArticleType": "stand"
}
let articleTypeId = "excursionArticleType" // id html-названия типа создаваемой статьи
let articleType = articlesType[articleTypeId]; // Название типа создаваемой статьи
const setArticleType = selectedArticleTypeId => { // Изменение выбранного типа создаваемой статьи
    articleType = articlesType[selectedArticleTypeId]
    setArticleTypeStyles(selectedArticleTypeId)
}
const setArticleTypeStyles = (selectedArticleTypeId) => { // Корректировка стилей типов создаваемой статьи
    let articlesType = document.getElementsByClassName("articleType")
    for(let i = 0; i<articlesType.length; i++) {
        if(articlesType[i].id === selectedArticleTypeId) {
            articlesType[i].classList = "nav-item articleType active"
        }
        else {
            articlesType[i].classList = "nav-item articleType"
        }
    }
}

let imagePath = null // Путь к изображению в файловой структуре
// Файловый input для загрузки изображения
let inputImage = document.getElementById("newArticle_image")
// При изменении картинки
inputImage.onchange = () => {
    removeImage() // Удаляем картинку на случай, если она есть в файловой структуре
    let image = inputImage.files[0] // Получение картинки с input'а
    if(!image) return // Если картинка пуста, то ничего не делаем
    let data = new FormData() // Экземпляр класса FormData для его отправки по ajax
    data.append("image", image) // Загружаем в data изображение
    data.append("image_uploaded", 1) // Загружаем в data идентификатор наличия изображения
    $.ajax({
        url: './components/universal/createArticleModal/setImage.php',
        type: 'POST',
        data,
        dataType: 'json', // Устанавливаем тип получаемых данных (для автоматического парсинга json в js-объект)
        cache: false, // Выключаем кэширование (для IE 8 версии)
        processData: false, // Отключаем обработку передаваемых данных
        contentType: false, // Отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
        success: (response) => {
            if(typeof response.error != 'undefined') { // Если замечена ошибка
                errorMessage(modalForm, response.error)
                inputImage.value = null // Очистка input'а изображения
                return
            }
            imagePath = response.imagePath
            articleImage.setAttribute("src", `./${imagePath}`)
        }
    })
}

const removeImage = () => { // Удаление картинки
    // Если путь к изображению в файловой структуре есть, то оно существует
    if(imagePath) {
        $.ajax({
            url: './components/universal/createArticleModal/deleteImage.php',
            type: 'POST',
            data: {
                imagePath
            },
            success: () => {
                imagePath = null // Сбрасываем значение пути к изображению
                inputImage.value = null // Сбрасываем значение input'а изображения
                // Устанавливаем картинку по умолчанию
                articleImage.setAttribute("src", "./assets/i/excursion/noPhoto_a.png")
            }
        })
    }
}

const getFormValues = () => { // Получение данных с формы
    if(!enteredTitle.value || !enteredText.value) { // Если поля не будут заполнены
        errorMessage(modalForm, "Please fill in all fields!")
        return false
    }
    if(enteredTitle.value.length >= 50 ) { // Если длина введенного заголовка будет больше 50
        errorMessage(modalForm, "Error: Title's length musnt be more than 50 symbols")
        return false
    }
    // Здесь должен быть показ ошибки при пустых полях
    let formData = {
        articleType,
        title: enteredTitle.value,
        text: enteredText.value,
    }
    // Если есть путь к картинке, то загружаем его в новый объект
    if(imagePath) formData = {...formData, imagePath}
    return formData
}

const createArticle = () => {
    let data = getFormValues() // Получение данных с формы
    if(!data) return // Если данные с формы получить не удалось, ничего не делаем
    $.ajax({
        url: './components/universal/createArticleModal/createArticle.php',
        type: 'POST',
        data,
        success: (response) => {
            if(response == 1) {
               // Чистка всех заполненных полей
               enteredTitle.value = null
               enteredText.value = null
               setTitle()
               setText()
               removeImage()
            }
            else {
                errorMessage(modalForm, "Error: something went wrong")
                removeImage()
            }
        }
    })
}

// Рисует над содержимым elem сообщение об ошибке, удаляет её через 5 секунд
const errorMessage = (elem, message) => {
    let newError = document.createElement("div")
    newError.classList = "alert alert-danger"
    newError.innerText = message
    elem.appendChild(newError)
    setTimeout(() => {
        newError.parentNode.removeChild(newError)
    }, 5000)
}