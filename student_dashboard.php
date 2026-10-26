<?php
// student_dashboard.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';
require 'db.php';

$translations = [
    'ta' => [
        'title' => 'Student Dashboard - Student-Centric',
        'greeting' => 'வணக்கம், ',
        'subtitle' => 'Student-Centric AI மாணவர் கற்றல் மற்றும் பயிற்சி தளம்',
        'self_practice' => '📄 சுய பயிற்சிக்கு குறிப்பை பதிவேற்றுக (Self Practice)',
        'official_quizzes' => '🏆 மாதிரி தேர்வுகள் (Official Subject Quizzes)',
        'no_quizzes' => 'தற்போது மாதிரி வினாத்தாள்கள் இல்லை.',
        'logout' => '🚪 வெளியேறு (Logout)'
    ],
    'en' => [
        'title' => 'Student Dashboard - Student-Centric',
        'greeting' => 'Welcome, ',
        'subtitle' => 'Student-Centric AI Student Learning & Practice Platform',
        'self_practice' => '📄 Upload Notes for Self Practice',
        'official_quizzes' => '🏆 Official Subject Quizzes',
        'no_quizzes' => 'No quizzes available right now.',
        'logout' => '🚪 Logout'
    ],
    'si' => [
        'title' => 'Student Dashboard - Student-Centric',
        'greeting' => 'ආයුබෝවන්, ',
        'subtitle' => 'Student-Centric AI ශිෂ්‍ය ඉගෙනුම් සහ පුහුණු වේදිකාව',
        'self_practice' => '📄 ස්වයං පුහුණුව සඳහා සටහන් උඩුගත කරන්න',
        'official_quizzes' => '🏆 නිල විෂය ප්‍රශ්නාවලි',
        'no_quizzes' => 'දැනට ප්‍රශ්නාවලි නොමැත.',
        'logout' => '🚪 පිටවන්න (Logout)'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}
$subjects_query = $conn->query("SELECT DISTINCT subject FROM generated_questions WHERE subject IS NOT NULL");
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 40px 20px; margin: 0; }
        .container { max-width: 650px; margin: auto; background: white; padding: 35px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center; position: relative; }
        h1 { color: #333; margin-bottom: 5px; }
        p.subtitle { color: #666; margin-bottom: 25px; }
        .btn { display: block; width: 85%; margin: 15px auto; padding: 15px; background: #007bff; color: white; text-decoration: none; font-size: 17px; font-weight: bold; border-radius: 8px; transition: 0.3s; }
        .btn:hover { background: #0056b3; transform: translateY(-2px); }
        .btn-practice { background: #17a2b8; }
        .btn-practice:hover { background: #138496; }
        .section-title { text-align: left; color: #333; font-size: 18px; border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; margin-bottom: 15px; }
        .subject-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; }
        .subject-card { background: #28a745; color: white; padding: 14px; text-align: center; text-decoration: none; border-radius: 6px; font-weight: bold; transition: 0.2s; }
        .subject-card:hover { background: #218838; }
        .logout-container { margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px; }
        .logout { display: inline-block; background: #dc3545; color: white; padding: 10px 20px; text-decoration: none; font-weight: bold; border-radius: 5px; }
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
    <h1><?php echo $t['greeting'] . htmlspecialchars($_SESSION['user_name']); ?>! 🎓</h1>
    <p class="subtitle"><?php echo $t['subtitle']; ?></p>
    
    <a href="ocr_extract.php" class="btn btn-practice">
        <?php echo $t['self_practice']; ?>
    </a>
    
    <div class="section-title"><?php echo $t['official_quizzes']; ?></div>
    <div class="subject-grid">
        <?php 
        if ($subjects_query && $subjects_query->num_rows > 0) {
            while($sub = $subjects_query->fetch_assoc()) {
                $subject_name = urlencode($sub['subject']);
                echo "<a href='take_quiz.php?subject={$subject_name}' class='subject-card'>📖 " . htmlspecialchars($sub['subject']) . "</a>";
            }
        } else {
            echo "<p style='color:red; margin: 10px 0;'>" . $t['no_quizzes'] . "</p>";
        }
        ?>
    </div>
    
    <div class="logout-container">
        <a href="logout.php" class="logout"><?php echo $t['logout']; ?></a>
    </div>
</div>
</body>
</html>