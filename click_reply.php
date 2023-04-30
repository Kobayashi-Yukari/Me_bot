<?php
$messages = [
	[
		'type' => 'text',
		'text' => '何が知りたい？',
		'quickReply' => array(
			'items' => array(
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => '名前',
						'text' => '小林由香利(Kobayashi Yukari)',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => '出身地',
						'text' => '石川県生まれ',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => '趣味',
						'text' => '音楽/ライブ/アニメ/漫画などなど',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => 'ペット',
						'text' => '柴犬の「ぱん」ちゃんを飼っています',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => '前職',
						'text' => '臨床工学技士やってました！',
					)
				),
			)
		)
	]
];
?>
