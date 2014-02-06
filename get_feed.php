<?php

require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token'        => "!! oauth_access_token",
    'oauth_access_token_secret' => "!! oauth_access_token_secret",
    'consumer_key'              => "!! consumer_key",
    'consumer_secret'           => "!! consumer_secret",
);

$url           = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield      = '?screen_name='.$_GET['screen_name'].'&count='.$_GET['count'];
$requestMethod = 'GET';
$twitter       = new TwitterAPIExchange($settings);

header('Content-Type: application/json');

$response = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();

echo json_encode($response);
