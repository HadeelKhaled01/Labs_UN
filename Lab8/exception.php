<?php

// تعريف دالة تقوم بالقسمة بين رقمين
function divide($numerator, $denominator) {
    // التحقق مما إذا كان المقسوم عليه صفرًا لتجنب القسمة على الصفر
    if ($denominator == 0) {
        // رمي استثناء عند محاولة القسمة على الصفر
        throw new Exception("لا يمكن القسمة على الصفر.");
    }
    // إرجاع نتيجة القسمة إذا كان المقسوم عليه ليس صفرًا
    return $numerator / $denominator;
}

try {
    // محاولة تنفيذ الدالة بالقيم المعطاة
    echo divide(10, 2); // هذه العملية ناجحة وستطبع 5
    echo "\n";
    echo divide(10, 0); // هذه العملية ستسبب استثناءً
} catch (Exception $e) {
    // التقاط الاستثناء وطباعة رسالة الخطأ
    echo "خطأ عام: " . $e->getMessage();
} catch (ArithmeticError $e) {
    // التعامل مع أخطاء العمليات الحسابية
    echo "خطأ رياضي: " . $e->getMessage();
} catch (TypeError $e) {
    // التعامل مع أخطاء النوع
    echo "خطأ في النوع: " . $e->getMessage();
} finally {
    // هذا الجزء يتم تنفيذه دائمًا سواءً حدث استثناء أم لا
    echo "\nعملية القسمة انتهت.";
}

?>
