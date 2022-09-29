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
                    'title' => 'アスラン・ザラ', 
                    'text' => '機動戦士ガンダムSEED/DESTINY',
	             'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/zara.png', 
                     'actions' => [
                         [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '中学生の時にこのアニメと出会った。当時はこのアニメを全世界の人が見れば戦争なんて起きないのに。って本気で思ってた。',
                         ] 
                    ] 
                ],
                 [ 
                        'title' => '渚カヲル', 
                        'text' => '新世紀エヴァンゲリオン', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/kaworu.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '親友が本命の推しキャラ',
                            ] 
                        ] 
                    ], 
                 [ 
                        'title' => '猗窩座', 
                        'text' => '鬼滅の刃', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/akaza.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '石田さんはどうして癖の強いキャラに当たるのだろう。',
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
