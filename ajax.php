<?php
function Login($name, $password)
{
    include 'tool.php';
    //$sql = "SELECT * FROM user_center WHERE upper(username_t) LIKE upper('$name')";
    $sql = "SELECT * FROM user_center WHERE username_t LIKE '$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
        $row = $result->fetch_assoc();
    else return "false";
    $password = md5($password . $row['password_offset']);
    session_start();
    $_SESSION['username'] = $name;
    return $password  == $row['password_t'] ? "true" : "false";
}
$func = $_REQUEST["function"];
if (function_exists($func)) {
    $fs = isset($_REQUEST["age"]) ? explode(",", $_REQUEST["age"]) : array();
    echo call_user_func_array($func, $fs);
} else {
    echo "false";
}
