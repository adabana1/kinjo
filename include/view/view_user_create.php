<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KINJO ユーザー新規登録</title>
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
            <a class="navbar-brand" href="home.php">KINJO -近所で筋トレ仲間を探そう-</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="../htdocs/new_community.php">コミュニティ作成<span class="sr-only">(current)</span></a>
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
        <div class="container-fluid">
            <div>
                <img src="./bruce-mars-y0SMHt74yqc-unsplash.jpg" alt="" class="top_img">
            </div>
            <div class="input_container">
                <h2>ユーザー新規登録</h2>
                <form method="post">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationDefaultUsername">ユーザー名</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="user_name" placeholder="ユーザー名">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>メールアドレス</label>
                            <input type="text" class="form-control" name="mail_address" placeholder="メールアドレス">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>パスワード</label>
                            <input type="text" class="form-control" name="password" placeholder="パスワード">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>パスワードの確認</label>
                            <input type="text" class="form-control" name="pw_confirm" placeholder="パスワードの確認">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label">
                                利用規約に同意します
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">新規登録</button>
                    <p>アカウントをお持ちですか？<a href="../htdocs/login.php">ログイン</a></p>
                </form>

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