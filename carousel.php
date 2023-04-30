<?php 

require_once('./db_connect.php');
//DB処理

$sql = "SELECT url FROM mucc ORDER BY RAND() LIMIT 1";
$results = $dbh->query($sql);
$mucc_playlist = $results->fetchAll(PDO::FETCH_COLUMN);

$sql = "SELECT url FROM girugamesh ORDER BY RAND() LIMIT 1";
$results = $dbh->query($sql);
$girgamesh_playlist = $results->fetchAll(PDO::FETCH_COLUMN);


$sql = "SELECT url FROM mix_artist ORDER BY RAND() LIMIT 1";
$results = $dbh->query($sql);
$mix_artist_playlist = $results->fetchAll(PDO::FETCH_COLUMN);

$accessToken = 'ZVl4G9PbMVNOGnDQSFPvCH9+cooj0wsEqjaT9MvrlGtcSt4xHEmU6bIfGwyFfX8Fl3/sqBTjSXsukYEdvT+eA4ePsDEZ1Jm8AHfxLRNdH0eA/1Q1raZlo4Jdk40iGhTcNjEn7UAsuSrEyJl5dL94ngdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input'); error_log($jsonString); 
$jsonObj = json_decode($jsonString); 
$message = $jsonObj->{"events"}[0]->{"message"}; 
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};


    // カルーセルタイプ 
    $messageData = [ 
        'type' => 'template', 
        'altText' => 'carousel', 
        'template' => [
             'type' => 'carousel', 
            'columns' => [ 
                [ 
                    'title' => 'MUCC', 
                    'text' => 'MUCCに出会い人生が変わりました',
	             'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/logo_images/mucc_logobonji.png', 
                     'actions' => [
                         [ 
                            'type' => 'uri', 
                            'label' => '彼らの音楽はコチラから',
                             'uri' => $mucc_playlist[0],
                         ] 
                    ] 
                ],
                 [ 
                        'title' => 'Girugamesh', 
                        'text' => '解散した今でも大好きです', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/logo_images/girugamesh_logo.png', 
                        'actions' => [ 
                            [ 
                                'type' => 'uri', 
                                'label' => '彼らの勇姿はコチラから',
                                'uri' => $girgamesh_playlist[0],
                            ] 
                        ] 
                    ], 
                 [ 
                        'title' => '好きなアーティスト', 
                        'text' => '振り幅大きめです', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/1024x1024isi.png', 
                        'actions' => [ 
                            [ 
                                'type' => 'uri', 
                                'label' => '何が出るでしょう？',
                                'uri' => $mix_artist_playlist[0],
                            ] 
                        ] 
                    ], 
                ] 
            ] 
    ];
$response = [ 'replyToken' => $replyToken, 'messages' => [$messageData] ]; 
error_log(json_encode($response)); 
$ch = curl_init('https://api.line.me/v2/bot/message/reply'); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($response)); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json; charser=UTF-8', 'Authorization: Bearer ' . $accessToken )); 
$result = curl_exec($ch); error_log($result); 
curl_close($ch);
