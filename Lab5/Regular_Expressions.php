<?php
// 1. التحقق من وجود كلمة معينة في نص
$pattern = "/hello/"; // تعبير يبحث عن الكلمة "hello" في النص
$text = "hello world!";
if (preg_match($pattern, $text)) {
    echo "Found 'hello' in the text!\n";
}

// 2. التحقق من نص يبدأ بكلمة محددة
$pattern = "/^hello/"; // يبدأ النص بكلمة "hello"
if (preg_match($pattern, $text)) {
    echo "The text starts with 'hello'.\n";
}

// 3. التحقق من نص ينتهي بكلمة محددة
$pattern = "/world!$/"; // ينتهي النص بكلمة "world!"
if (preg_match($pattern, $text)) {
    echo "The text ends with 'world!'.\n";
}

// 4. التحقق من وجود أرقام فقط
$pattern = "/^[0-9]+$/"; // يحتوي النص على أرقام فقط
$number = "12345";
if (preg_match($pattern, $number)) {
    echo "The text contains only numbers.\n";
}

// 5. التحقق من نص يحتوي على أحرف فقط
$pattern = "/^[a-zA-Z]+$/"; // يحتوي النص على أحرف فقط (كبيرة وصغيرة)
$text = "helloPHP";
if (preg_match($pattern, $text)) {
    echo "The text contains only letters.\n";
}

// 6. التحقق من نص يحتوي على أحرف وأرقام فقط
$pattern = "/^[a-zA-Z0-9]+$/"; // يحتوي النص على أحرف وأرقام فقط
$text = "PHP123";
if (preg_match($pattern, $text)) {
    echo "The text contains only letters and numbers.\n";
}

// 7. التحقق من عنوان بريد إلكتروني صحيح
$pattern = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // بنية بريد إلكتروني صحيحة
$email = "example@gmail.com";
if (preg_match($pattern, $email)) {
    echo "The email address is valid.\n";
}

// 8. التحقق من رقم هاتف
$pattern = "/^\+?[0-9]{10,15}$/"; // رقم الهاتف مع رمز دولي اختياري (10-15 رقما)
$phone = "+1234567890";
if (preg_match($pattern, $phone)) {
    echo "The phone number is valid.\n";
}

// 9. التحقق من كلمة مرور قوية (حروف كبيرة وصغيرة، أرقام، رموز خاصة)
$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
// على الأقل حرف كبير، حرف صغير، رقم، ورمز خاص، وطول 8 أحرف أو أكثر
$password = "Strong@123";
if (preg_match($pattern, $password)) {
    echo "The password is strong.\n";
}

// 10. استبدال النصوص باستخدام التعبير النمطي
$pattern = "/world/"; // العثور على الكلمة "world"
$replacement = "PHP"; // استبدالها بـ "PHP"
$result = preg_replace($pattern, $replacement, "hello world!");
echo $result . "\n"; // الناتج: hello PHP!

// 11. استخراج جميع الأرقام من النص
$pattern = "/\d+/"; // العثور على جميع الأرقام
$text = "Order 1234 shipped on 2025-01-15";
preg_match_all($pattern, $text, $matches);
print_r($matches[0]); // طباعة جميع الأرقام: [1234, 2025, 15]

// 12. التحقق من تطابق مسافات بيضاء
$pattern = "/\s/"; // البحث عن أي مسافة بيضاء (فراغ، تبويب...)
$text = "hello world";
if (preg_match($pattern, $text)) {
    echo "The text contains whitespace.\n";
}

// 13. التحقق من نص يحتوي على أحرف معينة فقط
$pattern = "/^[abc]+$/"; // النص يحتوي على الأحرف "a" أو "b" أو "c" فقط
$text = "abcbac";
if (preg_match($pattern, $text)) {
    echo "The text contains only 'a', 'b', and 'c'.\n";
}

// 14. التحقق من نص يحتوي على رقم هاتف منسق
$pattern = "/^\(\d{3}\) \d{3}-\d{4}$/"; // تنسيق (123) 456-7890
$phone = "(123) 456-7890";
if (preg_match($pattern, $phone)) {
    echo "The phone number is in the correct format.\n";
}

// 15. حذف الأحرف غير المسموح بها
$pattern = "/[^a-zA-Z0-9]/"; // أي حرف ليس حرفًا أو رقمًا
$text = "Hello@World#2025!";
$cleaned = preg_replace($pattern, '', $text);
echo "Cleaned text: $cleaned\n"; // الناتج: HelloWorld2025

?>
