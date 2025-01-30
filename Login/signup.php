<?php
session_start(); 


require_once 'db.php';

$signup_error = '';
$username = $signup_email = $phone = $gender = '';
$password = $confirm_password = '';
$success_message = ''; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  
    if (isset($_POST['signup_submit'])) {

      
        $username = $_POST['username'];
        $signup_email = $_POST['signup_email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        
        if (!preg_match("/^[a-zA-Z]/", $username)) {
            $signup_error = "Username should start with a letter !";
        } elseif (!filter_var($signup_email, FILTER_VALIDATE_EMAIL) || !str_ends_with($signup_email, '@gmail.com')) {
            $signup_error = "Email must be: @gmail.com.";
        } elseif (!preg_match("/^(77|78|73)[0-9]{7}$/", $phone)) {
            $signup_error = "The phone number should contain 9 Numbers and start with 77 or 78 or 73 !";
        } elseif ($password !== $confirm_password) {
            $signup_error = "The two passwords are not identical !";
        } elseif (strlen($password) < 8) {
            $signup_error = "Password should be 8 or more characters !";
        } else {

            
            try {
             
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare("INSERT INTO users (username, email, phone, gender, password) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$username, $signup_email, $phone, $gender, $hashed_password]);
               
               
                // عند نجاح التسجيل، عرض رسالة النجاح في الجلسة
                $_SESSION['success_message'] = "Successfully registered! You will be transferred to the login page .";
              
                header('refresh:3;url=signup.php');
                exit(); 
            } catch (PDOException $e) {
            
                $signup_error = "An error occurred during execution " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="Icon" href="Image/hadeel-alhazwara.ico" type="image/x-icon">
    <link rel="stylesheet" href="STYLE.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>SIGN UP</h2>
            
            <!-- عرض رسالة النجاح إذا كانت موجودة -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="success-message">
                    <?= htmlspecialchars($_SESSION['success_message']) ?>
                </div>
                <?php unset($_SESSION['success_message']); ?> <!-- مسح الرسالة بعد عرضها -->
            <?php endif; ?>

            <form action="" method="post">
                <label for="username">Username :</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>" required>
                <label for="signup_email">Email :</label>
                <input type="email" id="signup_email" name="signup_email" value="<?= htmlspecialchars($signup_email) ?>" required>
                <label for="phone">Phone number :</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>" required pattern="^(77|78|73)[0-9]{7}$" title="يجب أن يبدأ بـ 77 أو 78 أو 73 ويكون 9 أرقام.">
                <label>Gender :</label>
                <div class="gender">
                    <input type="radio" id="male" name="gender" value="male" <?= $gender == 'male' ? 'checked' : '' ?> required> Male
                    <input type="radio" id="female" name="gender" value="female" <?= $gender == 'female' ? 'checked' : '' ?>> Female
                </div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="password" value="<?= htmlspecialchars($password) ?>" required>
                <label for="confirm_password">Password confirmation :</label>
                <input type="password" id="confirm_password" name="confirm_password" value="<?= htmlspecialchars($confirm_password) ?>" required>
                <span class="error"><?= htmlspecialchars($signup_error) ?></span>
                <button type="submit" name="signup_submit">Create an account</button>
            </form>
            <p>Do you already have an account ? <a href="login.php">Log in</a></p>
        </div>
    </div>
</body>
</html>