<?php
function isNotLogin(){
    if(empty($_SESSION['user_id']))
    {
        header("Location: index.php");
    }
}

function isLogin(){
    if(!empty($_SESSION['user_id']))
    {
        header("Location: dashboard.php");
    }
}

function is_param_value($key){
    if(isset($_REQUEST[$key]) && $_REQUEST[$key] != null){
        return $_REQUEST[$key];
    } else {
        echo error($key.' field is require');die;
    }
}

function is_param_value_email($key){
    if(isset($_REQUEST[$key]) && $_REQUEST[$key] != null){
        if (!filter_var($_REQUEST[$key], FILTER_VALIDATE_EMAIL)) {
            echo error('Please enter valid email address');die;
        }
        return $_REQUEST[$key];
    } else {
        echo error($key.' field is require');die;
    }
}


function success($msg,$data=null){
    $arr = [
        'status'=>true,
        'message'=>$msg,
        'data'=>$data
    ];
    return json_encode($arr);
}

function error($msg){
    $arr = [
        'status'=>false,
        'message'=>$msg
    ];
    return json_encode($arr);
}
?>