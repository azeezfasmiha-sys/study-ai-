<?php
// ocr_extract.php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'ta';

$lang_name_map = ['ta' => 'Tamil', 'en' => 'English', 'si' => 'Sinhala'];
$target_lang_name = $lang_name_map[$lang] ?? 'Tamil';

$translations = [
    'ta' => [
        'title' => 'Student OCR & Automated AI Hub - Student-Centric',
        'back' => '⬅ Dashboard-க்குத் திரும்பு',
        'heading' => '📚 மாணவர்களுக்கான தானியங்கி & கைமுறை OCR மையம்',
        'select_subject' => 'பாடத்தைத் தேர்ந்தெடுக்கவும் (Select Subject):',
        'paste_label' => 'பாடக்குறிப்பை Paste செய்யவும்:',
        'paste_placeholder' => 'இங்கே குறிப்புகளை Paste செய்யலாம்...',
        'files_label' => 'கோப்புகளைத் தேர்ந்தெடுக்கவும் (Multiple JPG, PNG, PDF):',
        'process_btn' => '📄 Text-ஐ பிரித்தெடு & AI ஆய்வு செய் (Process OCR & Inspect)',
        'extracted_heading' => 'பிரித்தெடுக்கப்பட்ட எழுத்துக்கள் & கற்றல் வடிவமைப்பு:',
        'file_prefix' => '📎 கோப்பு:',
        'ai_recommend_label' => '⚡ AI பரிந்துரை (AI Recommended Mode):',
        'ai_recommend_desc' => 'ஆவணத்தின் தன்மையை ஆராய்ந்து சிறந்த வடிவம் தேர்ந்தெடுக்கப்பட்டுள்ளது. தேவைப்பட்டால் கீழே மாற்றிக் கொள்ளலாம்.',
        'mode_label' => 'உருவாக்க வேண்டிய வடிவம் (Manual Choice / Study Tool Mode):',
        'mode_quiz' => '🎯 வினாத்தாள் தீர்வுகள் & பயிற்சி வினாக்கள் (MCQs & Step-by-Step Solutions)',
        'mode_flash' => '⚡ முக்கியமான கோட்பாடுகள் & அட்டவணைகள் (Concepts & Flashcards)',
        'mode_summary' => '📝 விரிவான பாடச் சுருக்கம் (Detailed Subject Summary)',
        'generate_btn' => 'AI கற்றல் மையத்திற்குச் செல் (Generate AI Study Hub)',
        'pasted_filename' => 'நேரடி குறிப்புகள் (Pasted Text)',
        'js_calc_pages' => 'பக்கங்களை கணக்கிடுகிறது...',
        'js_one_page' => '1 பக்கம் (Image)',
        'js_pdf_pages' => 'பக்கங்கள் (PDF Pages)',
        'js_error' => '(பிழை)',
        'js_range_label' => 'பக்க வரம்பைக் குறிப்பிடவும்:',
        'js_range_placeholder' => 'எ.கா: 1-3 அல்லது 1,3',
        'js_alert_empty' => 'தயவுசெய்து குறிப்புகளை உள்ளிடவும்!'
    ],
    'en' => [
        'title' => 'Student OCR & Automated AI Hub - Student-Centric',
        'back' => '⬅ Back to Dashboard',
        'heading' => '📚 Automated & Manual OCR Hub for Students',
        'select_subject' => 'Select Subject:',
        'paste_label' => 'Paste your study notes:',
        'paste_placeholder' => 'You can paste your notes here...',
        'files_label' => 'Select files (Multiple JPG, PNG, PDF):',
        'process_btn' => '📄 Extract Text & AI Inspect (Process OCR & Inspect)',
        'extracted_heading' => 'Extracted Text & Study Format:',
        'file_prefix' => '📎 File:',
        'ai_recommend_label' => '⚡ AI Recommended Mode:',
        'ai_recommend_desc' => 'The best format has been chosen automatically based on the document content. You can change it below if needed.',
        'mode_label' => 'Format to generate (Manual Choice / Study Tool Mode):',
        'mode_quiz' => '🎯 Quiz Solutions & Practice Questions (MCQs & Step-by-Step Solutions)',
        'mode_flash' => '⚡ Key Concepts & Flashcards',
        'mode_summary' => '📝 Detailed Subject Summary',
        'generate_btn' => 'Go to AI Study Hub (Generate AI Study Hub)',
        'pasted_filename' => 'Pasted Text',
        'js_calc_pages' => 'Counting pages...',
        'js_one_page' => '1 page (Image)',
        'js_pdf_pages' => 'PDF Pages',
        'js_error' => '(Error)',
        'js_range_label' => 'Specify page range:',
        'js_range_placeholder' => 'e.g.: 1-3 or 1,3',
        'js_alert_empty' => 'Please enter your notes!'
    ],
    'si' => [
        'title' => 'Student OCR & Automated AI Hub - Student-Centric',
        'back' => '⬅ Dashboard වෙත ආපසු',
        'heading' => '📚 සිසුන් සඳහා ස්වයංක්‍රීය සහ අතින් OCR මධ්‍යස්ථානය',
        'select_subject' => 'විෂය තෝරන්න (Select Subject):',
        'paste_label' => 'ඔබේ සටහන් Paste කරන්න:',
        'paste_placeholder' => 'මෙහි සටහන් paste කළ හැක...',
        'files_label' => 'ගොනු තෝරන්න (JPG, PNG, PDF, කිහිපයක්):',
        'process_btn' => '📄 Text උපුටා ගෙන AI විශ්ලේෂණය කරන්න (Process OCR & Inspect)',
        'extracted_heading' => 'උපුටාගත් අකුරු සහ අධ්‍යයන ආකෘතිය:',
        'file_prefix' => '📎 ගොනුව:',
        'ai_recommend_label' => '⚡ AI නිර්දේශය (AI Recommended Mode):',
        'ai_recommend_desc' => 'ලේඛනයේ ස්වභාවය අනුව හොඳම ආකෘතිය ස්වයංක්‍රීයව තෝරාගෙන ඇත. අවශ්‍ය නම් පහතින් වෙනස් කළ හැක.',
        'mode_label' => 'සෑදිය යුතු ආකෘතිය (Manual Choice / Study Tool Mode):',
        'mode_quiz' => '🎯 ප්‍රශ්නාවලි විසඳුම් සහ පුහුණු ප්‍රශ්න (MCQs & Step-by-Step Solutions)',
        'mode_flash' => '⚡ ප්‍රධාන සංකල්ප සහ Flashcards',
        'mode_summary' => '📝 විස්තරාත්මක විෂය සාරාංශය',
        'generate_btn' => 'AI අධ්‍යයන මධ්‍යස්ථානයට යන්න (Generate AI Study Hub)',
        'pasted_filename' => 'Paste කළ Text',
        'js_calc_pages' => 'පිටු ගණන් කරමින්...',
        'js_one_page' => 'පිටු 1 (Image)',
        'js_pdf_pages' => 'PDF පිටු',
        'js_error' => '(දෝෂයකි)',
        'js_range_label' => 'පිටු පරාසය සඳහන් කරන්න:',
        'js_range_placeholder' => 'උදා: 1-3 හෝ 1,3',
        'js_alert_empty' => 'කරුණාකර සටහන් ඇතුළත් කරන්න!'
    ]
];
$t = $translations[$lang];

set_time_limit(300);
ini_set('max_execution_time', '300');
ini_set('memory_limit', '512M');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$extracted_results = [];
$selected_subject = "";
$user_role = $_SESSION['role'];
$auto_detected_mode = "quiz";

if (file_exists(__DIR__ . '/config.php')) {
    require_once __DIR__ . '/config.php';
}
$api_key = defined('GEMINI_API_KEY') ? GEMINI_API_KEY : (getenv('GEMINI_API_KEY') ?: '');

function parsePageSelection($page_str, $max_pages) {
    $pages = [];
    $page_str = trim($page_str);
    if (empty($page_str)) return range(1, max(1, $max_pages));

    $parts = explode(',', $page_str);
    foreach ($parts as $part) {
        $part = trim($part);
        if (strpos($part, '-') !== false) {
            list($start, $end) = explode('-', $part);
            $start = intval(trim($start));
            $end = intval(trim($end));
            for ($i = max(1, $start); $i <= min($max_pages, $end); $i++) {
                $pages[] = $i;
            }
        } else {
            $p = intval($part);
            if ($p >= 1 && $p <= $max_pages) {
                $pages[] = $p;
            }
        }
    }
    return array_unique($pages);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_subject = $_POST['subject'] ?? 'General / பொது';
    $pasted_text = trim($_POST['pasted_text'] ?? '');
    $tesseract_path = '"C:\Program Files\Tesseract-OCR\tesseract.exe"';
    $pdftoppm_path = '"C:\poppler\Library\bin\pdftoppm.exe"';
    $pdfinfo_path = '"C:\poppler\Library\bin\pdfinfo.exe"';
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) mkdir($target_dir, 0777, true);
    if (!empty($_FILES['upload_files']['name'][0])) {
        foreach ($_FILES['upload_files']['name'] as $index => $original_name) {
            $tmp_name = $_FILES['upload_files']['tmp_name'][$index];
            if (empty($tmp_name)) continue;
            $file_ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));
            $file_name = time() . "_" . uniqid() . "." . $file_ext;
            $saved_file_path = $target_dir . $file_name;

            if (move_uploaded_file($tmp_name, $saved_file_path)) {
                $total_pages = 1;
                if ($file_ext === 'pdf') {
                    $info_cmd = $pdfinfo_path . " " . escapeshellarg($saved_file_path);
                    $info_output = shell_exec($info_cmd);
                    if (preg_match('/Pages:\s+(\d+)/', $info_output, $matches)) {
                        $total_pages = intval($matches[1]);
                    }
                }
                $page_range_input = $_POST['page_ranges'][$index] ?? '';
                $target_pages = parsePageSelection($page_range_input, $total_pages);
                $extracted_text = "";

                if ($file_ext === 'pdf') {
                    $output_image_prefix = $target_dir . "page_" . time() . "_" . $index;
                    $all_pages_text = [];

                    foreach ($target_pages as $p) {
                        $convert_cmd = $pdftoppm_path . " -png -f $p -l $p -r 300 " . escapeshellarg($saved_file_path) . " " . escapeshellarg($output_image_prefix);
                        shell_exec($convert_cmd);
                    }
                    foreach ($target_pages as $p) {
                        $matched_imgs = glob($output_image_prefix . "*.png");
                        foreach ($matched_imgs as $page_img) {
                            $page_text = shell_exec($tesseract_path . ' ' . escapeshellarg($page_img) . ' stdout -l eng+tam+sin');
                            if ($page_text) {
                                $all_pages_text[] = "--- Page $p ---\n" . trim($page_text);
                            }
                            unlink($page_img);
                        }
                    }
                    $extracted_text = implode("\n\n", $all_pages_text);
                } else {
                    $extracted_text = shell_exec($tesseract_path . ' ' . escapeshellarg($saved_file_path) . ' stdout -l eng+tam+sin');
                }
                $extracted_results[] = [
                    'filename' => $original_name,
                    'text' => trim($extracted_text)
                ];
            }
        }
    }
    if (!empty($pasted_text)) {
        $extracted_results[] = [
            'filename' => $t['pasted_filename'],
            'text' => $pasted_text
        ];
    }
    // AUTOMATED AI CONTENT INSPECTION
    if (!empty($extracted_results)) {
        $full_extracted_corpus = "";
        foreach ($extracted_results as $res) {
            $full_extracted_corpus .= $res['text'] . "\n\n";
        }
        $decision_url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" . $api_key;
        $decision_prompt = "Analyze the following extracted study text. Determine whether this material requires 'quiz' (practice questions and step-by-step solutions), 'flashcards' (formulas and core definitions), or 'summary' (comprehensive theoretical notes).
Return ONLY one single word representing your decision: either 'quiz', 'flashcards', or 'summary'. No punctuation or extra text.
Text to analyze:
" . substr($full_extracted_corpus, 0, 1500);
        $decision_payload = [
            "contents" => [["parts" => [["text" => $decision_prompt]]]],
            "generationConfig" => ["temperature" => 0.1, "maxOutputTokens" => 10]
        ];
        $ch = curl_init($decision_url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($decision_payload),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT => 20
        ]);
        $decision_response = curl_exec($ch);
        curl_close($ch);
        $dec_data = json_decode($decision_response, true);
        $ai_decision = trim(strtolower($dec_data['candidates'][0]['content']['parts'][0]['text'] ?? 'quiz'));

        if (in_array($ai_decision, ['quiz', 'flashcards', 'summary'])) {
            $auto_detected_mode = $ai_decision;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $t['title']; ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; padding: 25px; background: #f4f4f4; margin: 0; }
        .container { max-width: 800px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); position: relative; }
        input[type="text"], input[type="file"], select, textarea, button { width: 100%; padding: 10px; margin-top: 8px; box-sizing: border-box; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; }
        button { background: #007BFF; color: white; border: none; font-weight: bold; cursor: pointer; padding: 12px; transition: 0.2s; }
        button:hover { background: #0056b3; }
        .editable-result-box { width: 100%; margin-top: 5px; padding: 12px; background: #f8f9fa; border: 2px solid #28a745; font-family: inherit; font-size: 14px; line-height: 1.5; resize: vertical; border-radius: 5px; box-sizing: border-box; }
        .btn-back { display: inline-block; margin-bottom: 10px; color: #007bff; text-decoration: none; font-weight: bold; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        .lang-switcher { display: flex; gap: 5px; margin-bottom: 10px; }
        .lang-btn { text-decoration: none; padding: 3px 8px; border: 1px solid #ccc; border-radius: 3px; font-size: 12px; color: #333; background: #f9f9f9; }
        .lang-btn.active { background: #007bff; color: white; border-color: #007bff; }

        #fileListContainer { margin-top: 15px; }
        .file-item { background: #eef6ff; border: 1px solid #b8daff; padding: 15px; border-radius: 6px; margin-bottom: 10px; }
        .file-title { font-weight: bold; color: #004085; display: flex; justify-content: space-between; align-items: center; }
        .range-box { margin-top: 10px; background: white; padding: 10px; border-radius: 5px; border: 1px dashed #007bff; }
        .smart-mode-banner { background: #e2f0cb; border: 1px solid #b5e28c; color: #2d6a4f; padding: 10px 15px; border-radius: 6px; margin-bottom: 15px; font-weight: bold; font-size: 13px; display: block; }
    </style>
</head>
<body>
<div class="container">

    <div class="top-bar">
        <a href="<?php echo ($user_role === 'admin') ? 'admin_dashboard.php' : 'student_dashboard.php'; ?>" class="btn-back"><?php echo $t['back']; ?></a>
        <div class="lang-switcher">
            <a href="?lang=ta" class="lang-btn <?php if($lang == 'ta') echo 'active'; ?>">தமிழ்</a>
            <a href="?lang=en" class="lang-btn <?php if($lang == 'en') echo 'active'; ?>">English</a>
            <a href="?lang=si" class="lang-btn <?php if($lang == 'si') echo 'active'; ?>">සිංහල</a>
        </div>
    </div>
    <h2 style="margin-top:0; color:#333;"><?php echo $t['heading']; ?></h2>

    <form action="" method="POST" enctype="multipart/form-data" id="ocrForm">
        <label><b><?php echo $t['select_subject']; ?></b></label>
        <select name="subject" id="subjectSelect" required>
            <option value="Physics ( பௌதிகவியல் )" <?php if($selected_subject == 'Physics ( பௌதிகவியல் )') echo 'selected'; ?>>Physics ( பௌதிகவியல் )</option>
            <option value="Chemistry ( இரசாயனவியல் )" <?php if($selected_subject == 'Chemistry ( இரசாயனவியல் )') echo 'selected'; ?>>Chemistry ( இரசாயனவியல் )</option>
            <option value="Biology ( உயிரியல் )" <?php if($selected_subject == 'Biology ( உயிரியல் )') echo 'selected'; ?>>Biology ( உயிரியல் )</option>
            <option value="ICT ( தகவல் தொழில்நுட்பம் )" <?php if($selected_subject == 'ICT ( தகவல் தொழில்நுட்பம் )') echo 'selected'; ?>>ICT ( தகவல் தொழில்நுட்பம் )</option>
            <option value="Mathematics ( கணிதம் )" <?php if($selected_subject == 'Mathematics ( கணிதம் )') echo 'selected'; ?>>Mathematics ( கணிதம் )</option>
            <option value="History ( வரலாறு )" <?php if($selected_subject == 'History ( வரலாறு )') echo 'selected'; ?>>History ( வரலாறு )</option>
            <option value="Islam ( இஸ்லாம் )" <?php if($selected_subject == 'Islam ( இஸ்லாம் )') echo 'selected'; ?>>Islam ( இஸ்லாம் )</option>
            <option value="Tamil ( தமிழ் )" <?php if($selected_subject == 'Tamil ( தமிழ் )') echo 'selected'; ?>>Tamil ( தமிழ் )</option>
            <option value="General / பொது" <?php if($selected_subject == 'General / பொது' || empty($selected_subject)) echo 'selected'; ?>>General / பொது</option>
        </select>
        <label style="display:block; margin-top:15px;"><b><?php echo $t['paste_label']; ?></b></label>
        <textarea name="pasted_text" rows="3" placeholder="<?php echo $t['paste_placeholder']; ?>"><?php echo htmlspecialchars($pasted_text ?? ''); ?></textarea>
        <label style="display:block; margin-top:15px;"><b><?php echo $t['files_label']; ?></b></label>
        <input type="file" name="upload_files[]" id="fileInput" accept="image/png, image/jpeg, application/pdf, .pdf" multiple>

        <div id="fileListContainer"></div>
        <button type="submit" style="margin-top:20px;"><?php echo $t['process_btn']; ?></button>
    </form>
    <?php if (!empty($extracted_results)): ?>
        <hr style="margin: 30px 0; border: 1px solid #eee;">
        <h3 style="color:#28a745;"><?php echo $t['extracted_heading']; ?></h3>

        <form action="generate_ai_questions.php" method="POST" id="aiForm">
            <input type="hidden" name="subject" id="hiddenSubject" value="<?php echo htmlspecialchars($selected_subject); ?>">
            <input type="hidden" name="scanned_text" id="final_scanned_text">
            <input type="hidden" name="target_lang" value="<?php echo htmlspecialchars($target_lang_name); ?>">
            <?php foreach ($extracted_results as $i => $res): ?>
                <div style="margin-bottom: 20px;">
                    <label style="color:#0056b3;"><b><?php echo $t['file_prefix']; ?> <?php echo htmlspecialchars($res['filename']); ?></b></label>
                    <textarea class="editable-result-box part-text" rows="6" required><?php echo htmlspecialchars($res['text']); ?></textarea>
                </div>
            <?php endforeach; ?>

            <div style="background: #fdfdfd; border: 1px solid #ddd; padding: 15px; border-radius: 8px; margin-top: 25px;">
                <div class="smart-mode-banner">
                    <?php echo $t['ai_recommend_label']; ?> <?php echo $t['ai_recommend_desc']; ?>
                </div>
                <label style="display:block; margin-top:10px;"><b><?php echo $t['mode_label']; ?></b></label>
                <select name="tool_mode" required>
                    <option value="quiz" <?php if($auto_detected_mode === 'quiz') echo 'selected'; ?>><?php echo $t['mode_quiz']; ?></option>
                    <option value="flashcards" <?php if($auto_detected_mode === 'flashcards') echo 'selected'; ?>><?php echo $t['mode_flash']; ?></option>
                    <option value="summary" <?php if($auto_detected_mode === 'summary') echo 'selected'; ?>><?php echo $t['mode_summary']; ?></option>
                </select>
                <button type="button" onclick="prepareSubmit()" style="background: #28a745; margin-top:20px;"><?php echo $t['generate_btn']; ?></button>
            </div>
        </form>
    <?php endif; ?>
</div>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
    document.getElementById('fileInput').addEventListener('change', async function(e) {
        const fileListContainer = document.getElementById('fileListContainer');
        fileListContainer.innerHTML = '';

        for (let i = 0; i < this.files.length; i++) {
            let file = this.files[i];
            let fileDiv = document.createElement('div');
            fileDiv.className = 'file-item';

            let pageCount = 1;
            let isPDF = (file.type === 'application/pdf');
            fileDiv.innerHTML = `<div class="file-title">
                                    <span>📄 ${file.name}</span>
                                    <span style="color:#666; font-size:12px;" id="status_${i}">${isPDF ? '<?php echo $t['js_calc_pages']; ?>' : '<?php echo $t['js_one_page']; ?>'}</span>
                                 </div>`;
            fileListContainer.appendChild(fileDiv);
            if (isPDF) {
                try {
                    const arrayBuffer = await file.arrayBuffer();
                    const pdf = await pdfjsLib.getDocument({data: arrayBuffer}).promise;
                    pageCount = pdf.numPages;
                    document.getElementById(`status_${i}`).innerText = `${pageCount} <?php echo $t['js_pdf_pages']; ?>`;
                } catch (error) {
                    document.getElementById(`status_${i}`).innerText = `<?php echo $t['js_error']; ?>`;
                }
            }
            if (pageCount > 1) {
                let rangeBox = document.createElement('div');
                rangeBox.className = 'range-box';
                rangeBox.innerHTML = `
                    <label style="font-size:13px; font-weight:bold; color:#0056b3;"><?php echo $t['js_range_label']; ?></label>
                    <input type="text" name="page_ranges[${i}]" placeholder="<?php echo $t['js_range_placeholder']; ?>" style="margin-top:5px;">
                `;
                fileDiv.appendChild(rangeBox);
            } else {
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = `page_ranges[${i}]`;
                hiddenInput.value = '1';
                fileDiv.appendChild(hiddenInput);
            }
        }
    });
    function prepareSubmit() {
        let allTexts = [];
        document.querySelectorAll('.part-text').forEach(ta => {
            if (ta.value.trim() !== '') {
                allTexts.push(ta.value.trim());
            }
        });

        if (allTexts.length === 0) {
            alert('<?php echo $t['js_alert_empty']; ?>');
            return;
        }
        document.getElementById('final_scanned_text').value = allTexts.join('\n\n=====\n\n');
        document.getElementById('aiForm').submit();
    }
</script>
</body>
</html>
