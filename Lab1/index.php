//Arithmetic Operators
$a = 10;  
$b = 5;  

echo $a + $b; // 15  
echo $a - $b; // 5  
echo $a * $b; // 50  
echo $a / $b; // 2  
echo $a % $b; // 0  
echo $a ** $b; // 100000  

// Assignment Operators
$a = 10;      
$a += 5;       
$a -= 3;       
$a *= 2;      
$a /= 4;     
$a %= 4;      

// Comparison Operators 
$a = 10;  
$b = 5;  

var_dump($a == $b);   
var_dump($a != $b);    
var_dump($a > $b);     
var_dump($a < $b);   
var_dump($a >= 10);    
var_dump($a <= 5);   

// Increment/Decrement Operators
$a = 10;  

echo ++$a; 
echo $a++;  
echo --$a; 
echo $a--; 


// Logical Operators
$a = true;  
$b = false;  

var_dump($a && $b); 
var_dump($a || $b);   
var_dump(!$a);     


// String Operators
$txt1 = "Hello";  
$txt2 = " World";  

echo $txt1 . $txt2; // دمج النصوص: Hello World  
$txt1 .= $txt2;     // إضافة النص إلى المتغير الأول  
echo $txt1;         // النتيجة: Hello World  



// Array Operators 
$arr1 = ["a" => 1, "b" => 2];  
$arr2 = ["b" => 3, "c" => 4];  

$result = $arr1 + $arr2; // دمج المصفوفات  
print_r($result);  
/*  
النتيجة:  
Array (  
    [a] => 1  
    [b] => 2  
    [c] => 4  
)  
*/

var_dump($arr1 == $arr2); // مقارنة القيم: false  
var_dump($arr1 === $arr2); // مقارنة القيم والنوع: false  

// Conditional Assignment Operators
$age = 20;  
$status = ($age >= 18) ? "Adult" : "Minor";  
echo $status; // النتيجة: Adult  


//if
$age = 18;

if ($age >= 18) {
    echo "You are an adult.";
} else {
    echo "You are a minor.";
}
if ($age < 13) {
    echo "You are a child.";
} elseif ($age < 18) {
    echo "You are a teenager.";
} else {
    echo "You are an adult.";
}

//Switch
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "It's the first day of the week.";
        break;
    case "Friday":
        echo "It's almost the weekend!";
        break;
    default:
        echo "It's just another day.";
}

//for
for ($i = 1; $i <= 5; $i++) {
    echo "Iteration: $i<br>";
}

//foreach
$colors = ["Red", "Green", "Blue"];

foreach ($colors as $color) {
    echo "Color: $color<br>";
}

$fruits = ["a" => "Apple", "b" => "Banana", "c" => "Cherry"];
foreach ($fruits as $key => $value) {
    echo "Key: $key, Value: $value<br>";
}



//while
$count = 1;

while ($count <= 5) {
    echo "Count: $count<br>";
    $count++;
}


//do while
$count = 1;

do {
    echo "Count: $count<br>";
    $count++;
} while ($count <= 5);
