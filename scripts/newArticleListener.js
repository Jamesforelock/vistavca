// Контейнер со статьями
let articlesContainer = document.getElementsByClassName("articles")[0]
// Последняя по актуальности статья (самая верхняя на странице)
let lastArticle = document.getElementsByClassName("article")[0]
// Получение id последней статьи
let lastArticleId = lastArticle.id
const listenNewArticle = (articlesType) => {
    $.ajax({ // long-polling запрос на проверку новых статей в БД
        url: "./components/content/articles/newArticlePusher.php",
        type: "POST",
        cache: false,
        data: {
            lastArticleId: lastArticleId,
            articlesType
        },
        timeout: 10000, // если новых данных не будет, запрос прервется через 10 секунд и запуститься заного
        async: true, // запрос должен быть асинхронным, чтобы не было проблем с заморозкой страницы
        success: (response) => {
            response = JSON.parse(response) // Преобразование json-ответа в js-объект
            articlesContainer.style.opacity = "0" // Исчезновение контейнера
            // Перерисовка контейнера с добавлением новой статьи
            articlesContainer.innerHTML = response.html + articlesContainer.innerHTML;
            // Появление контейнера спустя полсекунды
            setTimeout(() => {
                articlesContainer.style.opacity = "1"
            }, 500)
            // Теперь последняя статья = новой статье
            lastArticle = document.getElementsByClassName("article")[0]
            // Получение id новой статьи
            lastArticleId = lastArticle.id
            // Повторный вызов прослушки новой статьи
            listenNewArticle(articlesType)
        },
        error: () => { // На случай, если запрос прервется (по истечению времени или по другим причинам)
            // Повторный вызов прослушки новой статьи
            listenNewArticle(articlesType)
        }
    })
}