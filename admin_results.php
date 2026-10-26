<?php
// admin_results.php
session_start();
require 'db.php';

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'title' => 'Admin - Leaderboard & Results',
        'back' => '⬅ Admin Dashboard-க்குத் திரும்பு',
        'heading' => '🏆 மாணவர்களின் தரவரிசை (Leaderboard)',
        'rank' => 'தரம் (Rank)',
        'name' => 'மாணவர் பெயர்',
        'email' => 'மின்னஞ்சல்',
        'score' => 'மதிப்பெண்',
        'percentage' => 'சதவீதம்',
        'time' => 'தேர்வு எழுதிய நேரம்',
        'no_data' => 'இதுவரை எந்த மாணவரும் தேர்வில் பங்குபெறவில்லை.'
    ],
    'en' => [
        'title' => 'Admin - Leaderboard & Results',
        'back' => '⬅ Back to Admin Dashboard',
        'heading' => '🏆 Student Leaderboard',
        'rank' => 'Rank',
        'name' => 'Student Name',
        'email' => 'Email',
        'score' => 'Score',
        'percentage' => 'Percentage',
        'time' => 'Attempted At',
        'no_data' => 'No student has taken a quiz yet.'
    ],
    'si' => [
        'title' => 'Admin - ප්‍රමුඛතා ලැයිස්තුව සහ ප්‍රතිඵල',
        'back' => '⬅ Admin Dashboard වෙත ආපසු',
        'heading' => '🏆 සිසුන්ගේ ප්‍රමුඛතා ලැයිස්තුව',
        'rank' => 'ශ්‍රේණිය (Rank)',
        'name' => 'සිසුගේ නම',
        'email' => 'විද්‍යුත් තැපෑල',
        'score' => 'ලකුණු',
        'percentage' => 'ප්‍රතිශතය',
        'time' => 'උත්සාහ කළ වේලාව',
        'no_data' => 'මෙතෙක් කිසිදු සිසුවෙක් ප්‍රශ්නාවලියකට සහභාගී වී නොමැත.'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$sql = "SELECT u.name, u.email, s.score, s.total_questions, s.created_at,
               (s.score / s.total_questions) * 100 AS percentage
        FROM student_scores s
        JOIN users u ON s.student_id = u.id
        ORDER BY percentage DESC, s.created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .top-scorer { font-weight: bold; color: #28a745; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        .btn-back { display: inline-block; background: #6c757d; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; margin-bottom: 15px; font-weight: bold; }
        .btn-back:hover { background: #5a6268; }
        .lang-switcher { display: flex; gap: 5px; margin-bottom: 15px; }
        .lang-btn { text-decoration: none; padding: 3px 8px; border: 1px solid #ccc; border-radius: 3px; font-size: 12px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <a href="admin_dashboard.php" class="btn-back"><?php echo $t['back']; ?></a>
        <div class="lang-switcher">
            <a href="?lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
            <a href="?lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
            <a href="?lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
        </div>
    </div>

    <h2><?php echo $t['heading']; ?></h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th><?php echo $t['rank']; ?></th>
                    <th><?php echo $t['name']; ?></th>
                    <th><?php echo $t['email']; ?></th>
                    <th><?php echo $t['score']; ?></th>
                    <th><?php echo $t['percentage']; ?></th>
                    <th><?php echo $t['time']; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rank = 1;
                while ($row = $result->fetch_assoc()):
                    $highlight = ($rank <= 3) ? "top-scorer" : "";
                ?>
                <tr class="<?php echo $highlight; ?>">
                    <td><b><?php echo $rank; ?></b>
                        <?php if($rank == 1) echo " 🥇"; elseif($rank == 2) echo " 🥈"; elseif($rank == 3) echo " 🥉"; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo $row['score'] . " / " . $row['total_questions']; ?></td>
                    <td><?php echo round($row['percentage'], 2); ?>%</td>
                    <td><?php echo date("d-M-Y H:i A", strtotime($row['created_at'])); ?></td>
                </tr>
                <?php
                $rank++;
                endwhile;
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center; color: #666; margin-top: 20px;"><?php echo $t['no_data']; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
