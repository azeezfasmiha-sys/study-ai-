<?php
// save_questions.php
session_start();
require 'db.php';

$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'title' => 'Student-Centric - Save Questions',
        'heading' => 'Student-Centric - System Update',
        'saved_hint' => 'மாணவர்கள் இப்போது தங்களின் Dashboard-க்குச் சென்று இந்தக் கேள்விகளுக்கு விடையளிக்கலாம்.',
        'success_suffix' => 'கேள்விகள் வெற்றிகரமாக Database-ல் சேமிக்கப்பட்டன! 🚀',
        'err_save' => 'கேள்விகளை சேமிப்பதில் பிழை ஏற்பட்டது.',
        'err_db' => 'Database குறியீட்டில் பிழை: ',
        'err_invalid' => 'சேமிப்பதற்கு சரியான கேள்விகள் கிடைக்கவில்லை.',
        'err_direct' => 'நேரடி அணுகல் அனுமதிக்கப்படவில்லை.',
        'back' => 'Admin Dashboard-க்குச் செல்க'
    ],
    'en' => [
        'title' => 'Student-Centric - Save Questions',
        'heading' => 'Student-Centric - System Update',
        'saved_hint' => 'Students can now go to their dashboard and answer these questions.',
        'success_suffix' => 'questions were successfully saved to the database! 🚀',
        'err_save' => 'An error occurred while saving the questions.',
        'err_db' => 'Database error: ',
        'err_invalid' => 'No valid questions were found to save.',
        'err_direct' => 'Direct access is not allowed.',
        'back' => 'Go to Admin Dashboard'
    ],
    'si' => [
        'title' => 'Student-Centric - ප්‍රශ්න සුරකින්න',
        'heading' => 'Student-Centric - පද්ධති යාවත්කාලීනය',
        'saved_hint' => 'සිසුන්ට දැන් ඔවුන්ගේ Dashboard වෙත ගොස් මෙම ප්‍රශ්නවලට පිළිතුරු දිය හැක.',
        'success_suffix' => 'ප්‍රශ්න සාර්ථකව Database එකට සුරැකින ලදී! 🚀',
        'err_save' => 'ප්‍රශ්න සුරැකීමේදී දෝෂයක් ඇති විය.',
        'err_db' => 'Database දෝෂය: ',
        'err_invalid' => 'සුරැකීමට වලංගු ප්‍රශ්න හමු නොවීය.',
        'err_direct' => 'සෘජු ප්‍රවේශයට අවසර නැත.',
        'back' => 'Admin Dashboard වෙත යන්න'
    ]
];
$t = $translations[$lang];

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$success_message = "";
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['questions_json'])) {
    $questions_json = $_POST['questions_json'];
    $questions = json_decode($questions_json, true);

    $subject = isset($_POST['subject']) ? $_POST['subject'] : "General";
    $file_id = isset($_POST['file_id']) ? intval($_POST['file_id']) : 1;

    $admin_id = $_SESSION['user_id'];
    $check_file = $conn->query("SELECT id FROM uploaded_files WHERE id = $file_id");

    if ($check_file->num_rows == 0) {
        $conn->query("INSERT INTO uploaded_files (id, admin_id, file_name, extracted_text) VALUES ($file_id, $admin_id, 'System_Generated_File', 'AI Created Text')");
    }

    if (is_array($questions) && !empty($questions)) {
        $stmt = $conn->prepare("INSERT INTO generated_questions (file_id, subject, question_text, option_a, option_b, option_c, option_d, correct_option) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $inserted_count = 0;
            foreach ($questions as $q) {
                $q_text = $q['question'];
                $opt_a = $q['option_a'];
                $opt_b = $q['option_b'];
                $opt_c = $q['option_c'];
                $opt_d = $q['option_d'];
                $answer = $q['correct_answer'];

                $stmt->bind_param("isssssss", $file_id, $subject, $q_text, $opt_a, $opt_b, $opt_c, $opt_d, $answer);

                if ($stmt->execute()) {
                    $inserted_count++;
                }
            }
            $stmt->close();

            if ($inserted_count > 0) {
                $success_message = "$inserted_count " . $t['success_suffix'];
            } else {
                $error_message = $t['err_save'];
            }
        } else {
            $error_message = $t['err_db'] . $conn->error;
        }
    } else {
        $error_message = $t['err_invalid'];
    }
} else {
    $error_message = $t['err_direct'];
}
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['title']; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 50px; }
        .container { background: white; max-width: 500px; margin: auto; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; }
        .success { color: #155724; background-color: #d4edda; padding: 15px; border-radius: 5px; border: 1px solid #c3e6cb; margin-bottom: 20px; font-weight: bold; }
        .error { color: #721c24; background-color: #f8d7da; padding: 15px; border-radius: 5px; border: 1px solid #f5c6cb; margin-bottom: 20px; font-weight: bold; }
        .btn { background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 10px; font-weight: bold; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2><?php echo $t['heading']; ?></h2>

    <?php if (!empty($success_message)): ?>
        <div class="success"><?php echo $success_message; ?></div>
        <p><?php echo $t['saved_hint']; ?></p>
    <?php endif; ?>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <a href="admin_dashboard.php" class="btn"><?php echo $t['back']; ?></a>
</div>

</body>
</html>
