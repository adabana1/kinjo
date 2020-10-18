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

if ($link = get_db_connect()){

    if (get_request_method() === 'POST'){
     
        if (isset($_POST['community_area']) === true){

            $community_area = get_post_data('community_area');

            if ((check_empty($community_area) === false)||($community_area === '選択してください')){

                $err_msg[] = 'エリアを選択してください';

            } 

        }

        if (isset($_POST['community_title']) === true){

            $community_title = get_post_data('community_title');

            if ((check_empty($community_title) === false)||($community_title === '選択してください')){

                $err_msg[] = 'タイトルを選択してください';

            } 

        }

        if (isset($_POST['community_detail']) === true){

            $community_detail = get_post_data('community_detail');

            if (check_empty($community_detail) === false){

                $err_msg[] = '詳細を入力してください';

            } else if (check_strlen($community_detail,300) === false){

                $err_msg[] = '詳細は300字以内で入力してください';

            }

        }

        if (count($err_msg) === 0){
                
            mysqli_autocommit($link,false);
            
            $data = [
                'host_user' => $user_id,
                'area' => $community_area,
                'title' => $community_title,
                'community_detail' => $community_detail,
                'created_at' => $date
            ];

            $sql = 'INSERT INTO communities_table(host_user,area,title,community_detail,created_at) VALUES(\''.implode('\',\'',$data).'\')';
        
            if (mysqli_query($link,$sql) !== true){

                $err_msg[] = 'communities_table: insertエラー:' . $sql;
                
            }

            if (count($err_msg) === 0){

                $scc_msg[] = 'コミュニティ新規作成に成功しました';
                    
                mysqli_commit($link);
                    
            } else {

                $err_msg[] = 'コミュニティ新規作成に失敗しました';
                
                mysqli_rollback($link);
                
            }

        }       
        
    }

    close_db_connect($link);

} else {

    $err_msg[] = 'エラー: ' . mysqli_connect_error();

}

include_once '../include/view/view_new_community.php';