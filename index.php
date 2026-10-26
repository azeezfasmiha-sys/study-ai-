<?php
// index.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';
$translations = [
    'ta' => [
        'title' => 'Student-Centric - AI வினாத்தாள் சிஸ்டம்',
        'home' => 'முகப்பு',
        'login' => 'உள்நுழைய',
        'register' => 'புதிய கணக்கு',
        'hero_title' => 'AI வினாத்தாள் சிஸ்டம்',
        'hero_desc' => 'பரீட்சைக்கான குறிப்புகளைப் பதிவேற்றி, செயற்கை நுண்ணறிவின் (AI) உதவியுடன் வினாக்களை உருவாக்கி, மாணவர்களின் கற்றல் திறனை மேம்படுத்துங்கள்.',
        'btn_start' => 'இன்றே தொடங்குங்கள்',
        'btn_login' => 'மாணவர் / Admin Login',
        'features_title' => 'சிறப்பம்சங்கள்',
        'f1_title' => 'OCR தொழில்நுட்பம்',
        'f1_desc' => 'படங்களில் உள்ள குறிப்புகளை துல்லியமாக எழுத்துக்களாக மாற்றும் வசதி.',
        'f2_title' => 'AI வினா உருவாக்கம்',
        'f2_desc' => 'Gemini AI மூலம் பாடக்குறிப்புகளிலிருந்து MCQ வினாக்களைத் தானாக உருவாக்குதல்.',
        'f3_title' => 'பாடவாரியான தேர்வுகள்',
        'f3_desc' => 'மாணவர்கள் தங்களுக்கு விருப்பமான பாடத்தைத் தேர்ந்தெடுத்து பரீட்சை எழுதும் முறை.',
        'f4_title' => 'தரவரிசைப் பட்டியல்',
        'f4_desc' => 'மாணவர்களின் முடிவுகள் மற்றும் மதிப்பெண்களை உடனுக்குடன் பகுப்பாய்வு செய்தல்.',
        'footer' => 'NST Campus. அனைத்து உரிமைகளும் பாதுகாக்கப்பட்டவை.'
    ],
    'en' => [
        'title' => 'Student-Centric - AI Quiz System',
        'home' => 'Home',
        'login' => 'Login',
        'register' => 'Register',
        'hero_title' => 'AI Quiz System',
        'hero_desc' => 'Upload study materials, generate automated MCQ questions using Artificial Intelligence (AI), and enhance student learning outcomes.',
        'btn_start' => 'Get Started Today',
        'btn_login' => 'Student / Admin Login',
        'features_title' => 'Key Features',
        'f1_title' => 'OCR Technology',
        'f1_desc' => 'Accurately extract text from uploaded images and documents.',
        'f2_title' => 'AI Question Generation',
        'f2_desc' => 'Automatically generate MCQ questions from study notes using Gemini AI.',
        'f3_title' => 'Subject-wise Quizzes',
        'f3_desc' => 'Allow students to select their preferred subjects for taking quizzes.',
        'f4_title' => 'Leaderboard & Analytics',
        'f4_desc' => 'Instantly analyze student results, scores, and rankings.',
        'footer' => 'NST Campus. All rights reserved.'
    ],
    'si' => [
        'title' => 'Student-Centric - AI ප්‍රශ්නාවලිය පද්ධතිය',
        'home' => 'මුල් පිටුව',
        'login' => 'පුරන්න',
        'register' => 'ලියාපදිංචි වන්න',
        'hero_title' => 'AI ප්‍රශ්නාවලිය පද්ධතිය',
        'hero_desc' => 'අධ්‍යයන සටහන් උඩුගත කර කෘතිම බුද්ධිය (AI) මගින් ස්වයංක්‍රීයව බහුවරණ ප්‍රශ්න නිර්මාණය කර සිසුන්ගේ ඉගෙනුම වැඩිදියුණු කරන්න.',
        'btn_start' => 'අදම අරඹන්න',
        'btn_login' => 'ශිෂ්‍ය / පරිපාලක පිවිසුම',
        'features_title' => 'විශේෂාංග',
        'f1_title' => 'OCR තාක්ෂණය',
        'f1_desc' => 'උඩුගත කළ පින්තූරවලින් අකුරු නිවැරදිව ලබා ගැනීමේ පහසුකම.',
        'f2_title' => 'AI ප්‍රශ්න නිර්මාණය',
        'f2_desc' => 'Gemini AI මගින් අධ්‍යයන සටහන් වලින් MCQ ප්‍රශ්න ස්වයංක්‍රීයව සෑදීම.',
        'f3_title' => 'විෂය අනුව ප්‍රශ්නාවලි',
        'f3_desc' => 'සිසුන්ට තමන් කැමති විෂය තෝරාගෙන ප්‍රශ්නාවලිවලට මුහුණ දීමට අවස්ථාව.',
        'f4_title' => 'ප්‍රමුඛතා ලැයිස්තුව',
        'f4_desc' => 'සිසුන්ගේ ප්‍රතිඵල සහ ලකුණු ක්ෂණිකව විශ්ලේෂණය කිරීම.',
        'footer' => 'NST Campus. සියලුම හිමිකම් ඇවිරිණි.'
    ]
];
$t = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f8f9fa; color: #333; }
        header { background-color: #ffffff; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); flex-wrap: wrap; }
        .logo { font-size: 24px; font-weight: bold; color: #007bff; text-decoration: none; }
        .nav-links { display: flex; align-items: center; gap: 20px; }
        .nav-links a { text-decoration: none; color: #555; font-weight: bold; transition: color 0.3s; }
        .nav-links a:hover { color: #007bff; }
        .lang-switcher { display: flex; gap: 10px; border-left: 2px solid #ddd; padding-left: 20px; }
        .lang-btn { text-decoration: none; padding: 5px 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }
        .hero { text-align: center; padding: 100px 20px; background: linear-gradient(135deg, #007bff, #00d2ff); color: white; }
        .hero h1 { font-size: 3em; margin-bottom: 15px; }
        .hero p { font-size: 1.2em; margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.6; }
        .btn { text-decoration: none; padding: 15px 30px; border-radius: 25px; font-weight: bold; font-size: 16px; margin: 10px; display: inline-block; transition: transform 0.3s, box-shadow 0.3s; }
        .btn-light { background: white; color: #007bff; }
        .btn-outline { border: 2px solid white; color: white; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
        .features-section { padding: 60px 20px; text-align: center; }
        .features-section h2 { font-size: 2.5em; margin-bottom: 40px; color: #333; }
        .features-grid { display: flex; justify-content: center; flex-wrap: wrap; gap: 30px; }
        .feature-card { background: white; padding: 30px; border-radius: 10px; width: 250px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .feature-card:hover { transform: translateY(-10px); }
        .feature-icon { font-size: 40px; margin-bottom: 15px; }
        .feature-title { font-size: 1.2em; font-weight: bold; margin-bottom: 10px; color: #007bff; }
        footer { background: #343a40; color: white; text-align: center; padding: 20px; margin-top: 40px; }
        @media (max-width: 768px) {
            header { flex-direction: column; gap: 15px; }
            .lang-switcher { border-left: none; padding-left: 0; }
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">Student-Centric</a>
        <div class="nav-links">
            <a href="index.php"><?php echo $t['home']; ?></a>
            <a href="login.php"><?php echo $t['login']; ?></a>
            <a href="register.php"><?php echo $t['register']; ?></a>
            
            <div class="lang-switcher">
                <a href="?lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
                <a href="?lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
                <a href="?lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
            </div>
        </div>
    </header>
    <section class="hero">
        <h1><?php echo $t['hero_title']; ?></h1>
        <p><?php echo $t['hero_desc']; ?></p>
        <div>
            <a href="register.php" class="btn btn-light"><?php echo $t['btn_start']; ?></a>
            <a href="login.php" class="btn btn-outline"><?php echo $t['btn_login']; ?></a>
        </div>
    </section>
    <section class="features-section">
        <h2><?php echo $t['features_title']; ?></h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📄</div>
                <div class="feature-title"><?php echo $t['f1_title']; ?></div>
                <p><?php echo $t['f1_desc']; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <div class="feature-title"><?php echo $t['f2_title']; ?></div>
                <p><?php echo $t['f2_desc']; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <div class="feature-title"><?php echo $t['f3_title']; ?></div>
                <p><?php echo $t['f3_desc']; ?></p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <div class="feature-title"><?php echo $t['f4_title']; ?></div>
                <p><?php echo $t['f4_desc']; ?></p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> <?php echo $t['footer']; ?></p>
    </footer>
</body>
</html>