<?php
require_once('./LINEBotTiny.php');

$channelAccessToken = 'ZVl4G9PbMVNOGnDQSFPvCH9+cooj0wsEqjaT9MvrlGtcSt4xHEmU6bIfGwyFfX8Fl3/sqBTjSXsukYEdvT+eA4ePsDEZ1Jm8AHfxLRNdH0eA/1Q1raZlo4Jdk40iGhTcNjEn7UAsuSrEyJl5dL94ngdB04t89/1O/w1cDnyilFU=';
$channelSecret = '9618a4470eb85b12b102e467093ece8b';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

function replyMessage($client, $reply_token, $messages) {
	return $client->replyMessage([
		'replyToken' => $reply_token,
		'messages' => $messages
	]);
}

foreach ($client->parseEvents() as $event) {
	if ($event['type'] == 'message') {
		$message = $event['message'];
             switch ($message['type']) {
                case 'text':
                if ($message['text'] == '小林さんのことを教えて！') {

			require_once('./click_reply.php');
			replyMessage($client, $event['replyToken'], $messages);

                } elseif ($message['text'] == '実はバンギャなので、追っかけしています。') {

			require_once('./carousel.php');

                } elseif ($message['text'] == '好きな声優さんを教えて！') {

			require_once('./click_reply_seiyu.php');
			replyMessage($client, $event['replyToken'], $messages);

                } elseif ($message['text'] == '好きなアニメと漫画を教えて！') {

			require_once('./anime.php');
			replyMessage($client, $event['replyToken'], $messages);

                } elseif ($message['text'] == '柴犬の「ぱん」ちゃんを飼っています') {

			require_once('./dog_image.php');
			
                } elseif ($message['text'] == '津田健次郎さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_01.php');
			
                } elseif ($message['text'] == '山寺宏一さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_02.php');
			
                } elseif ($message['text'] == '中村悠一さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_03.php');
			
                } elseif ($message['text'] == '緒方恵美さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_04.php');

                } elseif ($message['text'] == '石田彰さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_05.php');

                } elseif ($message['text'] == '大塚明夫さんが声優を担当したキャラクター一覧') {

			require_once('./character_carousel_06.php');

                } else {
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                }
                    break;
                case 'image':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                    break;
                default:
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => 'MUCCってバンドはサイコーよ！'
                            )
                        )
                    ));
                    break;
            }
      //  error_log(print_r($event, true) . "\n", 3, 'debug.log');
	}
}

?>
