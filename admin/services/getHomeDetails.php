<?php
require __DIR__ . '/../lib/library.php';
require __DIR__ . '/../helpers/helper.php';
$app = new SunriseClick();
$homedetails = $app->getHomePageDetails();
if($homedetails){
    echo success('home page details found successfully', $homedetails);
} else {
    echo error('home page details not found');
}