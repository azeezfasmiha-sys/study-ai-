<?php
// register.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';
require 'db.php';

$translations = [
    'ta' => [
        'title' => 'Student-Centric - Registration',
        'heading' => 'Student-Centric<br>புதிய கணக்கு உருவாக்கம்',
        'name' => 'உங்கள் பெயர்',
        'email' => 'மின்னஞ்சல் (Email)',
        'password' => 'கடவுச்சொல் (Password)',
        'student' => 'Student (மாணவர்)',
        'admin' => 'Admin (நிர்வாகி)',
        'btn' => 'Register',
        'footer_prompt' => 'ஏற்கனவே கணக்கு உள்ளதா?',
        'footer_link' => 'Login செய்யவும்',
        'err_exists' => 'இந்த Email ஏற்கனவே பதிவு செய்யப்பட்டுள்ளது!',
        'success' => 'வெற்றிகரமாக பதிவு செய்யப்பட்டது! தயவுசெய்து Login செய்யவும்.',
        'err_generic' => 'பிழை ஏற்பட்டுள்ளது: '
    ],
    'en' => [
        'title' => 'Student-Centric - Registration',
        'heading' => 'Student-Centric<br>Create New Account',
        'name' => 'Your Name',
        'email' => 'Email',
        'password' => 'Password',
        'student' => 'Student',
        'admin' => 'Admin',
        'btn' => 'Register',
        'footer_prompt' => 'Already have an account?',
        'footer_link' => 'Login',
        'err_exists' => 'This email is already registered!',
        'success' => 'Successfully registered! Please login.',
        'err_generic' => 'An error occurred: '
    ],
    'si' => [
        'title' => 'Student-Centric - Registration',
        'heading' => 'Student-Centric<br>නව ගිණුමක් සකස් කිරීම',
        'name' => 'ඔබේ නම',
        'email' => 'විද්‍යුත් තැපෑල (Email)',
        'password' => 'මුරපදය (Password)',
        'student' => 'ශිෂ්‍ය (Student)',
        'admin' => 'පරිපාලක (Admin)',
        'btn' => 'ලියාපදිංචි වන්න',
        'footer_prompt' => 'දැනටමත් ගිණුමක් තිබේද?',
        'footer_link' => 'පිවිසෙන්න',
        'err_exists' => 'මෙම විද්‍යුත් තැපෑල දැනටමත් ලියාපදිංචි කර ඇත!',
        'success' => 'සාර්ථකව ලියාපදිංචි විය! කරුණාකර පිවිසෙන්න.',
        'err_generic' => 'දෝෂයක් සිදු විය: '
    ]
];
$t = $translations[$lang];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();
    if ($check_email->num_rows > 0) {
        $error = $t['err_exists'];
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = $t['success'];
            header("Location: login.php");
            exit();
        } else {
            $error = $t['err_generic'] . $conn->error;
        }
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
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #218838; }
        .msg { text-align: center; margin-bottom: 15px; font-weight: bold; }
        .error { color: red; }
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
    
    <?php if(isset($error)) { echo "<div class='msg error'>$error</div>"; } ?>
    <form method="POST" action="">
        <input type="text" name="name" placeholder="<?php echo $t['name']; ?>" required>
        <input type="email" name="email" placeholder="<?php echo $t['email']; ?>" required>
        <input type="password" name="password" placeholder="<?php echo $t['password']; ?>" required>
        
        <select name="role" required>
            <option value="student"><?php echo $t['student']; ?></option>
            <option value="admin"><?php echo $t['admin']; ?></option>
        </select>
        
        <button type="submit"><?php echo $t['btn']; ?></button>
    </form>
    <p style="text-align: center;"><?php echo $t['footer_prompt']; ?> <a href="login.php"><?php echo $t['footer_link']; ?></a></p>
    <p style="text-align: center; margin-top: 10px;"><a href="index.php">🏠 Home</a></p>
</div>
</body>
</html>