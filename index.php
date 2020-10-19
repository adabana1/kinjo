<?php

// 設定ファイル読み込み
require_once 'include/conf/const.php';
// 関数ファイル読み込み
require_once 'include/model/function.php';

if ($link = get_db_connect()){
    
    if (get_request_method() === 'POST'){
        
        if (isset($_POST['user_name']) === true){
            $user_name = $_POST['user_name'];
            
            if (check_empty($user_name) === false){
                $err_msg[] = 'ユーザー名を入力してください';
                
            } else if (check_strlen_2($user_name,２) === false){

                $err_msg[] = 'ユーザ名は２文字以上を入力してください';
                
            }
            
        }

        if (isset($_POST['mail_address']) === true){
            $mail_address = $_POST['mail_address'];
            
            if (check_empty($mail_address) === false){
                $err_msg[] = 'メールアドレスを入力してください';
                
            } else if (check_mail($mail_address) === false){

                $err_msg[] = 'メールアドレスを正しく入力してください';
            }
            
        }
        
        if (isset($_POST['password']) === true){
            $password = $_POST['password'];
            
            if (check_empty($password) === false){
                $err_msg[] = 'パスワードを入力してください';
                
            } else if (check_an($password) === false){
                $err_msg[] = 'パスワードは半角英数字を入力してください';
                
            } else if (check_strlen_2($password,6) === false){
                $err_msg[] = 'パスワードは6文字以上の半角英数字を入力してください';
                
            }
            
        }
    
        if (count($err_msg) === 0){
            
            $sql = 'SELECT user_name FROM user_table WHERE user_name =\'' . $user_name . '\'';
            
            $result = mysqli_query($link, $sql);
            
            if (mysqli_num_rows($result) === 0){
                
                mysqli_autocommit($link,false);
                
                $date = date('Y-m-d H:i:s');
                
                $sql = 'INSERT INTO user_table(user_name,mail_address,password,created_at) VALUES(\''.$user_name.'\',\''.$mail_address.'\',\''.$password.'\',\''.$date.'\')';
                
                if (mysqli_query($link,$sql) !== true){
                    
                    $err_msg[] = 'user_table: insertエラー:' . $sql;
                    
                }
                
            } else {
                
                $err_msg[] = 'このユーザー名は使用できません';
                
            }
            
        }  
        
        if (count($err_msg) === 0){
            
            $scc_msg[] = 'アカウント作成を完了しました。ログインしてください。';
            
            mysqli_commit($link);
            
        } else {
            
            mysqli_rollback($link);
   
        }
        
    }
    
} else {
    
    $err_msg[] = 'エラー: ' . mysqli_connect_error();
    
}

include_once 'include/view/view_user_create.php';