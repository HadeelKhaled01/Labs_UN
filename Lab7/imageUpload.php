<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multi_image_upload_db";

// إنشاء الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من نجاح الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // عرض رسالة خطأ إذا فشل الاتصال
}

// متغير لتخزين رسالة الحالة (مثل نجاح العملية أو حدوث خطأ)
$statusMsg = "";

if (isset($_POST['upload'])) { // التحقق من أن المستخدم ضغط على زر "Upload"
    $targetDir = "uploads/"; // تحديد مسار المجلد الذي سيتم رفع الصور إليه
    $allowedTypes = array("jpg", "jpeg", "png", "gif"); // أنواع الصور المسموح برفعها

    if (!empty(array_filter($_FILES['images']['name']))) { // التحقق من أن هناك صور مرفوعة
        foreach ($_FILES['images']['name'] as $key => $fileName) { // التكرار على كل صورة تم رفعها
            $targetFilePath = $targetDir . basename($fileName); // المسار النهائي للصورة في المجلد
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // استخراج نوع الملف (امتداده)

            if (in_array(strtolower($fileType), $allowedTypes)) { // التحقق من أن نوع الملف مسموح به
                if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)) { // رفع الملف إلى المجلد
                    // إدخال مسار الملف في قاعدة البيانات
                    $stmt = $conn->prepare("INSERT INTO images (file_path) VALUES (?)"); // إعداد استعلام الإدخال
                    $stmt->bind_param("s", $targetFilePath); // ربط المتغير (مسار الصورة) بالاستعلام
                    $stmt->execute(); // تنفيذ الاستعلام
                    $stmt->close(); // إغلاق الاستعلام
                }
            }
        }
        $statusMsg = "Files uploaded successfully!"; // رسالة نجاح عند إتمام العملية
    } else {
        $statusMsg = "No files were selected."; // رسالة خطأ إذا لم يتم رفع أي ملف
    }
}

// جلب مسارات الصور المخزنة في قاعدة البيانات
$images = [];
$sql = "SELECT file_path FROM images"; // استعلام لجلب كل المسارات من الجدول
$result = $conn->query($sql);

if ($result->num_rows > 0) { // التحقق من وجود نتائج
    while ($row = $result->fetch_assoc()) { // قراءة كل صف وإضافته إلى المصفوفة
        $images[] = $row['file_path'];
    }
}

$conn->close(); // إغلاق الاتصال بقاعدة البيانات
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Multiple Images</title>
</head>
<body>
    <h1>Upload Images</h1>

    <!-- عرض رسالة الحالة إذا كانت موجودة -->
    <?php if (!empty($statusMsg)) echo "<p>$statusMsg</p>"; ?>

    <!-- نموذج رفع الصور -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple required> <!-- حقل اختيار ملفات متعددة -->
        <button type="submit" name="upload">Upload</button> <!-- زر الإرسال -->
    </form>

    <h2>Uploaded Images</h2>

    <!-- عرض الصور التي تم رفعها -->
    <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?> <!-- التكرار على مسارات الصور وعرضها -->
            <img src="<?= $image ?>" alt="Image" width="100"> <!-- عرض الصورة -->
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images uploaded yet.</p> <!-- رسالة إذا لم يتم رفع صور -->
    <?php endif; ?>
</body>
</html>
