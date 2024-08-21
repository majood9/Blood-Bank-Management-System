<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root"; // اسم المستخدم
$password = ""; // كلمة المرور
$database = "secyear"; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = mysqli_connect($servername, $username, $password, $database);

// التحقق من نجاح الاتصال
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// ...
?>