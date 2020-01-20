<?php
require __DIR__ . '/../lib/library.php';
require __DIR__ . '/../helpers/helper.php';
$app = new SunriseClick();
$heading1 = is_param_value('heading1');
$heading2 = is_param_value('heading2');
$year  = is_param_value('year');
$month  = is_param_value('month');
$date  = is_param_value('date');
$hours = is_param_value('hours');
$minutes = is_param_value('minutes');
$seconds = is_param_value('seconds');
$fb_url = is_param_value('fb_url');
$ytb_url = is_param_value('ytb_url');
$twt_url = is_param_value('twt_url');
$data = [
    'heading1' => $heading1,
    'heading2' => $heading2,
    'year' => $year,
    'month' => $month,
    'date' => $date,
    'hours' => $hours,
    'minutes' => $minutes,
    'seconds' => $seconds,
    'fb_url' => $fb_url,
    'ytb_url' => $ytb_url,
    'twt_url' => $twt_url
];
$update = $app->updateHomePageDetails($data);
if($update){
    echo success('Updated Successfully');
} else {
    echo error('Please try again, something went wrong');
}
?>