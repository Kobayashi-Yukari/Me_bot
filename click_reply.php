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
						'text' => '石川県金沢市生まれ',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => '趣味',
						'text' => 'DIY,アニメ見たり,旅行,プログラミングで便利なもの作ったり。',
					)
				),
				array(
					'type' => 'action',
					'action' => array(
						'type' => 'message',
						'label' => 'おいくつ?',
						'text' => 'まだ、33歳',
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
