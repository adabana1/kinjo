<?php

$err_msg = [];

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

if ($link = get_db_connect()){

   $sql = 'SELECT community_id,host_user,user_name,area,title,community_detail,communities_table.created_at
           FROM communities_table
           JOIN user_table
           ON communities_table.host_user = user_table.user_id';
    
   $communities_data = get_as_array($link, $sql);
    
   close_db_connect($link);
    
} else {

    $err_msg[] = 'エラー: ' . mysqli_connect_error();
    
}

include_once '../include/view/view_communities.php';