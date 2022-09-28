<?php

$array = array(
'プロメア',
'SPY × FAMILY',
'チェンソーマン',
'呪術廻戦',
'カードキャプターさくら',
'スラムダンク',
'鋼の錬金術師',
'鬼滅の刃',
'僕のヒーローアカデミー',
'コードギアス',
'ガンダムSEED/DESTNY',
'ブラックジャック',
'美少女戦士セーラームーン',
'彩雲國物語',
'転生したらスライムだった件',
'ゴールデンカムイ',
'マギ',
'封神演義',
'来世は他人がいい',
'妖狐×僕SS',
'十二国記',
'竜とそばかすの姫',
'遊戯王',
'君の名は'
);

$rand_keys = array_rand($array, 3);

$client->replyMessage(array(
'replyToken' => $event['replyToken'],
'messages' => array(
    array(
	'type' => 'text',
	'text' => $array[$rand_keys[0]]
    ),
    array(
	'type' => 'text',
	'text' => $array[$rand_keys[1]]
    ),
    array(
	'type' => 'text',
	'text' => $array[$rand_keys[2]]
    ),
    array(
	'type' => 'text',
	'text' => 'タップする度に好きなものが変わるよ',
    ),
)
));
?>
