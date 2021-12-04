<?php
include_once('parseurl.php');

if(isset($_POST['login'])){
    $data = ['login' => $_POST['login'], 'password' => $_POST['password']];
    $url = my_parse_url('url.json').'login/index.php';
    $response = get_post($data, $url);
    $result = json_decode($response, true);
    if(isset($result['answer'])){
        if($result['answer']=="Autorized"){
            $flag = false;
            header("Location: app.php?token=".$result['token'].'&user='.$_POST['login']);
        } else{
            echo $result['answer'];
        }

    } else{
        echo "Responce error {var_dump($result)}";
    }

}else if(isset($_POST['reg_login'])){
    $data =  ['reg_login' => $_POST['reg_login'], 'reg_password' => $_POST['reg_password'], 'reg_email'=>$_POST['reg_email']];
    $url = my_parse_url('url.json').'login/register.php';
    $response = get_post($data, $url);

    $result = json_decode($response, true);
    var_export($result);
    if(isset($result['answer'])){
        echo "Registration answer: ".$result['answer']."<br>";
    }

}