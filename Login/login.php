<?php

require_once 'db.php';

$login_error = '';
$login_email = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login_submit'])) {

        $login_email = $_POST['login_email'];
        $login_password = $_POST['login_password'];

      
        if (!filter_var($login_email, FILTER_VALIDATE_EMAIL) || !str_ends_with($login_email, '@gmail.com')) {
            $login_error = "Email must be: @gmail.com.";
        } else {
         
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            
         
            $stmt->execute([$login_email]);

            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($login_password, $user['password'])) {
           
                header('Location: index.html');
                exit();
            } else {
                $login_error = "Incorrect login data !";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="Icon" href="Image/hadeel-alhazwara.ico" type="image/x-icon">
    <link rel="stylesheet" href="STYLE.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>LOGIN</h2>
            <form action="" method="post">
                <label for="login_email">Email :</label>
                <input type="email" id="login_email" name="login_email" value="<?= htmlspecialchars($login_email) ?>" required>
                <label for="login_password">Password :
                </label>
                <input type="password" id="login_password" name="login_password" required>
                <span class="error"><?= htmlspecialchars($login_error) ?></span>
                <button type="submit" name="login_submit">Log in</button>
            </form>
            <p>You Don't have an account ? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>
</html>