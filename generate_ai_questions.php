<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$translations = [
    'ta' => [
        'page_title' => 'Student-Centric - Student Study Hub',
        'back' => '⬅ குறிப்புகள் பக்கத்திற்குத் திரும்பு',
        'heading' => '🤖 AI பயிற்சி வினாக்கள் & சந்தேக நிவர்த்தி',
        'subject_label' => 'Subject',
        'err_back_to_ocr' => 'OCR பக்கத்திற்குத் திரும்பி குறிப்புகளை உள்ளிடவும்',
        'warn_no_notes' => '⚠️ எச்சரிக்கை: எந்தவொரு குறிப்பும் வழங்கப்படவில்லை. தயவுசெய்து OCR பக்கத்திலிருந்து குறிப்புகளை உள்ளிடவும்.',
        'go_ocr' => 'OCR பக்கத்திற்குச் செல்லவும்',
        'question_word' => 'கேள்வி',
        'correct_answer_label' => 'சரியான விடை',
        'solution_label' => '💡 Step-by-Step Clear Definition & Solution:',
        'save_btn' => 'இந்த வினாக்களை Database-ல் சேமிக்கவும்',
        'complete_heading' => '🎉 பயிற்சி முடிந்தது! (Practice Complete)',
        'locked_note' => '(விடைகள் சரிபார்க்கப்பட்டு பூட்டப்பட்டுள்ளன 🔒 பாடத்திற்கேற்ற AI விளக்கங்கள் மற்றும் சந்தேக நிவர்த்தி பகுதி திறக்கப்பட்டுள்ளது)',
        'ask_doubt_prefix' => '💬 இக்கேள்வி குறித்து',
        'ask_doubt_suffix' => 'AI Tutor-டம் சந்தேகம் கேட்கவும்:',
        'doubt_example' => 'எ.கா: "இதன் விளக்கம் என்ன?", "ஏன் இந்த விடை வந்தது?" எனக் கேட்கலாம்.',
        'doubt_placeholder' => 'உங்கள் சந்தேகத்தை இங்கே கேட்கவும்...',
        'ask_btn' => 'கேள் (Ask AI)',
        'submit_check_btn' => 'விடைகளைச் சமர்ப்பித்து சரிபார் (Submit & Unlock AI Tutor)',
        'next_heading' => '📌 அடுத்ததாக என்ன செய்ய விரும்புகிறீர்கள்?',
        'retake_btn' => '🔄 புதிய கேள்விகளுடன் மீண்டும் பயிற்சி செய் (New Retake)',
        'new_notes_btn' => '📄 புதிய குறிப்பைப் பதிவேற்று',
        'dashboard_btn' => '🏠 Dashboard',
        'you_label' => 'நீங்கள்',
        'thinking' => 'சிந்திக்கிறது...',
        'connection_error' => 'இணைப்புப் பிழை ஏற்பட்டது.',
        'js_alert_answer_all' => '⚠️ தயவுசெய்து அனைத்து வினாக்களுக்கும் விடை அளிக்கவும்! (Required: Please answer all questions before submitting.)',
        'js_correct' => '✅ சரி (Correct!)',
        'js_wrong_prefix' => '❌ தவறு! உங்கள் விடை:',
        'js_wrong_middle' => '(சரியான விடை:',
        'percentage_label' => 'சதவீதம்',
        'err_json' => 'JSON வடிவமைப்புப் பிழை!',
        'err_api' => 'API இணைப்புப் பிழை! HTTP Status Code: ',
        'err_field_text' => '⚠️ தயவுசெய்து தேவையான பாடக்குறிப்புகளை உள்ளிடவும் அல்லது தேர்ந்தெடுக்கவும் (Study text is required)!',
        'err_field_subject' => '⚠️ தயவுசெய்து பாடத்தைத் தேர்ந்தெடுக்கவும் (Subject is required)!',
        'rate_limit' => '⚠️ அதிகப்படியான கோரிக்கைகள் (Rate Limit 429). தயவுசெய்து 30 வினாடிகள் காத்திருந்து மீண்டும் முயற்சிக்கவும்.',
        'ai_conn_error' => 'மன்னிக்கவும், AI சேவையகத்துடன் இணைப்பதில் சிக்கல் (HTTP Code: {code}). சிறிது நேரம் கழித்து முயற்சிக்கவும்.',
        'ai_no_answer' => 'மன்னிக்கவும், பதிலை உருவாக்க முடியவில்லை.'
    ],
    'en' => [
        'page_title' => 'Student-Centric - Student Study Hub',
        'back' => '⬅ Back to Notes Page',
        'heading' => '🤖 AI Practice Questions & Doubt Solver',
        'subject_label' => 'Subject',
        'err_back_to_ocr' => 'Go back to the OCR page and enter your notes',
        'warn_no_notes' => '⚠️ Warning: No notes were provided. Please enter notes from the OCR page.',
        'go_ocr' => 'Go to OCR Page',
        'question_word' => 'Question',
        'correct_answer_label' => 'Correct answer',
        'solution_label' => '💡 Step-by-Step Clear Definition & Solution:',
        'save_btn' => 'Save These Questions to Database',
        'complete_heading' => '🎉 Practice Complete!',
        'locked_note' => '(Answers have been checked and locked 🔒 Subject-specific AI explanations and doubt solver are now unlocked)',
        'ask_doubt_prefix' => '💬 Ask the',
        'ask_doubt_suffix' => 'AI Tutor a doubt about this question:',
        'doubt_example' => 'e.g.: You can ask "What does this mean?" or "Why is this the answer?"',
        'doubt_placeholder' => 'Ask your doubt here...',
        'ask_btn' => 'Ask AI',
        'submit_check_btn' => 'Submit & Unlock AI Tutor',
        'next_heading' => '📌 What would you like to do next?',
        'retake_btn' => '🔄 Practice Again with New Questions (New Retake)',
        'new_notes_btn' => '📄 Upload New Notes',
        'dashboard_btn' => '🏠 Dashboard',
        'you_label' => 'You',
        'thinking' => 'Thinking...',
        'connection_error' => 'A connection error occurred.',
        'js_alert_answer_all' => '⚠️ Please answer all questions before submitting!',
        'js_correct' => '✅ Correct!',
        'js_wrong_prefix' => '❌ Wrong! Your answer:',
        'js_wrong_middle' => '(Correct answer:',
        'percentage_label' => 'Percentage',
        'err_json' => 'JSON format error!',
        'err_api' => 'API connection error! HTTP Status Code: ',
        'err_field_text' => '⚠️ Study text is required!',
        'err_field_subject' => '⚠️ Subject is required!',
        'rate_limit' => '⚠️ Too many requests (Rate Limit 429). Please wait 30 seconds and try again.',
        'ai_conn_error' => 'Sorry, there was a problem connecting to the AI server (HTTP Code: {code}). Please try again shortly.',
        'ai_no_answer' => 'Sorry, could not generate a response.'
    ],
    'si' => [
        'page_title' => 'Student-Centric - Student Study Hub',
        'back' => '⬅ සටහන් පිටුවට ආපසු',
        'heading' => '🤖 AI පුහුණු ප්‍රශ්න සහ සැක නිරාකරණය',
        'subject_label' => 'විෂය',
        'err_back_to_ocr' => 'OCR පිටුවට ගොස් සටහන් ඇතුළත් කරන්න',
        'warn_no_notes' => '⚠️ අවවාදයයි: කිසිදු සටහනක් ලබා දී නොමැත. කරුණාකර OCR පිටුවෙන් සටහන් ඇතුළත් කරන්න.',
        'go_ocr' => 'OCR පිටුවට යන්න',
        'question_word' => 'ප්‍රශ්නය',
        'correct_answer_label' => 'නිවැරදි පිළිතුර',
        'solution_label' => '💡 Step-by-Step පැහැදිලි විස්තරය සහ විසඳුම:',
        'save_btn' => 'මෙම ප්‍රශ්න Database එකට සුරකින්න',
        'complete_heading' => '🎉 පුහුණුව අවසන්!',
        'locked_note' => '(පිළිතුරු පරීක්ෂා කර අගුළු දමා ඇත 🔒 විෂයට අදාළ AI පැහැදිලි කිරීම් සහ සැක නිරාකරණය දැන් විවෘතයි)',
        'ask_doubt_prefix' => '💬 මෙම ප්‍රශ්නය ගැන',
        'ask_doubt_suffix' => 'AI Tutor ගෙන් අසන්න:',
        'doubt_example' => 'උදා: "මෙහි අර්ථය කුමක්ද?", "මෙය නිවැරදි පිළිතුර වන්නේ ඇයි?" කියා අසන්න.',
        'doubt_placeholder' => 'ඔබේ සැකය මෙහි අසන්න...',
        'ask_btn' => 'අසන්න (Ask AI)',
        'submit_check_btn' => 'පිළිතුරු ඉදිරිපත් කර පරීක්ෂා කරන්න',
        'next_heading' => '📌 ඊළඟට ඔබට කුමක් කිරීමට අවශ්‍යද?',
        'retake_btn' => '🔄 නව ප්‍රශ්නවලින් නැවත පුහුණු වන්න',
        'new_notes_btn' => '📄 නව සටහන් උඩුගත කරන්න',
        'dashboard_btn' => '🏠 Dashboard',
        'you_label' => 'ඔබ',
        'thinking' => 'සිතමින්...',
        'connection_error' => 'සම්බන්ධතා දෝෂයක් ඇති විය.',
        'js_alert_answer_all' => '⚠️ කරුණාකර ඉදිරිපත් කිරීමට පෙර සියලුම ප්‍රශ්නවලට පිළිතුරු දෙන්න!',
        'js_correct' => '✅ නිවැරදියි!',
        'js_wrong_prefix' => '❌ වැරදියි! ඔබේ පිළිතුර:',
        'js_wrong_middle' => '(නිවැරදි පිළිතුර:',
        'percentage_label' => 'ප්‍රතිශතය',
        'err_json' => 'JSON ආකෘති දෝෂයක්!',
        'err_api' => 'API සම්බන්ධතා දෝෂයක්! HTTP Status Code: ',
        'err_field_text' => '⚠️ අධ්‍යයන Text අවශ්‍යයි!',
        'err_field_subject' => '⚠️ විෂය තෝරන්න!',
        'rate_limit' => '⚠️ ඉල්ලීම් වැඩිය (Rate Limit 429). තත්පර 30ක් රැඳී නැවත උත්සාහ කරන්න.',
        'ai_conn_error' => 'කණගාටුයි, AI සේවාදායකයට සම්බන්ධ වීමේ ගැටලුවක් (HTTP Code: {code}). ටික වේලාවකින් නැවත උත්සාහ කරන්න.',
        'ai_no_answer' => 'කණගාටුයි, පිළිතුරක් සෑදිය නොහැකි විය.'
    ]
];
$t = $translations[$lang];

// Handle AJAX Doubt Request dynamically based on Subject
if (isset($_POST['is_doubt_query']) && $_POST['is_doubt_query'] == '1') {
    while (ob_get_level()) {
        ob_end_clean();
    }

    if (file_exists(__DIR__ . '/config.php')) {
        require_once __DIR__ . '/config.php';
    }
    $api_key = defined('GEMINI_API_KEY') ? GEMINI_API_KEY : (getenv('GEMINI_API_KEY') ?: '');
    $question = $_POST['question'] ?? '';
    $doubt = $_POST['doubt'] ?? '';
    $subject = $_POST['subject'] ?? 'General';
    $target_lang = $_POST['target_lang'] ?? 'Tamil';
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" . $api_key;

    $prompt = "You are an expert, friendly student tutor specializing strictly in '{$subject}'.
A student is asking a specific doubt about a question or concept from their {$subject} study material.
Provide a clear, structured, step-by-step definition or explanation addressing their doubt.
Translate and output your entire response strictly in {$target_lang}. Ensure the response is complete and does not cut off.
Subject: {$subject}
Question: {$question}
Student's Doubt: {$doubt}
Provide your expert tutoring explanation:";
    $data = [
        "contents" => [["parts" => [["text" => $prompt]]]],
        "generationConfig" => ["temperature" => 0.2, "maxOutputTokens" => 2048]
    ];
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 45
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($http_code == 429) {
        echo $t['rate_limit'];
        exit();
    }
    if ($http_code != 200 || empty($response)) {
        echo str_replace('{code}', $http_code, $t['ai_conn_error']);
        exit();
    }
    $response_data = json_decode($response, true);
    $answer = $response_data['candidates'][0]['content']['parts'][0]['text'] ?? '';

    if (empty($answer)) {
        echo $t['ai_no_answer'];
    } else {
        echo trim($answer);
    }
    exit();
}

require 'db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_role = $_SESSION['role'];
if (file_exists(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
}
$api_key = defined('GEMINI_API_KEY') ? GEMINI_API_KEY : (getenv('GEMINI_API_KEY') ?: '');
$tool_mode = $_POST['tool_mode'] ?? 'quiz';
$target_lang = $_POST['target_lang'] ?? 'Tamil';
$subject = $_POST['subject'] ?? 'General / பொது';
$error_message = "";
$debug_response = "";
$questions = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['scanned_text'])) {
    $scanned_text = trim($_POST['scanned_text']);

    // REQUIRED FIELD VALIDATION
    if (empty($scanned_text)) {
        $error_message = $t['err_field_text'];
    } elseif (empty($subject)) {
        $error_message = $t['err_field_subject'];
    } else {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" . $api_key;

        // Build a DIFFERENT prompt + JSON schema depending on the chosen Study Tool Mode.
        // This is the key fix: previously every mode reused the MCQ-only schema below,
        // so flashcards/summary requests silently came back as quiz questions.
        if ($tool_mode === 'flashcards') {
            $prompt = "You are an expert professor specializing in '{$subject}'.
Analyze the provided student study notes. Identify the most important key concepts, terms, formulas, and definitions a student must memorize.
Translate and output the ENTIRE content strictly in {$target_lang}.
Generate between 8 and 20 flashcards depending on how much material is available.
Return ONLY a valid raw JSON array (no markdown, no commentary) matching this exact structure:
[
  {
    \"term\": \"Short key concept / term / formula name in {$target_lang}\",
    \"definition\": \"Clear, exam-ready definition or explanation of the term in {$target_lang}\",
    \"example\": \"A short example, application, or memory tip in {$target_lang} (optional, can be empty string)\"
  }
]
Subject: {$subject}
Study Material:
" . $scanned_text;
        } elseif ($tool_mode === 'summary') {
            $prompt = "You are an expert professor specializing in '{$subject}'.
Analyze the provided student study notes. Break the material down into its main topics/sections and write a detailed, well-organized subject summary that a student can revise from.
Translate and output the ENTIRE content strictly in {$target_lang}.
Generate between 4 and 10 sections depending on how much material is available.
Return ONLY a valid raw JSON array (no markdown, no commentary) matching this exact structure:
[
  {
    \"heading\": \"Section / topic heading in {$target_lang}\",
    \"content\": \"Detailed, well-explained summary paragraph(s) for this section in {$target_lang}. Use clear sentences, include key facts, formulas and definitions where relevant.\"
  }
]
Subject: {$subject}
Study Material:
" . $scanned_text;
        } else {
            // Default / 'quiz' mode
            $tool_mode = 'quiz';
            $prompt = "You are an expert professor and student educator specializing in '{$subject}'.
Analyze the provided student study notes or question paper. Generate comprehensive step-by-step solutions, definitions, core conceptual breakdowns, and practice MCQs tailored precisely to this subject.
Translate and output the ENTIRE content strictly in {$target_lang}.
Return ONLY a valid raw JSON array matching this exact structure:
[
  {
    \"question\": \"Question or topic statement in {$target_lang}\",
    \"option_a\": \"Option 1\",
    \"option_b\": \"Option 2\",
    \"option_c\": \"Option 3\",
    \"option_d\": \"Option 4\",
    \"correct_answer\": \"A\",
    \"solution_steps\": \"Expert step-by-step definition, formula working, or conceptual explanation in {$target_lang}\"
  }
]
Subject: {$subject}
Study Material:
" . $scanned_text;
        }
        $generationConfig = [
            "temperature" => 0.1,
            "maxOutputTokens" => 8192,
            "responseMimeType" => "application/json"
        ];
        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $prompt]
                    ]
                ]
            ],
            "generationConfig" => $generationConfig
        ];
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT => 90
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error_message = "cURL Connection Error: " . curl_error($ch);
        }
        curl_close($ch);
        if ($http_code == 200) {
            $response_data = json_decode($response, true);
            $raw_text = $response_data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            $clean_output = trim(preg_replace('/^```(?:json)?\s*|\s*```$/i', '', trim($raw_text)));
            if (substr($clean_output, -1) !== ']') {
                $clean_output .= ']';
            }
            $questions = json_decode($clean_output, true);
            if (!is_array($questions)) {
                $fixed_json = preg_replace('/\\\\([^\"\\/bfnrtu])/', '$1', $clean_output);
                $questions = json_decode($fixed_json, true);

                if (!is_array($questions)) {
                    $error_message = $t['err_json'];
                    $debug_response = $raw_text;
                }
            }
        } else {
            $error_message = $t['err_api'] . $http_code;
            $debug_response = $response;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['page_title']; ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; padding: 25px; background: #f9f9f9; }
        .container { max-width: 850px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); position: relative; }
        .question-card { background: #f1f8ff; padding: 18px; margin-bottom: 20px; border-left: 5px solid #007bff; border-radius: 5px; transition: border-left-color 0.2s; }
        .options { margin-top: 10px; line-height: 1.6; }
        .solution-box { background: #e8f4fd; border-left: 4px solid #17a2b8; padding: 15px; margin-top: 12px; border-radius: 4px; font-size: 14px; color: #0c5460; display: none; line-height: 1.6; }
        .error { color: #721c24; background: #f8d7da; padding: 15px; border-radius: 5px; border: 1px solid #f5c6cb; margin-bottom: 15px; font-weight: bold; text-align: center; }
        button, .btn { background: #28a745; color: white; padding: 12px 20px; border: none; cursor: pointer; font-size: 16px; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: bold; }
        button:hover, .btn:hover { background: #218838; }

        .live-score-banner { display: none; background: #e6fffa; border: 2px solid #38b2ac; border-radius: 8px; padding: 20px; text-align: center; margin-bottom: 20px; }
        .feedback { margin-top: 10px; font-weight: bold; display: none; }
        .correct-feedback { color: green; }
        .wrong-feedback { color: red; }
        .doubt-box { margin-top: 15px; background: #fff; border: 1px solid #cbd5e0; border-radius: 6px; padding: 12px; display: none; }
        .doubt-chat-history { max-height: 200px; overflow-y: auto; background: #f7fafc; padding: 10px; border-radius: 4px; font-size: 13px; margin-bottom: 8px; border: 1px solid #e2e8f0; line-height: 1.5; }
        .doubt-input-row { display: flex; gap: 8px; }
        .doubt-input { flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 13px; }
        .doubt-btn { background: #007bff; color: white; border: none; padding: 8px 14px; border-radius: 4px; font-size: 13px; cursor: pointer; }
        .doubt-btn:hover { background: #0056b3; }
        .next-actions { display: none; margin-top: 25px; padding-top: 20px; border-top: 2px dashed #cbd5e0; text-align: center; }
        .action-row { display: flex; justify-content: center; gap: 12px; flex-wrap: wrap; margin-top: 15px; }
        .btn-action-outline { background: #007bff; color: white; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; }
        .btn-action-retake { background: #ffc107; color: #333; padding: 12px 20px; border-radius: 6px; font-weight: bold; cursor: pointer; border: none; }
        .btn-action-dash { background: #6c757d; color: white; padding: 12px 20px; border-radius: 6px; text-decoration: none; font-weight: bold; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        .lang-switcher { display: flex; gap: 5px; }
        .lang-btn { text-decoration: none; padding: 3px 8px; border: 1px solid #ccc; border-radius: 3px; font-size: 12px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }

        /* Flashcards mode */
        .flash-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 18px; margin-top: 10px; }
        .flash-card { background: transparent; height: 190px; perspective: 1000px; cursor: pointer; }
        .flash-card-inner { position: relative; width: 100%; height: 100%; transition: transform 0.5s; transform-style: preserve-3d; }
        .flash-card.flipped .flash-card-inner { transform: rotateY(180deg); }
        .flash-face { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; border-radius: 8px; padding: 16px; box-sizing: border-box; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; overflow-y: auto; }
        .flash-front { background: #f1f8ff; border: 2px solid #007bff; }
        .flash-back { background: #eafaf1; border: 2px solid #28a745; transform: rotateY(180deg); }
        .flash-term { font-weight: bold; font-size: 17px; color: #0056b3; }
        .flash-hint { margin-top: 10px; font-size: 11px; color: #888; }
        .flash-example { margin-top: 10px; font-size: 12px; color: #2d6a4f; font-style: italic; }

        /* Summary mode */
        .summary-section { background: #f9fbff; border-left: 5px solid #6f42c1; padding: 16px 18px; margin-bottom: 16px; border-radius: 5px; }
        .summary-section h3 { margin: 0 0 8px 0; color: #4b2e83; }
        .summary-section p { margin: 0; line-height: 1.7; color: #333; white-space: pre-line; }
    </style>
</head>
<body>
<div class="container">

    <div class="top-bar">
        <a href="ocr_extract.php" style="color:#007bff; text-decoration:none; font-weight:bold;"><?php echo $t['back']; ?></a>
        <div class="lang-switcher">
            <a href="?lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
            <a href="?lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
            <a href="?lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
        </div>
    </div>
    <h2 style="text-align: center; color:#333;"><?php echo $t['heading']; ?> (<?php echo $t['subject_label']; ?>: <?php echo htmlspecialchars($subject); ?>)</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="ocr_extract.php" class="btn"><?php echo $t['err_back_to_ocr']; ?></a>
        </div>
    <?php endif; ?>

    <?php if (empty($questions) && empty($error_message)): ?>
        <div class="error"><?php echo $t['warn_no_notes']; ?></div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="ocr_extract.php" class="btn"><?php echo $t['go_ocr']; ?></a>
        </div>
    <?php endif; ?>

    <?php if (!empty($questions) && is_array($questions)): ?>

    <?php if ($tool_mode === 'flashcards'): ?>
        <!-- ================= FLASHCARDS MODE ================= -->
        <div class="flash-grid">
            <?php foreach ($questions as $q): ?>
                <div class="flash-card" onclick="this.classList.toggle('flipped')">
                    <div class="flash-card-inner">
                        <div class="flash-face flash-front">
                            <div class="flash-term"><?php echo htmlspecialchars($q['term'] ?? ''); ?></div>
                            <div class="flash-hint">👆 Tap to reveal</div>
                        </div>
                        <div class="flash-face flash-back">
                            <div><?php echo nl2br(htmlspecialchars($q['definition'] ?? '')); ?></div>
                            <?php if (!empty($q['example'])): ?>
                                <div class="flash-example">💡 <?php echo htmlspecialchars($q['example']); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <form id="retakeForm" method="POST" action="generate_ai_questions.php" style="display:none;">
            <input type="hidden" name="scanned_text" value="<?php echo htmlspecialchars($scanned_text ?? ''); ?>">
            <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
            <input type="hidden" name="target_lang" value="<?php echo htmlspecialchars($target_lang); ?>">
            <input type="hidden" name="tool_mode" value="<?php echo htmlspecialchars($tool_mode); ?>">
        </form>
        <div class="next-actions" style="display:block;">
            <div class="action-row">
                <button type="button" class="btn-action-retake" onclick="document.getElementById('retakeForm').submit()"><?php echo $t['retake_btn']; ?></button>
                <a href="ocr_extract.php" class="btn-action-outline"><?php echo $t['new_notes_btn']; ?></a>
                <a href="<?php echo ($user_role === 'admin') ? 'admin_dashboard.php' : 'student_dashboard.php'; ?>" class="btn-action-dash"><?php echo $t['dashboard_btn']; ?></a>
            </div>
        </div>

    <?php elseif ($tool_mode === 'summary'): ?>
        <!-- ================= SUMMARY MODE ================= -->
        <?php foreach ($questions as $q): ?>
            <div class="summary-section">
                <h3><?php echo htmlspecialchars($q['heading'] ?? ''); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($q['content'] ?? '')); ?></p>
            </div>
        <?php endforeach; ?>

        <form id="retakeForm" method="POST" action="generate_ai_questions.php" style="display:none;">
            <input type="hidden" name="scanned_text" value="<?php echo htmlspecialchars($scanned_text ?? ''); ?>">
            <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
            <input type="hidden" name="target_lang" value="<?php echo htmlspecialchars($target_lang); ?>">
            <input type="hidden" name="tool_mode" value="<?php echo htmlspecialchars($tool_mode); ?>">
        </form>
        <div class="next-actions" style="display:block;">
            <div class="action-row">
                <button type="button" class="btn-action-retake" onclick="document.getElementById('retakeForm').submit()"><?php echo $t['retake_btn']; ?></button>
                <a href="ocr_extract.php" class="btn-action-outline"><?php echo $t['new_notes_btn']; ?></a>
                <a href="<?php echo ($user_role === 'admin') ? 'admin_dashboard.php' : 'student_dashboard.php'; ?>" class="btn-action-dash"><?php echo $t['dashboard_btn']; ?></a>
            </div>
        </div>

    <?php else: ?>
        <!-- ================= QUIZ MODE (default) ================= -->
        <?php if ($user_role === 'admin'): ?>
            <form action="save_questions.php" method="POST">
                <input type="hidden" name="questions_json" value='<?php echo htmlspecialchars(json_encode($questions)); ?>'>
                <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject); ?>">

                <?php foreach ($questions as $index => $q): ?>
                    <div class="question-card">
                        <p><strong><?php echo $t['question_word']; ?> <?php echo $index + 1; ?>: <?php echo htmlspecialchars($q['question']); ?></strong></p>
                        <div class="options">
                            A) <?php echo htmlspecialchars($q['option_a']); ?><br>
                            B) <?php echo htmlspecialchars($q['option_b']); ?><br>
                            C) <?php echo htmlspecialchars($q['option_c']); ?><br>
                            D) <?php echo htmlspecialchars($q['option_d']); ?>
                        </div>
                        <p style="color:green; font-weight:bold; margin-top:8px;"><?php echo $t['correct_answer_label']; ?>: <?php echo htmlspecialchars($q['correct_answer']); ?></p>
                        <?php if (!empty($q['solution_steps'])): ?>
                            <div class="solution-box" style="display:block;">
                                <strong><?php echo $t['solution_label']; ?></strong><br>
                                <?php echo nl2br(htmlspecialchars($q['solution_steps'])); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit"><?php echo $t['save_btn']; ?></button>
                </div>
            </form>
        <?php else: ?>
            <div id="liveScoreBoard" class="live-score-banner">
                <h3 style="margin:0; color:#234e52;"><?php echo $t['complete_heading']; ?></h3>
                <h1 id="scoreDisplay" style="color:#007bff; margin:10px 0; font-size:36px;">0 / <?php echo count($questions); ?></h1>
                <p id="percentageDisplay" style="font-size:16px; margin:0; font-weight:bold;"></p>
                <p style="color:#666; font-size:13px; margin-top:5px;"><?php echo $t['locked_note']; ?></p>
            </div>

            <form id="practiceQuizForm" onsubmit="return validateAndEvaluate(event, <?php echo count($questions); ?>)">
                <?php foreach ($questions as $i => $q): ?>
                    <div class="question-card" id="q_card_<?php echo $i; ?>" data-correct="<?php echo strtoupper($q['correct_answer']); ?>">
                        <p><strong><?php echo ($i + 1) . ". " . htmlspecialchars($q['question']); ?></strong></p>
                        <label style="display:block; margin:6px 0; cursor:pointer;"><input type="radio" name="student_ans_<?php echo $i; ?>" value="A"> A) <?php echo htmlspecialchars($q['option_a']); ?></label>
                        <label style="display:block; margin:6px 0; cursor:pointer;"><input type="radio" name="student_ans_<?php echo $i; ?>" value="B"> B) <?php echo htmlspecialchars($q['option_b']); ?></label>
                        <label style="display:block; margin:6px 0; cursor:pointer;"><input type="radio" name="student_ans_<?php echo $i; ?>" value="C"> C) <?php echo htmlspecialchars($q['option_c']); ?></label>
                        <label style="display:block; margin:6px 0; cursor:pointer;"><input type="radio" name="student_ans_<?php echo $i; ?>" value="D"> D) <?php echo htmlspecialchars($q['option_d']); ?></label>

                        <div class="feedback" id="feedback_<?php echo $i; ?>"></div>

                        <?php if (!empty($q['solution_steps'])): ?>
                            <div class="solution-box" id="solution_<?php echo $i; ?>">
                                <strong><?php echo $t['solution_label']; ?></strong><br>
                                <span id="sol_text_<?php echo $i; ?>"><?php echo nl2br(htmlspecialchars($q['solution_steps'])); ?></span>
                            </div>
                        <?php endif; ?>
                        <!-- Interactive Subject-Aware Doubt Agent Chat Box -->
                        <div class="doubt-box" id="doubt_box_<?php echo $i; ?>">
                            <p style="margin:0 0 5px 0; font-weight:bold; color:#0056b3; font-size:13px;"><?php echo $t['ask_doubt_prefix']; ?> <?php echo htmlspecialchars($subject); ?> <?php echo $t['ask_doubt_suffix']; ?></p>
                            <div class="doubt-chat-history" id="chat_history_<?php echo $i; ?>">
                                <div style="color:#666;"><?php echo $t['doubt_example']; ?></div>
                            </div>
                            <div class="doubt-input-row">
                                <input type="text" class="doubt-input" id="doubt_input_<?php echo $i; ?>" placeholder="<?php echo $t['doubt_placeholder']; ?>">
                                <button type="button" class="doubt-btn" onclick="askAIDoubt(<?php echo $i; ?>, '<?php echo addslashes($q['question']); ?>', '<?php echo addslashes($subject); ?>')"><?php echo $t['ask_btn']; ?></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <button type="submit" style="width:100%;" id="checkBtn"><?php echo $t['submit_check_btn']; ?></button>
            </form>

            <form id="retakeForm" method="POST" action="generate_ai_questions.php" style="display:none;">
                <input type="hidden" name="scanned_text" value="<?php echo htmlspecialchars($scanned_text ?? ''); ?>">
                <input type="hidden" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
                <input type="hidden" name="target_lang" value="<?php echo htmlspecialchars($target_lang); ?>">
                <input type="hidden" name="tool_mode" value="<?php echo htmlspecialchars($tool_mode); ?>">
            </form>
            <div id="nextActionsPanel" class="next-actions">
                <h3 style="margin:0; color:#2d3748;"><?php echo $t['next_heading']; ?></h3>
                <div class="action-row">
                    <button type="button" class="btn-action-retake" onclick="document.getElementById('retakeForm').submit()"><?php echo $t['retake_btn']; ?></button>
                    <a href="ocr_extract.php" class="btn-action-outline"><?php echo $t['new_notes_btn']; ?></a>
                    <a href="student_dashboard.php" class="btn-action-dash"><?php echo $t['dashboard_btn']; ?></a>
                </div>
            </div>

            <script>
            function validateAndEvaluate(event, totalQuestions) {
                event.preventDefault();
                let allAnswered = true;

                for (let i = 0; i < totalQuestions; i++) {
                    const selected = document.querySelector('input[name="student_ans_' + i + '"]:checked');
                    const card = document.getElementById('q_card_' + i);
                    if (!selected) {
                        allAnswered = false;
                        card.style.borderLeftColor = 'red';
                    } else {
                        card.style.borderLeftColor = '#007bff';
                    }
                }

                if (!allAnswered) {
                    alert("<?php echo $t['js_alert_answer_all']; ?>");
                    return false;
                }

                // If fully answered, execute evaluation
                evaluateRealTimeQuiz(totalQuestions);
                return false;
            }

            function evaluateRealTimeQuiz(totalQuestions) {
                let score = 0;
                document.querySelectorAll('#practiceQuizForm input[type="radio"]').forEach(radio => {
                    radio.disabled = true;
                });
                for (let i = 0; i < totalQuestions; i++) {
                    const card = document.getElementById('q_card_' + i);
                    const correctAns = card.getAttribute('data-correct');
                    const selected = document.querySelector('input[name="student_ans_' + i + '"]:checked');
                    const feedback = document.getElementById('feedback_' + i);
                    const solutionBox = document.getElementById('solution_' + i);
                    const doubtBox = document.getElementById('doubt_box_' + i);

                    feedback.style.display = 'block';
                    if (solutionBox) solutionBox.style.display = 'block';
                    if (doubtBox) doubtBox.style.display = 'block';

                    if (selected) {
                        if (selected.value.toUpperCase() === correctAns) {
                            score++;
                            feedback.className = 'feedback correct-feedback';
                            feedback.innerHTML = '<?php echo $t['js_correct']; ?>';
                            card.style.borderLeftColor = 'green';
                        } else {
                            feedback.className = 'feedback wrong-feedback';
                            feedback.innerHTML = '<?php echo $t['js_wrong_prefix']; ?> ' + selected.value + ' <?php echo $t['js_wrong_middle']; ?> ' + correctAns + ')';
                            card.style.borderLeftColor = 'red';
                        }
                    }
                }
                const scoreBoard = document.getElementById('liveScoreBoard');
                scoreBoard.style.display = 'block';
                document.getElementById('scoreDisplay').innerText = score + ' / ' + totalQuestions;
                document.getElementById('percentageDisplay').innerText = '<?php echo $t['percentage_label']; ?>: ' + ((score / totalQuestions) * 100).toFixed(1) + '%';

                document.getElementById('checkBtn').style.display = 'none';
                document.getElementById('nextActionsPanel').style.display = 'block';
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            function askAIDoubt(index, questionText, subjectName) {
                const inputField = document.getElementById('doubt_input_' + index);
                const historyBox = document.getElementById('chat_history_' + index);
                const userQuery = inputField.value.trim();
                if (!userQuery) return;
                historyBox.innerHTML += `<div style="margin: 4px 0; text-align: right;"><b><?php echo $t['you_label']; ?>:</b> ${userQuery}</div>`;
                inputField.value = '';
                historyBox.scrollTop = historyBox.scrollHeight;
                const loadingId = 'loading_' + index + '_' + Date.now();
                historyBox.innerHTML += `<div id="${loadingId}" style="margin: 4px 0; color: #007bff;"><b>${subjectName} AI Tutor:</b> <?php echo $t['thinking']; ?></div>`;
                historyBox.scrollTop = historyBox.scrollHeight;
                $.ajax({
                    url: 'generate_ai_questions.php',
                    type: 'POST',
                    data: {
                        is_doubt_query: 1,
                        question: questionText,
                        doubt: userQuery,
                        subject: subjectName,
                        target_lang: '<?php echo $target_lang; ?>'
                    },
                    success: function(response) {
                        document.getElementById(loadingId).remove();
                        historyBox.innerHTML += `<div style="margin: 6px 0; color: #2d3748; background: #e2e8f0; padding: 6px; border-radius: 4px;"><b>${subjectName} AI Tutor:</b> ${response}</div>`;
                        historyBox.scrollTop = historyBox.scrollHeight;
                    },
                    error: function() {
                        document.getElementById(loadingId).remove();
                        historyBox.innerHTML += `<div style="margin: 6px 0; color: red;"><b>AI Tutor:</b> <?php echo $t['connection_error']; ?></div>`;
                    }
                });
            }
            </script>
        <?php endif; ?>
    <?php endif; // end quiz/flashcards/summary branch ?>

    <?php endif; // end !empty($questions) ?>
</div>
</body>
</html>
