<!DOCTYPE html>
<html lang="ja">
  <head>
      <meta charset="UTF-8">
      <title>KINJO ログイン</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="stylesheet" href="../kinjo.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <!--ヘッダー-->
    <header>
    <!--メニューバー-->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="home.php">KINJO -近所で筋トレ仲間を探そう-</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../new_community">コミュニティ作成<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../communities">コミュニティ一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout">ログアウト</a>
        </li>
      </ul>
    </div>
    </nav>
    </header>
    <div class="container-fluid">
      <div>
        <img src="../bruce-mars-HHXdPG_eTIQ-unsplash.jpg" alt="" class="top_img">
        </div>
      <!--ログイン-->
      <div class="input_container">
        <h1>Sign Up</h1>
        <p>登録したメールアドレスとパスワードを入力してください</p>

        <form method='post'>
          <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="mail_address" class="form-control" placeholder="メールアドレス">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password" class="form-control" placeholder="パスワード">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
        
        <p>アカウントをお持ちではないですか？<a href="../user_create">新規登録</a></p>
        
        <?php if (count($err_msg) !== 0){ ?>
        <?php foreach($err_msg as $value){ ?>
        <p class="p-3 mb-2 bg-danger text-white"><?php print $value; ?></p>            
        <?php } }?>
        
        <?php if (count($scc_msg) !== 0){ ?>
        <?php foreach($scc_msg as $value){ ?>
        <p class="p-3 mb-2 bg-success text-white"><?php print $value; ?></p>            
        <?php } } ?>

      </div>

      <footer>
        <!--コピーライト-->
        <div class="float-right">
            Copyright &copy; 2020 KINJO All Rights Reserved.
        </div>
      </footer>

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