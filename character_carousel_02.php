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
                    'title' => 'チーズ', 
                    'text' => 'それいけ！アンパンマン',
	             'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/chi_zu.png', 
                     'actions' => [
                         [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => 'チーズのモノマネできます',
                         ] 
                    ] 
                ],
                 [ 
                        'title' => 'ジャムおじさん', 
                        'text' => 'それいけ！アンパンマン', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/jam.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => 'アンパンマン号を作ったり、アンパンマンの替えの顔であるパンをつくのがうまい匠。現世にいたならば、いろんな企業から引っ張りだこであろう。',
                            ] 
                        ] 
                    ], 
                 [ 
                        'title' => 'カバオくん', 
                        'text' => 'それいけ！アンパンマン', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/kabao0.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '山寺さんを調べたところ、アンパンマンのキャラだけでなく、モノマネも1人で何役もできるとのこと。GACKTのモノマネが一番気になった。',
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
