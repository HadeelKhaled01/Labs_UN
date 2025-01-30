
<!DOCTYPE html>
<html lang="en">
<head>
<!-- 
تُستخدم POST لإرسال البيانات داخل الطلب.
المميزات:
1. لا تظهر البيانات في شريط العنوان.
2. يُمكن إرسال كمية كبيرة من البيانات.
3. تُعتبر أكثر أمانًا من GET لنقل البيانات الحساسة.

القيود:
1. البيانات لا تكون مرئية مباشرة للمستخدم. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مثال على POST</title>
</head>
<body>
    <?php
    // التحقق إذا تم إرسال البيانات
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
        // طباعة البيانات المستلمة مع الحماية من الإدخال الضار
        $email = htmlspecialchars($_POST['email']);
        echo "<h3>تم استلام بريدك الإلكتروني: $email</h3>";
    }
    ?>
    <!-- نموذج لإرسال البيانات عبر POST -->
    <form method="POST">
        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">إرسال</button>
    </form>
</body>
</html>
