<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KINJO　ホーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../kinjo.css">
</head>
    <body>
        <!--ヘッダー-->
        <header>
        <!--メニューバー-->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="../home">マイページ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="../new_community">コミュニティ作成<span class="sr-only">(current)</span></a>                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="#">コミュニティ一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../logout">ログアウト</a>
                    </li>
                </ul>
                </div>
            </nav>
        </header>

        <?php if (count($communities_data) !== 0){ ?>
        <?php foreach($communities_data as $value){ ?>

        <!--コミュニティ一覧-->
        <div class="item_all">
            <div class="community_item">
                <div class="community_title">
                    <p?>作成者：<?php print $value['user_name'] ?><br>
                    エリア：<?php print $value['area'] ?><br>
                    タイトル：<?php print $value['title'] ?></p>
                </div>

                <div class="community_detail">
                    <?php print $value['community_detail'] ?>
                </div>           
            </div>
        </div>

        <!--メッセージ入力-->
        <div class="reply_container">
            <form method="post">
                <div class="form-group">    
                    <label class="button_label" for="reply">メッセージを入力：</label>
                    <input type="text" class="form-control" rows="5" name='reply_message'></input>
                    <input type='hidden' name='community_id' value="<?php print $value['community_id']; ?>">
                </div>
                <input type="submit" name="commit" value="返信" class="submit_button" data-disable-with="投稿"/>
    
            </form>

        <?php if (count($err_msg) !== 0){ ?>
        <?php foreach($err_msg as $value){ ?>
            <br><p class="p-3 mb-2 bg-danger text-white"><?php print $value; ?></p>            
        <?php } }?>
    
        <?php if (count($scc_msg) !== 0){ ?>
        <?php foreach($scc_msg as $value){ ?>
            <br><p class="p-3 mb-2 bg-success text-white"><?php print $value; ?></p>            
        <?php } } ?>

        <?php }} ?>

        <?php if (count($reply_data) !== 0){ ?>
        <?php foreach($reply_data as $value){ ?>

        <div class="message_container media text-muted pt-3">
            <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">投稿日時：<?php print $value['created_at']; ?> 投稿者：<a href=""><?php print $value['user_name']; ?></a></strong>
            <?php print $value['reply_message']; ?>
            </p>
        </div>

        <?php } } ?>

        </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    </body>
</html>