<?php
// 1.  إرجاع الطابع الزمني الحالي (عدد الثواني منذ عام 1970)
echo time(); // مثال: 1673442325

// 2.تنسيق التاريخ والوقت
echo date('Y-m-d H:i:s'); // طباعة التاريخ الحالي بصيغة: 2025-01-15 14:30:00

// 3.تحويل نص إلى طابع زمني
echo strtotime('next Monday'); // مثال: طابع زمني ليوم الاثنين القادم

// 4. إرجاع مصفوفة تحتوي على تفاصيل التاريخ والوقت
print_r(getdate()); // تفاصيل مثل السنة، الشهر، اليوم، الساعة...

// 5.التحقق من صلاحية التاريخ
echo checkdate(2, 29, 2024) ? 'Valid' : 'Invalid'; // مثال: "Valid" لأن 2024 سنة كبيسة

// 6. إنشاء طابع زمني
echo mktime(14, 30, 0, 1, 15, 2025); // مثال: طابع زمني لـ 15 يناير 2025 الساعة 14:30

// 7.تنسيق التاريخ بالتوقيت العالمي (UTC)
echo gmdate('Y-m-d H:i:s'); // مثال: 2025-01-15 14:30:00 بالتوقيت العالمي

// 8.  إرجاع رقم بناءً على الصيغة المحددة
echo idate('Y'); // طباعة السنة الحالية كرقم: 2025

// 9. إنشاء كائن تاريخ
$date = date_create('2025-01-15');
print_r($date);

// 10. تنسيق كائن تاريخ إلى نص
echo date_format($date, 'Y-m-d'); // طباعة: 2025-01-15

// 11. تعديل كائن التاريخ
date_modify($date, '+1 day'); // إضافة يوم واحد
echo date_format($date, 'Y-m-d'); // طباعة: 2025-01-16

// 12.إضافة مدة زمنية
$interval = date_interval_create_from_date_string('10 days');
date_add($date, $interval);
echo date_format($date, 'Y-m-d'); // طباعة: 2025-01-26

// 13. طرح مدة زمنية
date_sub($date, $interval);
echo date_format($date, 'Y-m-d'); // طباعة: 2025-01-16

// 14. حساب الفرق بين تاريخين
$date1 = date_create('2025-01-15');
$date2 = date_create('2025-02-15');
$diff = date_diff($date1, $date2);
echo $diff->days; // طباعة الفرق بالأيام: 31

// 15. تعيين المنطقة الزمنية الافتراضية
date_default_timezone_set('Asia/Riyadh');

// 16. الحصول على المنطقة الزمنية الافتراضية
echo date_default_timezone_get(); // طباعة: Asia/Riyadh

// 17.وقت شروق الشمس
echo date_sunrise(time(), SUNFUNCS_RET_STRING, 24.7136, 46.6753); // مثال: 06:30

// 18. وقت غروب الشمس
echo date_sunset(time(), SUNFUNCS_RET_STRING, 24.7136, 46.6753); // مثال: 17:45

?>
