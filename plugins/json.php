<?php

echo $json = $_GET['json'];
//echo $_POST['json'];
echo $json = urldecode($json);
echo $json = str_replace("'", '"', $json);
//exit();
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

// stdClassのメンバへアクセス方法
//$json = "{'a':1,'b':2,'c':3,'d':4,'e':5}";
$arr = json_decode($json, true);
echo $arr['a'];
//echo $str = var_export($arr, true);
print_r($arr);
//echo $arr->res->blogData[0]->id;

// 連想配列へのアクセス方法
//$arr = json_decode($json, true);
//echo $arr['res']['blogData']['id'];
echo 12222;
