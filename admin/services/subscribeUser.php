<?php
require __DIR__ . '/../lib/library.php';
require __DIR__ . '/../helpers/helper.php';
$name = is_param_value('name');
$email = is_param_value_email('email');
$data = [
    'name' => $name,
    'email' => $email
];
$app = new SunriseClick();
$subscribe = $app->subscribeUser($data);
if($subscribe==200){
    echo success('Thanks for subscribing our newsletter!');
} else if($subscribe == 201) {
    echo error('You are already subscribed!');
} else {
    echo error('Please try again, Something went wrong');
}