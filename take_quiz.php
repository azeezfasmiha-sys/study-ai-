<?php
// take_quiz.php
session_start();
require 'db.php';

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'title' => 'Quiz',
        'back' => '⬅ Dashboard-க்குத் திரும்பு',
        'questions_suffix' => 'வினாக்கள்',
        'submit' => 'விடைகளைச் சமர்ப்பிக்கவும் (Submit Answers)',
        'no_quiz' => 'இந்தப் பாடத்தில் தற்போது கேள்விகள் இல்லை.',
        'choose_other' => 'வேறு பாடத்தைத் தேர்ந்தெடுக்கவும்'
    ],
    'en' => [
        'title' => 'Quiz',
        'back' => '⬅ Back to Dashboard',
        'questions_suffix' => 'Questions',
        'submit' => 'Submit Answers',
        'no_quiz' => 'There are no questions available for this subject right now.',
        'choose_other' => 'Choose another subject'
    ],
    'si' => [
        'title' => 'ප්‍රශ්නාවලිය',
        'back' => '⬅ Dashboard වෙත ආපසු',
        'questions_suffix' => 'ප්‍රශ්න',
        'submit' => 'පිළිතුරු ඉදිරිපත් කරන්න',
        'no_quiz' => 'මෙම විෂය සඳහා දැනට ප්‍රශ්න නොමැත.',
        'choose_other' => 'වෙනත් විෂයක් තෝරන්න'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['subject']) || empty(trim($_GET['subject']))) {
    header("Location: student_dashboard.php");
    exit();
}

$selected_subject = $_GET['subject'];

// Fetch strictly 5 questions for the selected subject
$stmt = $conn->prepare("SELECT * FROM generated_questions WHERE subject = ? ORDER BY RAND() LIMIT 5");
$stmt->bind_param("s", $selected_subject);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($selected_subject); ?> - <?php echo $t['title']; ?></title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f7f6; padding: 20px; margin: 0; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .header-box { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #edf2f7; padding-bottom: 15px; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
        .back-link { color: #007bff; text-decoration: none; font-weight: bold; font-size: 14px; }
        .question-card { background: #f8fafc; border-left: 4px solid #007bff; border-radius: 6px; padding: 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .question-title { font-weight: bold; font-size: 16px; margin-bottom: 15px; color: #2d3748; line-height: 1.5; }
        label { display: block; padding: 10px 12px; margin-bottom: 8px; background: white; border: 1px solid #e2e8f0; border-radius: 6px; cursor: pointer; transition: all 0.2s ease; color: #4a5568; }
        label:hover { background: #edf2f7; border-color: #cbd5e0; }
        input[type="radio"] { margin-right: 10px; }
        .submit-btn { background: #28a745; color: white; padding: 14px 25px; border: none; font-size: 16px; font-weight: bold; border-radius: 6px; cursor: pointer; width: 100%; transition: background 0.2s; margin-top: 10px; }
        .submit-btn:hover { background: #218838; }
        .no-quiz { text-align: center; color: #718096; padding: 40px 20px; }
        .lang-switcher { display: flex; gap: 5px; }
        .lang-btn { text-decoration: none; padding: 3px 8px; border: 1px solid #ccc; border-radius: 3px; font-size: 12px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-box">
        <a href="student_dashboard.php" class="back-link"><?php echo $t['back']; ?></a>
        <h3 style="margin: 0; color: #2b6cb0;">📖 <?php echo htmlspecialchars($selected_subject); ?> (5 <?php echo $t['questions_suffix']; ?>)</h3>
        <div class="lang-switcher">
            <a href="?subject=<?php echo urlencode($selected_subject); ?>&lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
            <a href="?subject=<?php echo urlencode($selected_subject); ?>&lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
            <a href="?subject=<?php echo urlencode($selected_subject); ?>&lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
        </div>
    </div>

    <form action="submit_quiz.php" method="POST">
        <?php
        $q_no = 1;
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
                <div class="question-card">
                    <div class="question-title"><?php echo $q_no . ". " . htmlspecialchars($row['question_text']); ?></div>
                    <input type="hidden" name="question_ids[]" value="<?php echo $row['id']; ?>">
                    <label><input type="radio" name="answer_<?php echo $row['id']; ?>" value="A" required> <b>A)</b> <?php echo htmlspecialchars($row['option_a']); ?></label>
                    <label><input type="radio" name="answer_<?php echo $row['id']; ?>" value="B"> <b>B)</b> <?php echo htmlspecialchars($row['option_b']); ?></label>
                    <label><input type="radio" name="answer_<?php echo $row['id']; ?>" value="C"> <b>C)</b> <?php echo htmlspecialchars($row['option_c']); ?></label>
                    <label><input type="radio" name="answer_<?php echo $row['id']; ?>" value="D"> <b>D)</b> <?php echo htmlspecialchars($row['option_d']); ?></label>
                </div>
        <?php
                $q_no++;
            }
        ?>
            <button type="submit" class="submit-btn"><?php echo $t['submit']; ?></button>
        <?php
        } else {
            echo "<div class='no-quiz'><p>" . $t['no_quiz'] . "</p><a href='student_dashboard.php' class='back-link'>" . $t['choose_other'] . "</a></div>";
        }
        ?>
    </form>
</div>

</body>
</html>
