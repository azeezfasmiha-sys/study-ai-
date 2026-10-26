# Student-Centric AI Quiz & Learning System

An intelligent, multi-language web application designed for students and educators. The platform enables automated examination generation, Optical Character Recognition (OCR) for handwritten/printed notes, AI-powered question synthesis, interactive doubt resolution via Gemini AI, and student quiz performance management.

---

## 🌟 Key Features

- **Multi-Language Interface**: Complete support for Tamil, English, and Sinhala with real-time language switching.
- **Role-Based Access Control**:
  - **Student Portal**: Take quizzes, view results, analyze mistakes, upload study material, and practice with AI tutor.
  - **Admin Portal**: Manage question banks, monitor student analytics, inspect leaderboard rankings, and review exam logs.
- **OCR Study Notes Extraction**: Upload notes (JPG, PNG, PDF) to extract text using Tesseract OCR and Poppler.
- **AI-Powered Question Generation**: Leverage Google Gemini AI to analyze study materials and auto-generate structured MCQs, flashcards, or step-by-step solutions.
- **Interactive AI Tutor**: Ask clarifying questions and resolve doubts on specific test problems in real time.
- **Comprehensive Quiz System**: Timed quizzes, randomized questions, instant evaluation, and automated grade calculation.

---

## 📁 Project Structure

```
student/
├── admin_dashboard.php        # Administrator control panel
├── admin_results.php          # Student exam results & analytics
├── config.example.php         # Template for environment configuration & API keys
├── database.sql               # Database schema initialization script
├── db.php                     # MySQL database connection handler
├── generate_ai_questions.php  # Gemini AI question synthesis & AI doubt tutor
├── index.php                  # Landing page & navigation portal
├── language_switcher.php      # Multilingual session handler
├── login.php                  # Authentication for students and admins
├── logout.php                 # Session termination
├── ocr_extract.php            # Tesseract OCR processor & study material ingestion
├── quiz_system.sql            # Main database schema and sample tables
├── register.php               # Student account registration
├── save_questions.php         # Persist generated questions into database
├── student_dashboard.php      # Student dashboard & quick actions
├── submit_quiz.php            # Quiz evaluation & score processing
├── take_quiz.php              # Dynamic quiz examination interface
├── uploads/                   # Upload directory for scanned notes and documents
└── README.md                  # Project documentation
```

---

## 🚀 Setup & Installation (XAMPP / Apache + MySQL)

### 1. Requirements
- **PHP** 7.4 or higher with `curl` and `mysqli` extensions enabled.
- **MySQL / MariaDB** database server.
- **XAMPP / WAMP / LAMP** stack.
- *(Optional for OCR)*: [Tesseract-OCR](https://github.com/UB-Mannheim/tesseract/wiki) and [Poppler for Windows](https://github.com/oschwartz10612/poppler-windows).

### 2. Database Configuration
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Create a database named `quiz_system`.
3. Import `quiz_system.sql` (and `database.sql` if required).
4. Verify your database connection credentials in `db.php`:
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "quiz_system";
   ```

### 3. API Key Setup
1. Copy `config.example.php` to `config.php`:
   ```bash
   cp config.example.php config.php
   ```
2. Insert your Google Gemini API key:
   ```php
   define('GEMINI_API_KEY', 'YOUR_GEMINI_API_KEY_HERE');
   ```

### 4. Running the Application
1. Place the `student` folder inside your XAMPP web root (`C:/xampp/htdocs/student`).
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Access the application in your browser:
   ```
   http://localhost/student/
   ```

---

## 🔒 Security Best Practices
- Never commit `config.php` or sensitive API keys to public repositories.
- Use `.gitignore` to prevent committing session files, logs, and sensitive configurations.

---

## 👤 Author
- **GitHub**: [@azeezfasmiha-sys](https://github.com/azeezfasmiha-sys)
- **Email**: azeezfasmiha@gmail.com
