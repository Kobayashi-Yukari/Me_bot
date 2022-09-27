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
		if($message['type'] == 'text') {
			$messages = [
				[
					'type' => 'text',
					'text' => 'omedeto-!!'
				]
			];
			replyMessage($client, $event['replyToken'], $messages);
            }
            error_log("Unsupporeted event type: " . $event['type']);
    }
}

?>
