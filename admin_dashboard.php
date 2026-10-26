<?php
// admin_dashboard.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'title' => 'Admin Dashboard - Student-Centric',
        'greeting' => 'வணக்கம், Admin ',
        'subtitle' => 'Student-Centric வினாத்தாள் மேலாண்மை அமைப்புக்கு வரவேற்கிறோம்.',
        'create_mcq' => '📄 புதிய பாடக்குறிப்பை பதிவேற்றுக (Create 10 MCQs)',
        'leaderboard' => '🏆 மாணவர்களின் முடிவுகள் (Leaderboard)',
        'logout' => '🚪 வெளியேறு (Logout)'
    ],
    'en' => [
        'title' => 'Admin Dashboard - Student-Centric',
        'greeting' => 'Welcome, Admin ',
        'subtitle' => 'Welcome to the Student-Centric AI Question Management System.',
        'create_mcq' => '📄 Upload New Notes (Create 10 MCQs)',
        'leaderboard' => '🏆 Student Results (Leaderboard)',
        'logout' => '🚪 Logout'
    ],
    'si' => [
        'title' => 'Admin Dashboard - Student-Centric',
        'greeting' => 'ආයුබෝවන්, Admin ',
        'subtitle' => 'Student-Centric AI ප්‍රශ්න කළමනාකරණ පද්ධතිය වෙත සාදරයෙන් පිළිගනිමු.',
        'create_mcq' => '📄 නව සටහන් උඩුගත කරන්න (MCQs 10ක් සාදන්න)',
        'leaderboard' => '🏆 සිසුන්ගේ ප්‍රතිඵල (Leaderboard)',
        'logout' => '🚪 පිටවන්න (Logout)'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px; margin: 0; }
        .container { max-width: 600px; margin: auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center; position: relative; }
        h1 { color: #333; margin-bottom: 10px; }
        p { color: #666; margin-bottom: 30px; }
        .btn { display: block; width: 85%; margin: 15px auto; padding: 15px; background: #007bff; color: white; text-decoration: none; font-size: 18px; font-weight: bold; border-radius: 8px; transition: background 0.3s; }
        .btn:hover { background: #0056b3; }
        .btn-results { background: #28a745; }
        .btn-results:hover { background: #218838; }
        .logout-container { margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; }
        .logout { display: inline-block; background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 5px; transition: background 0.3s; }
        .logout:hover { background: #c82333; }
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
    <h1><?php echo $t['greeting'] . htmlspecialchars($_SESSION['user_name']); ?>! 👨‍💻</h1>
    <p><?php echo $t['subtitle']; ?></p>
    
    <a href="ocr_extract.php" class="btn">
        <?php echo $t['create_mcq']; ?>
    </a>
    
    <a href="admin_results.php" class="btn btn-results">
        <?php echo $t['leaderboard']; ?>
    </a>
    
    <div class="logout-container">
        <a href="logout.php" class="logout"><?php echo $t['logout']; ?></a>
    </div>
</div>
</body>
</html>