
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example_db";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

echo "تم الاتصال بقاعدة البيانات بنجاح";

// إغلاق الاتصال
$conn->close();
?>
