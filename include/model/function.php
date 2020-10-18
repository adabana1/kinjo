<?php

//データベース接続
function get_db_connect() {
    if (!$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME)) {
        die('error: ' . mysqli_connect_error());
    }
    mysqli_set_charset($link, DB_CHARACTER_SET);
    return $link;
}

// //データベース切断
function close_db_connect($link) {
    mysqli_close($link);
}

//特殊文字をHTMLエンティティに変換する
function entity_str($str) {
    return htmlspecialchars($str, ENT_QUOTES, HTML_CHARACTER_SET);
}

// リクエストメソッドを取得
function get_request_method() {
   return $_SERVER['REQUEST_METHOD'];
}

// POSTデータ取得
function get_post_data($key) {
   $str = '';
   if (isset($_POST[$key]) === true) {
       $str = $_POST[$key];
   }
   return $str;
}

// GETデータ取得
function get_GET_data($key) {
   $str = '';
   if (isset($_GET[$key]) === true) {
       $str = $_GET[$key];
   }
   return $str;
}


function get_as_array($link, $sql) {
    $data = [];
    // クエリを実行する
    if ($result = mysqli_query($link, $sql)) {
 
        if (mysqli_num_rows($result) > 0) {
            // １件ずつ取り出す
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            }
        }
        // 結果セットを開放
        mysqli_free_result($result);
    }
    return $data;
}

//文字が空かどうかをチェック
function check_empty($str){
    
    $res = true;
    
    if ($str === "") {
        $res = false;
    } else {
        $res = true;
    }
    return $res;
}

//数字かどうかをチャック
function check_number($str){
    
    $res = true;
    
    if (preg_match('/^[0-9]+$/',$str) !== 1){
        $res = false;
    } else {
        $res = true;
    }
     return $res;
}

//半角英数字かどうかをチャック
function check_an($str){
    
    $res = true;
    
    if (preg_match('/^[a-zA-Z0-9]+$/',$str) !== 1){
        $res = false;
    } else {
        $res = true;
    }
     return $res;
}

function check_strlen($str,$n){
    
    $res = true;
        
    if (mb_strlen($str) > $n){
        $res = false;
    } else {
        $res = true;
    }
    return $res;
}

function check_strlen_2($str,$n){
    
    $res = true;
        
    if (mb_strlen($str) < $n){
        $res = false;
    } else {
        $res = true;
    }
    return $res;
}

function check_mail($str){

    $res = true;
    
    if (preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',$str) !== 1){
        $res = false;
    } else {
        $res = true;
    }
     return $res;
}