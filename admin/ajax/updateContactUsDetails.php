<?php
require __DIR__ . '/../lib/library.php';
require __DIR__ . '/../helpers/helper.php';
$app = new SunriseClick();
$email = is_param_value('email');
$phone = is_param_value('phone');
$working_time  = is_param_value('working_time');
$working_days = is_param_value('working_days');
$off_days = is_param_value('off_days');
$data = [
    'email' => $email,
    'phone' => $phone,
    'working_time' => $working_time,
    'working_days' => $working_days,
    'off_days' => $off_days
];
$update = $app->updateContactUsDetails($data);
if($update){
    echo success('Updated Successfully');
} else {
    echo error('Please try again, something went wrong');
}
?>