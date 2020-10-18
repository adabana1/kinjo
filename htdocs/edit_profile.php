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

    if (get_request_method() === 'POST'){

            if (isset($_FILES['new_img']['tmp_name']) !== true){

                $err_msg[] = 'ファイルを選択してください';
                
            } else if ($_FILES['new_img']['error'] === 2) {

                $err_msg[] = 'ファイルサイズが大きすぎます';
                 
            } else if ($_FILES['new_img']['size'] === 0) {

                $err_msg[] = '画像ファイルが選択されていません';
                 
            } else if (!(($_FILES['new_img']['type'] === 'image/jpeg') || ($_FILES['new_img']['type'] === 'image/png'))) {

                $err_msg[] = '画像ファイルではありません';
                
            } else if ($_FILES['new_img']['error'] !== 0) {

                $err_msg[] = 'アップロードに失敗しました';
                
            } else {     
                
                $temp_file = $_FILES['new_img']['tmp_name'];        
                
                $file = sha1(uniqid(mt_rand(), true));
                
                if ($_FILES['new_img']['type'] === 'image/jpeg'){

                    $file = $file . '.jpg';
            
                } else {

                    $file = $file . '.png';
                }
                
                if (is_uploaded_file($temp_file)){
                    
                    if (move_uploaded_file($temp_file, '../img/' . $file) !== true){

                        $err_msg[] = 'アップロードに失敗しました';
                        
                    }
                    
                } else {
                    
                    $err_msg[] = '画像ファイルが選択されていません';
                    
                } 
                
            } 


        $user_name = get_post_data('user_name');

        if (check_empty($user_name) === false){

            $err_msg[] = 'ユーザー名を入力してください';

        } else if (check_strlen($user_name,10) === false){

            $err_msg[] = 'ユーザー名は10字以内で入力してください';
            
        }

        $profile = get_post_data('profile');

        if (check_empty($profile) === false){

            $err_msg[] = '自己紹介を入力してください';

        } else if (check_strlen($profile,100) === false){

            $err_msg[] = '自己紹介は100字以内で入力してください';
            
        }

        if (count($err_msg) === 0){

            mysqli_autocommit($link,false);

            $sql = 'UPDATE user_table SET user_name=\''.$user_name.'\', profile=\''.$profile.'\',img=\'' .$file.'\',update_at=\''.$date.'\' WHERE user_id='.$user_id;

            if (mysqli_query($link,$sql) !== true){

                $err_msg[] = 'user_table: エラー:' . $sql;
                mysqli_rollback($link);
                
            } else {

                $scc_msg[] = 'プロフィール更新に成功しました';
                    
                mysqli_commit($link);

            }

        }

    }

    $sql = 'SELECT user_name,profile,img FROM user_table WHERE user_id='.$user_id;
    
    $profile_data = get_as_array($link, $sql); 

    // var_dump($profile_data);
    // exit;

    close_db_connect($link); 

} else {

    $err_msg[] = 'エラー: ' . mysqli_connect_error();

}

include_once '../include/view/view_edit_profile.php';