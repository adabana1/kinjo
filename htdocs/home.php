<?php

// 設定ファイル読み込み
require_once '../include/conf/const.php';
// 関数ファイル読み込み
require_once '../include/model/function.php';
// セッション開始
// セッション開始
session_start();
// セッション変数からuser_id取得
if (isset($_SESSION['user_id']) === TRUE) {
    
   $user_id = $_SESSION['user_id'];
   
} else {
   // 非ログインの場合、ログインページへリダイレクト
   header('Location: login.php');
   exit;
}
// データベース接続
$link = get_db_connect();
// user_idからユーザ名を取得するSQL
$sql = 'SELECT user_name FROM user_table WHERE user_id = ' . $user_id;
// SQL実行し登録データを配列で取得
$data = get_as_array($link, $sql);
// データベース切断
close_db_connect($link);
// ユーザ名を取得できたか確認
if (isset($data[0]['user_name'])) {
    
   $user_name = $data[0]['user_name'];
   
} else {
   // ユーザ名が取得できない場合、ログアウト処理へリダイレクト
   header('Location: login.php');
   exit;
}

if ($link = get_db_connect()){

   $sql = 'SELECT user_name,profile,img FROM user_table WHERE user_id='.$user_id;

   $profile_data = get_as_array($link, $sql); 

   close_db_connect($link); 

} else {

   $err_msg[] = 'エラー: ' . mysqli_connect_error();

}


include_once '../include/view/view_home.php';