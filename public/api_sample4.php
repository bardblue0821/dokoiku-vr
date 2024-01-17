<?php

$url = "https://api.vrchat.cloud/api/1/worlds/wrld_7acbb0fb-0c54-4ab0-948a-34e2f924c568";

//cURLセッションを初期化する
$ch = curl_init();

//URLを指定する
curl_setopt($ch, CURLOPT_URL, $url);


// ユーザーエージェントを指定する
$userAgent = "Laravel/1.0 (bardblue0821@gmail.com)"; // ここに適切なアプリケーション名やバージョン、連絡先情報を入力
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

//URLの情報を取得する
$res = curl_exec($ch);

//セッションを終了する
curl_close($ch);
?>