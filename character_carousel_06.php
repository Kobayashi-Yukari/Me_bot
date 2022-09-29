<?php 


$accessToken = 'ZVl4G9PbMVNOGnDQSFPvCH9+cooj0wsEqjaT9MvrlGtcSt4xHEmU6bIfGwyFfX8Fl3/sqBTjSXsukYEdvT+eA4ePsDEZ1Jm8AHfxLRNdH0eA/1Q1raZlo4Jdk40iGhTcNjEn7UAsuSrEyJl5dL94ngdB04t89/1O/w1cDnyilFU=';

$jsonString = file_get_contents('php://input'); 
error_log($jsonString); 
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
                    'title' => 'ブラック・ジャック(間 黒男)', 
                    'text' => 'ブラック・ジャック',
	             'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/bj.png', 
                     'actions' => [
                         [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '医療人としてはツッコミどころ満載のブラック・ジャックだけれども、手塚さんの伝えたいことがとてもわかりやすく描写されている',
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
