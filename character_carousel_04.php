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
                    'title' => '天王はるか / セーラーウラヌス', 
                    'text' => '美少女戦士セーラームーン',
	             'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/uranuss.png', 
                     'actions' => [
                         [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => '大人になって考えると、このキャラ設定はすごい',
                         ] 
                    ] 
                ],
                 [ 
                        'title' => '月城雪兎 / ユエ', 
                        'text' => 'カードキャプターさくら', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/yukiyue.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => 'こんな兄が欲しかった',
                            ] 
                        ] 
                    ], 
                 [ 
                        'title' => '乙骨憂太', 
                        'text' => '呪術廻戦', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/okkotu.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => 'こんな虫も殺せないような見た目なのに、Gとキスしちゃうとか。めっちゃぶっ飛んでるキャラ。',
                            ] 
                        ] 
                    ], 
                 [ 
                        'title' => '碇シンジ', 
                        'text' => '新世紀エヴァンゲリオン', 
	                'thumbnailImageUrl' => 'https://pompon-blog.com/me_bot/images/character_images/shinji.png', 
                        'actions' => [ 
                            [ 
				    'type' => 'message', 
				    'label' => 'キャラクターへのコメント',
				    'text' => 'ごめん、エヴァは守備圏外なのです。しかし、乙骨と同じ匂いを感じる。。',
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
