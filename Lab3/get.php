<!DOCTYPE html>
<html lang="en">
<head>

<!-- تُستخدم GET لإرسال البيانات عبر عنوان الـ URL.
المميزات:
1. يمكن رؤية البيانات في شريط العنوان.
2. يُستخدم لنقل البيانات غير الحساسة (مثل البحث في موقع).
3. يُمكن الإشارة إلى العنوان مباشرة أو تخزينه كمفضلة.

القيود:
1. الحد الأقصى لطول البيانات محدود.
2. لا يُستخدم لإرسال بيانات حساسة. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مثال على GET</title>
</head>
<body>
    <?php
    // التحقق إذا تم إرسال البيانات
    if (isset($_GET['username'])) {
        // طباعة البيانات المستلمة مع الحماية من الإدخال الضار
        $username = htmlspecialchars($_GET['username']);
        echo "<h3>مرحبا بك، $username!</h3>";
    }
    ?>
    <!-- نموذج لإرسال البيانات عبر GET -->
    <form method="GET">
        <label for="username">اسم المستخدم:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">إرسال</button>
    </form>
</body>
</html>