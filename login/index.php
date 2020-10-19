<?php

// 設定ファイル読み込み
require_once '../include/conf/const.php';
// 関数ファイル読み込み
require_once '../include/model/function.php';
// セッション開始
session_start();

if (isset($_SESSION['user_id']) === TRUE) {
   // ログイン済みの場合、ホームページへリダイレクト
   header('Location: ../htdocs/home.php');
   exit;
}
// セッション変数からログインエラーフラグを確認
if (isset($_SESSION['login_err_flag']) === TRUE) {
   // ログインエラーフラグ取得
   $login_err_flag = $_SESSION['login_err_flag'];
   // エラー表示は1度だけのため、フラグをFALSEへ変更
   $_SESSION['login_err_flag'] = FALSE;
   
} else {
   // セッション変数が存在しなければエラーフラグはFALSE
   $login_err_flag = FALSE;
}

if (isset($_COOKIE['user_name']) === TRUE) {
   
   $user_name = $_COOKIE['user_name'];
   
} else {
   
   $user_name = '';
}
// 特殊文字をHTMLエンティティに変換
$user_name = entity_str($user_name);

if (get_request_method() === 'POST') {
    
    $mail_address = get_post_data('mail_address');
    
    if (check_empty($mail_address) === false){
        $err_msg[] = 'メールアドレスを入力してください';
                
    } else if (check_mail($mail_address) === false){
        $err_msg[] = 'メールアドレスを正しく入力してください';
        
    }
    
    $password = get_post_data('password');
    
    if (check_empty($password) === false){
        $err_msg[] = 'パスワードを入力してください';
        
    } else if (check_an($password) === false){
        $err_msg[] = 'パスワードは半角英数字を入力してください';
        
    }

    // var_dump($password);
    // exit;
    
    if (count($err_msg) === 0){

        // ユーザー名をCookieへ保存
        setcookie('user_name', $user_name, time() + 60 * 60 * 24 * 365);
        
        // データベース接続
        $link = get_db_connect();
        
        $sql = 'SELECT user_id FROM user_table WHERE mail_address =\'' . $mail_address . '\' AND password =\'' . $password . '\'';
               
        // SQL実行し登録データを配列で取得
        $data = get_as_array($link, $sql);

        // var_dump($data);
        // exit;
        
        if (count($data) === 0){
            
            $err_msg[] = 'メールアドレスまたはパスワードが違います';
            
        } else if (isset($data[0]['user_id'])) {
           // セッション変数にuser_idを保存
           $_SESSION['user_id'] = $data[0]['user_id'];
           
           if ((int)$data[0]['user_id'] === 1){
               header('Location: /admin.php');
            exit;
               
           } else {
           // ログイン済みユーザのホームページへリダイレクト
           header('Location: home.php');
           exit;
           
           }
           
        }
        
        // データベース切断
    close_db_connect($link);
        
    }
    
}

include_once '../include/view/view_login.php';