<?php

$area = [
'北海道',
'青森県',
'岩手県',
'宮城県',
'秋田県',
'山形県',
'福島県',
'茨城県',
'栃木県',
'群馬県',
'埼玉県',
'千葉県',
'東京都',
'神奈川県',
'新潟県',
'富山県',
'石川県',
'福井県',
'山梨県',
'長野県',
'岐阜県',
'静岡県',
'愛知県',
'三重県',
'滋賀県',
'京都府',
'大阪府',
'兵庫県',
'奈良県',
'和歌山県',
'鳥取県',
'島根県',
'岡山県',
'広島県',
'山口県',
'徳島県',
'香川県',
'愛媛県',
'高知県',
'福岡県',
'佐賀県',
'長崎県',
'熊本県',
'大分県',
'宮崎県',
'鹿児島県',
'沖縄県',
];

?>

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

        <div class="container">
            <h1>新しいコミュニティの作成</h1>
            <p class="text-center">エリアを選択し、タイトル・詳細を記入してください</p>
            <div class="new_container">
                <form method="post">
                    <label class="button_label" for="community_text">エリア：</label>
                    <select class="form-control" name='community_area'>
                        <option hidden>選択してください</option>
                        <?php foreach ($area as $key => $area) {?>
                        <option value="<?php print $area; ?>"><?php print $area;?></option>
                        <?php } ?>
                    </select><br>

                    <div class="form-group">
                        <label class="button_label" for="community_title">タイトル：</label>
                        <select class="form-control" name='community_title'>
                            <option hidden>選択してください</option>
                            <option>筋トレします！</option>
                            <option>合トレしよう！</option>
                            <option>筋トレしたよ！</option>
                        </select>
                    </div>

                    <div class="form-group">    
                        <label class="button_label" for="community_detail">詳細：</label>
                        <textarea class="form-control" rows="3" name='community_detail'></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary btn-block">新規作成</button>
                    </div>
                </form>
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