<?php

$err_msg = [];
$scc_msg = [];
$date = date('Y-m-d H:i:s');

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

    $community_id = get_GET_data('community_id');

    if (get_request_method() === 'POST'){
       
        $community_id = get_post_data('community_id');

        $reply_message = get_post_data('reply_message');

        if (check_empty($reply_message) === false){

                $err_msg[] = 'メッセージを入力してください';
                
        }

        if (count($err_msg) === 0){

            mysqli_autocommit($link,false);

            $data = [
                'community_id' => $community_id,
                'reply_user' => $user_id,
                'created_at' => $date,
                'reply_message' => $reply_message
            ];

            $sql = 'INSERT INTO reply_table(community_id,reply_user,created_at,reply_message) VALUES(\''.implode('\',\'',$data).'\')';
        
            if (mysqli_query($link,$sql) !== true){

                $err_msg[] = 'reply_table: insertエラー:' . $sql;
                
            }

            if (count($err_msg) === 0){

                $scc_msg[] = 'メッセージ投稿に成功しました';
                    
                mysqli_commit($link);
                    
            } else {

                $err_msg[] = 'コメッセージ投稿に失敗しました';
                
                mysqli_rollback($link);
                
            }

        }

   }

   $sql = 'SELECT community_id,host_user,user_name,area,title,community_detail
            FROM communities_table
            JOIN user_table
            ON communities_table.host_user = user_table.user_id
            WHERE community_id=' .$community_id;
    
    $communities_data = get_as_array($link, $sql);

    $sql = 'SELECT user_name,reply_user,reply_table.created_at,reply_message
            FROM reply_table
            JOIN user_table
            ON user_id=reply_user
            WHERE community_id=' .$community_id;

    $reply_data = get_as_array($link, $sql);

    
   close_db_connect($link);
    
} else {

    $err_msg[] = 'エラー: ' . mysqli_connect_error();
    
}

include_once '../include/view/view_reply.php';