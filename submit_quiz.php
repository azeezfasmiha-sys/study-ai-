<?php
// submit_quiz.php
session_start();
require 'db.php';

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'title' => 'Quiz Results - NST Campus',
        'heading' => 'தேர்வு முடிவுகள் (Quiz Results)',
        'percentage' => 'சதவீதம்',
        'evaluation' => 'விடைத்தாள் மதிப்பீடு:',
        'your_answer' => 'உங்கள் விடை',
        'question_label' => 'கேள்வி',
        'correct' => '✅ சரி',
        'wrong' => '❌ தவறு',
        'correct_answer_is' => 'சரியான விடை',
        'back' => 'Dashboard-க்குத் திரும்பு'
    ],
    'en' => [
        'title' => 'Quiz Results - NST Campus',
        'heading' => 'Quiz Results',
        'percentage' => 'Percentage',
        'evaluation' => 'Answer Sheet Evaluation:',
        'your_answer' => 'Your answer',
        'question_label' => 'Question',
        'correct' => '✅ Correct',
        'wrong' => '❌ Wrong',
        'correct_answer_is' => 'Correct answer',
        'back' => 'Back to Dashboard'
    ],
    'si' => [
        'title' => 'ප්‍රශ්නාවලි ප්‍රතිඵල - NST Campus',
        'heading' => 'ප්‍රශ්නාවලි ප්‍රතිඵල',
        'percentage' => 'ප්‍රතිශතය',
        'evaluation' => 'පිළිතුරු පත්‍රයේ ඇගයීම:',
        'your_answer' => 'ඔබේ පිළිතුර',
        'question_label' => 'ප්‍රශ්නය',
        'correct' => '✅ නිවැරදියි',
        'wrong' => '❌ වැරදියි',
        'correct_answer_is' => 'නිවැරදි පිළිතුර',
        'back' => 'Dashboard වෙත ආපසු'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['user_id'];
$score = 0;
$total_questions = 0;
$results_html = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 1. EVALUATE AI QUIZ (FROM STUDENT'S UPLOADED NOTE)
    if (isset($_POST['is_ai_mode']) && $_POST['is_ai_mode'] == '1') {
        $submitted_questions = json_decode($_POST['ai_data_json'], true);
        $total_questions = count($submitted_questions);

        foreach ($submitted_questions as $index => $q) {
            $user_ans = $_POST['answer_' . $index] ?? '';
            $correct_ans = strtoupper($q['correct_answer']);
            $is_correct = ($user_ans === $correct_ans);

            if ($is_correct) {
                $score++;
                $status = "<span style='color: green; font-weight:bold;'>" . $t['correct'] . "</span>";
            } else {
                $status = "<span style='color: red; font-weight:bold;'>" . $t['wrong'] . " ({$t['correct_answer_is']}: {$correct_ans})</span>";
            }

            $results_html .= "<div style='border-bottom: 1px solid #ddd; padding: 10px 0;'>";
            $results_html .= "<p><strong>" . ($index + 1) . ". " . htmlspecialchars($q['question']) . "</strong></p>";
            $results_html .= "<p>{$t['your_answer']}: <b>{$user_ans}</b> - {$status}</p>";
            $results_html .= "</div>";
        }
    }
    // 2. EVALUATE DATABASE QUIZ (FROM ADMIN QUESTIONS)
    elseif (isset($_POST['question_ids'])) {
        $question_ids = $_POST['question_ids'];
        $total_questions = count($question_ids);

        foreach ($question_ids as $q_id) {
            $q_id = intval($q_id);
            $user_answer = isset($_POST['answer_'.$q_id]) ? $_POST['answer_'.$q_id] : null;

            $stmt = $conn->prepare("SELECT question_text, correct_option FROM generated_questions WHERE id = ?");
            $stmt->bind_param("i", $q_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $correct_answer = $row['correct_option'];

                if ($user_answer === $correct_answer) {
                    $score++;
                    $status = "<span style='color: green; font-weight:bold;'>" . $t['correct'] . "</span>";
                } else {
                    $status = "<span style='color: red; font-weight:bold;'>" . $t['wrong'] . " ({$t['correct_answer_is']}: $correct_answer)</span>";
                }

                $results_html .= "<div style='border-bottom: 1px solid #ddd; padding: 10px 0;'>";
                $results_html .= "<p><strong>{$t['question_label']}:</strong> " . htmlspecialchars($row['question_text']) . "</p>";
                $results_html .= "<p>{$t['your_answer']}: <b>$user_answer</b> - $status</p>";
                $results_html .= "</div>";
            }
        }
    }

    // Save final score to database for leaderboard
    if ($total_questions > 0) {
        $stmt = $conn->prepare("INSERT INTO student_scores (student_id, score, total_questions) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $student_id, $score, $total_questions);
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 30px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .score-board { background: #e9ecef; padding: 20px; text-align: center; border-radius: 8px; margin-bottom: 20px; }
        .score-board h1 { margin: 0; color: #007bff; font-size: 36px; }
        .btn { background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px; font-weight: bold; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>

<div class="container">
    <div class="score-board">
        <h2><?php echo $t['heading']; ?></h2>
        <h1><?php echo $score; ?> / <?php echo $total_questions; ?></h1>
        <p><?php echo $t['percentage']; ?>: <b><?php echo ($total_questions > 0) ? round(($score / $total_questions) * 100, 2) : 0; ?>%</b></p>
    </div>

    <h3><?php echo $t['evaluation']; ?></h3>
    <?php echo $results_html; ?>

    <div style="text-align: center;">
        <a href="student_dashboard.php" class="btn"><?php echo $t['back']; ?></a>
    </div>
</div>

</body>
</html>
