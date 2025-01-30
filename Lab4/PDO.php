
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example_db";

try {
    // إنشاء الاتصال
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // تعيين نمط الخطأ إلى استثناء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "تم الاتصال بقاعدة البيانات بنجاح";
} catch (PDOException $e) {
    echo "فشل الاتصال: " . $e->getMessage();
}

// إغلاق الاتصال (اختياري، لأن الاتصال يتم غلقه تلقائيًا عند انتهاء السكربت)
$conn = null;
?>