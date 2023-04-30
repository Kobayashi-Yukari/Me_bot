<?php

$array = array(
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1672.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1736.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1795.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1798.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1850.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1900.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1963.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_2752.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_1148.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_3082.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_2752.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_2730.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_2290.JPG',
'https://pompon-blog.com/me_bot/images/dog_images/IMG_2124.JPG',
);

$rand_keys = array_rand($array, 1);


      error_log(print_r($array[$rand_keys], true) . "\n", 3, 'debug.log');

$rand_keys = array_rand($array, 1);

$client->replyMessage(array(
'replyToken' => $event['replyToken'],
'messages' => array(
    array(
	'type' => 'text',
	'text' => '我が家の愛犬「ぱん」ちゃんです',
    ),
    array(
    'type' => 'image',
	'originalContentUrl' => $array[$rand_keys],
	'previewImageUrl' => $array[$rand_keys],
    ),
    array(
	'type' => 'text',
	'text' => 'タップする度に画像が変わるよ!',
    ),
)
));
?>
