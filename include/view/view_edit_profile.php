<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KINJO　ホーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kinjo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
                    <a class="nav-link" href="../htdocs/communities.php">コミュニティ一覧</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../htdocs/logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- <div class="alert alert-success" style="margin:0">ログインに成功しました</div> -->

    <div class="container">
        <h1>プロフィール編集</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="d-flex flex-row col-sm-12">
                
                <?php foreach($profile_data as $value){ ?>

                <div class="profile_image">
                    <img class="img" src="../img/<?php print $value['img']; ?>"><br>
                    <br><input name="new_img" type="file" class='file'>
                </div>

                <div class="new_container ml-5">
                    <label class="button_label" for="user_name">ユーザー名：</label>
                    <input type="text" class="form-control" rows="1" name='user_name' value="<?php print $value['user_name']; ?>"></input><br>

                    <div class="form-group">    
                        <label class="button_label" for="profile">自己紹介：</label>
                        <input type="text" class="form-control" rows="5" name='profile' value="<?php print $value['profile']; ?>"></input>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary btn-block">変更</button>
                    </div>
            
                <br>
                <!--エラー表示-->
                <?php if (count($err_msg) !== 0){ ?>
                    <?php foreach($err_msg as $value){ ?>
                    <p class="p-3 mb-2 bg-danger text-white"><?php print $value; ?></p>            
                <?php } }?>
                
                <?php if (count($scc_msg) !== 0){ ?>
                    <?php foreach($scc_msg as $value){ ?>
                    <p class="p-3 mb-2 bg-success text-white"><?php print $value; ?></p>            
                <?php } } ?>
                
                <?php } ?>


                </div>
            </div>
        </form>
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