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


                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => '我が家のアイドルです'
                            ),
                            array(
                                'type' => 'image',
                                'originalContentUrl' => 'https://pompon-blog.com/me_bot/images/1024x1024isi.png',
                                'previewImageUrl' => 'https://pompon-blog.com/me_bot/images/1024x1024isi.png',
                            )
                        )
                    ));

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
