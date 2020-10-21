const setArticleStyle = (articleId, isAdded) => {
    let article = document.getElementById(articleId)
    let button = article.getElementsByClassName("article__btn")[0]
    if(isAdded) {
        article.classList = "card mb-3 article article_added"
        button.classList = "fas fa-minus-circle article__btn article__btn_delete"
        button.setAttribute('onclick', `removeArticle(${articleId})`)
    }
    else {
        article.classList = "card mb-3 article"
        button.classList = "fa fa-plus article__btn article__btn_add"
        button.setAttribute('onclick', `addArticle(${articleId})`)
    }
}
const addArticle = (articleId) => {
    $.ajax({
        type: 'POST',
        url: './components/content/articles/articleSignUpper.php?action=add',
        data: {
            articleId
        },
        success: (response) => {
            if(response == 1) {
                setArticleStyle(articleId, true)
            }
        }
    })

}
const removeArticle = (articleId) => {
    $.ajax({
        type: 'POST',
        url: './components/content/articles/articleSignUpper.php?action=delete',
        data: {
            articleId
        },
        success: (response) => {
            if(response == 1) {
                setArticleStyle(articleId, false)
            }
        }
    })
}