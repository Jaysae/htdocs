<?php
function MySQL()
{
    $servername = "localhost";
    $sql_username = "root";
    $qsl_password = "";
    $dbname = "blog";
    $conn = new mysqli($servername, $sql_username, $qsl_password, $dbname);
    $conn->query("set names utf8");
    // Check connection
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    return $conn;
}
function Login($name, $password)
{
    $conn = MySQL();
    //$sql = "SELECT * FROM user_center WHERE upper(username_t) LIKE upper('$name')";
    $sql = "SELECT * FROM user_center WHERE username_t LIKE '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        $row = $result->fetch_assoc();
    $password = md5($password . $row['password_offset']);
    if ($password  == $row['password_t']) {
        session_start();
        $_SESSION['username'] = $name;
        $_SESSION['login'] = true;
        $_SESSION['showToast'] = true;
        return  "true";
    }
}
function Logout()
{
    session_start();
    if (isset($_SESSION['username']))   unset($_SESSION['username']);
    if (isset($_SESSION['login']))  $_SESSION['login'] = false;
    if (isset($_SESSION['showToast']))  $_SESSION['showToast'] = true;
    return  "true";
}
function Reg($name, $password)
{
    $conn = MySQL();
    $pw = $password;
    //$sql = "SELECT * FROM user_center WHERE upper(username_t) LIKE upper('$name')";
    $sql = "SELECT * FROM user_center WHERE username_t LIKE '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        return "该用户名已被使用..";
    else {
        $md5 =  md5(time() . mt_rand(1, 1000000));
        $md5 = substr($md5, 4, 4) . substr($md5, 12, 4);
        $password = md5($password . $md5);
        $sql = "INSERT INTO user_center (username_t, password_t, password_offset) VALUES ('$name','$password','$md5')";
        $conn->query($sql);
        Login($name, $pw);
        return "true";
    }
}
function Comment($articleId, $userId, $content)
{
    $conn = MySQL();
    date_default_timezone_set("Etc/GMT-8");
    $time = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comment (content, date, article_id,user_id) VALUES ('$content','$time','$articleId','$userId')";
    $conn->query($sql);
    return  "true";
}
$func = $_REQUEST["function"];
if (function_exists($func)) {
    $fs = isset($_REQUEST["age"]) ? explode(",", $_REQUEST["age"]) : array();
    echo call_user_func_array($func, $fs);
}
