<?php require_once $_SERVER['DOCUMENT_ROOT'].'/vistavca/components/content/articles/article.php'?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a new article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <ul class="nav">
                <li class="nav-item articleType active" onclick="setArticleType(this)" id="excursionArticleType">
                    <span class="nav-link">New excursion</span>
                </li>
                <li class="nav-item articleType" onclick="setArticleType(this)" id="standArticleType">
                    <span class="nav-link">New stand</span>
                </li>
                </li>
            </ul>
            <div class="modal-body">
                <form id="modal-form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Article's title</label>
                        <input class="form-control" placeholder="Title" id="newArticle_title" onkeyup="setTitle()">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Article's text</label>
                        <textarea class="form-control" rows="5" placeholder="Text" id="newArticle_text" onkeyup="setText()"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="newArticle_image">Article's image: </label>
                        <input type="file" accept="/image/*" id="newArticle_image">
                    </div>
                </form>
                <span>Here you can see the appearance of a future article</span>
                <?php
                    Article("proto", "Title", "Text", "", time());
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="getFormValues()">Create a new article</button>
            </div>
        </div>
    </div>
</div>
<script src="./scripts/createArticleModal.js"></script>


