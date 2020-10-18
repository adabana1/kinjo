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
    <div class="d-flex flex-row col-sm-5">

      <?php foreach($profile_data as $value){ ?>

        <div class="profile_image">
            <img class="img" src="../img/<?php print $value['img']; ?>">
        </div>

        <div class="col-sm-12 user_container">
        <!--ユーザー名-->
            <h1 class="user_name"><?php print $user_name; ?></h1>
          
            <!--自己紹介文-->
            <div class="introduction text-center">
                <p class="lead text-muted"><?php print $value['profile']; ?></p>
            </div>
            <!--プロフィール編集-->
                <!--ユーザー自身の場合、プロフィール編集ボタン-->
                <div class="text-center">
                  <button type="button" class="btn btn-primary btn-lg mt-2 mb-2">
                      <a href="../htdocs/edit_profile.php"><font color="#FFF">プロフィール編集</font></a>
                  </button>
                </div>

            <!--過去に作成したコミュニティ一覧の表示-->
            <div class="community_container text-center">
                <p class="community">過去に作成したコミュニティ</p>            
            </div>
        </div>

        <?php } ?>
    </div>
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