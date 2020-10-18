<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KINJO　ホーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="kinjo.css">
</head>
    <body>
        <!--ヘッダー-->
        <header>
        <!--メニューバー-->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="home.php">マイページ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">トレーニング記録<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="#">コミュニティ一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../htdocs/logout.php">ログアウト</a>
                    </li>
                </ul>
                </div>
            </nav>
        </header>

        <div class="container">
            <h1>コミュニティ一覧</h1>
            <div class="col text-center">
                <button type="button" class="btn btn-primary btn-lg mt-2 mb-2">
                    <a href="../htdocs/new_community.php"><font color="#FFF">新しいコミュニティの作成</font></a>
                </button>
            </div>    
        </div>

        <?php if (count($communities_data) !== 0){ ?>
        <?php foreach($communities_data as $value){ ?>

        <!--コミュニティ一覧-->
        <form action="../htdocs/reply.php">
        <div class="item_all">
        <a class="hover" name="" href="../htdocs/reply.php?community_id=<?php print $value['community_id']?>">
            <div class="community_item">
                <div class="community_title">
                    <p?>作成者：<?php print $value['user_name'] ?><br>
                    作成日時：<?php print $value['created_at'] ?><br>
                    エリア：<?php print $value['area'] ?><br>
                    タイトル：<?php print $value['title'] ?></p>
                </div>

                <div class="community_detail">
                    <?php print $value['community_detail'] ?>
                </div>
            </div>
        </a>
        </div>

        </form>

        <?php }} ?>

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