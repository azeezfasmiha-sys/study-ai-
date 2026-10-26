<?php
// login.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';
require 'db.php';

$translations = [
    'ta' => [
        'title' => 'Student-Centric - Login',
        'heading' => 'Student-Centric - Login',
        'email_placeholder' => 'மின்னஞ்சல் (Email)',
        'pass_placeholder' => 'கடவுச்சொல் (Password)',
        'btn_login' => 'Login',
        'reg_prompt' => 'புதிய கணக்கை உருவாக்க',
        'reg_link' => 'இங்கே கிளிக் செய்யவும்',
        'err_pass' => 'தவறான கடவுச்சொல்!',
        'err_email' => 'இந்த Email பதிவு செய்யப்படவில்லை!'
    ],
    'en' => [
        'title' => 'Student-Centric - Login',
        'heading' => 'Student-Centric - Login',
        'email_placeholder' => 'Email',
        'pass_placeholder' => 'Password',
        'btn_login' => 'Login',
        'reg_prompt' => 'Create a new account',
        'reg_link' => 'Click here',
        'err_pass' => 'Invalid password!',
        'err_email' => 'This email is not registered!'
    ],
    'si' => [
        'title' => 'Student-Centric - Login',
        'heading' => 'Student-Centric - Login',
        'email_placeholder' => 'විද්‍යුත් තැපෑල (Email)',
        'pass_placeholder' => 'මුරපදය (Password)',
        'btn_login' => 'පිවිසෙන්න',
        'reg_prompt' => 'නව ගිණුමක් සකස් කිරීමට',
        'reg_link' => 'මෙතන ක්ලික් කරන්න',
        'err_pass' => 'වැරදි මුරපදයකි!',
        'err_email' => 'මෙම විද්‍යුත් තැපෑල ලියාපදිංචි කර නැත!'
    ]
];
$t = $translations[$lang];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: student_dashboard.php");
            }
            exit();
        } else {
            $error = $t['err_pass'];
        }
    } else {
        $error = $t['err_email'];
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 50px; }
        .container { background: white; max-width: 400px; margin: auto; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); position: relative; }
        input, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #0056b3; }
        .error { color: red; text-align: center; font-weight: bold; margin-bottom: 10px; }
        .success { color: green; text-align: center; font-weight: bold; margin-bottom: 10px; }
        .lang-switcher { display: flex; gap: 5px; justify-content: flex-end; margin-bottom: 10px; }
        .lang-btn { text-decoration: none; padding: 3px 8px; border: 1px solid #ccc; border-radius: 3px; font-size: 12px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }
    </style>
</head>
<body>
<div class="container">
    <div class="lang-switcher">
        <a href="?lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
        <a href="?lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
        <a href="?lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
    </div>
    <h2 style="text-align: center;"><?php echo $t['heading']; ?></h2>
    
    <?php 
    if (isset($_SESSION['success'])) {
        echo "<div class='success'>" . htmlspecialchars($_SESSION['success']) . "</div>";
        unset($_SESSION['success']);
    }
    if(isset($error)) { 
        echo "<div class='error'>$error</div>"; 
    } 
    ?>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="<?php echo $t['email_placeholder']; ?>" required>
        <input type="password" name="password" placeholder="<?php echo $t['pass_placeholder']; ?>" required>
        <button type="submit"><?php echo $t['btn_login']; ?></button>
    </form>
    <p style="text-align: center;"><?php echo $t['reg_prompt']; ?> <a href="register.php"><?php echo $t['reg_link']; ?></a></p>
    <p style="text-align: center; margin-top: 10px;"><a href="index.php">🏠 Home</a></p>
</div>
</body>
</html>