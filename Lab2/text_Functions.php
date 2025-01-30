// تحسب طول السلسلة النصية (عدد الأحرف بما فيها المسافات)
echo strlen("Hello World"); // النتيجة: 11

// تحسب عدد الكلمات في السلسلة النصية
echo str_word_count("Hello World PHP"); // النتيجة: 3

// تحوّل جميع الأحرف إلى أحرف كبيرة (Uppercase)
echo strtoupper("hello"); // النتيجة: HELLO
4. strtolower()

// تحوّل جميع الأحرف إلى أحرف صغيرة (Lowercase)
echo strtolower("HELLO"); // النتيجة: hello

// تحوّل الحرف الأول فقط من النص إلى حرف كبير
echo ucfirst("hello world"); // النتيجة: Hello world

// تحوّل الحرف الأول فقط من النص إلى حرف صغير
echo lcfirst("Hello World"); // النتيجة: hello World

// تستخرج جزءًا معينًا من النص ابتداءً من الموضع المحدد
echo substr("Hello World", 0, 5); // النتيجة: Hello

// تعثر على موقع أول تكرار لنص معين داخل النص الأصلي
echo strpos("Hello World", "World"); // النتيجة: 6

// تستبدل نصًا معينًا بنص آخر داخل السلسلة النصية
echo str_replace("World", "PHP", "Hello World"); // النتيجة: Hello PHP

// تعكس النص (تجعله مكتوبًا بالعكس)
echo strrev("Hello"); // النتيجة: olleH

// تحذف المسافات البيضاء من بداية ونهاية النص
echo trim("   Hello World   "); // النتيجة: "Hello World"

// تحذف المسافات البيضاء من بداية النص فقط (اليسار)
echo ltrim("   Hello World"); // النتيجة: "Hello World"

// تحذف المسافات البيضاء من نهاية النص فقط (اليمين)
echo rtrim("Hello World   "); // النتيجة: "Hello World"

// تكرّر النص عددًا معينًا من المرات
echo str_repeat("Hello ", 3); // النتيجة: Hello Hello Hello 

// تخلط أحرف النص بشكل عشوائي
echo str_shuffle("Hello"); // النتيجة: e.g., olHel

// تقسّم النص إلى مصفوفة من الأحرف
print_r(str_split("Hello")); // النتيجة: ['H', 'e', 'l', 'l', 'o']

// تقسّم النص إلى مصفوفة بناءً على فاصل محدد
print_r(explode(" ", "Hello World PHP")); // النتيجة: ['Hello', 'World', 'PHP']

// تجمع عناصر المصفوفة في نص واحد باستخدام فاصل معين
echo implode(", ", ["Hello", "World", "PHP"]); // النتيجة: Hello, World, PHP

// تقارن بين نصين (حساسة لحالة الأحرف)
echo strcmp("Hello", "hello"); // النتيجة: -1 (لأن الأحرف الكبيرة تختلف عن الصغيرة)

// تقارن بين نصين (غير حساسة لحالة الأحرف)
echo strcasecmp("Hello", "hello"); // النتيجة: 0 (لأنها متساوية بدون اعتبار حالة الأحرف)

// تحوّل الأحرف الخاصة في HTML إلى رموزها الآمنة
echo htmlspecialchars("<a>Hello</a>"); // النتيجة: &lt;a&gt;Hello&lt;/a&gt;

// تضيف شرطة مائلة قبل الأحرف الخاصة (مثل الاقتباس الفردي أو المزدوج)
echo addslashes("It's a test"); // النتيجة: It\'s a test

// تحذف الشرطة المائلة المضافة للأحرف الخاصة
echo stripslashes("It\'s a test"); // النتيجة: It's a test

// تستبدل جميع تكرارات نص معين بنص آخر
echo str_replace("World", "PHP", "Hello World!"); // النتيجة: Hello PHP!

// تحسب عدد مرات ظهور نص معين في النص الأصلي
echo substr_count("Hello Hello World", "Hello"); // النتيجة: 2