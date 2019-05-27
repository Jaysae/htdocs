<?php
$servername = "localhost";
$sql_username = "root";
$qsl_password = "";
$dbname = "blog";

// 创建连接
$conn = new mysqli($servername, $sql_username, $qsl_password, $dbname);
$conn->query("set names utf8");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
