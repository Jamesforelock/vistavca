let enteredTitle = document.getElementById("newArticle_title")
let enteredText = document.getElementById("newArticle_text")
let new_article = document.getElementById("proto")
let title = new_article.getElementsByClassName("article__title")[0]
let text = new_article.getElementsByClassName("article__text")[0]

const setTitle = () => {
    title.innerText = enteredTitle.value
}
const setText = () => {
    text.innerText = enteredText.value
}

let selectedArticleTypeId = "excursionArticleType"
const setArticleType = articleType => {
    selectedArticleTypeId = articleType.id
    setArticleTypeStyles()
}
const setArticleTypeStyles = () => {
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

const getFormValues = () => {
    // Здесь должен быть показ ошибки при пустых полях
    let formValues = {
        articleType: selectedArticleTypeId,
        title: enteredTitle.value,
        text: enteredText.value
    }
    let json = JSON.stringify(formValues) // Преобразование js-объекта в JSON
    console.log(json)
}