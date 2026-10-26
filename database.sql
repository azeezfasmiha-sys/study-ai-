-- 1. பயனர்கள் (Users)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'student') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Admin பதிவேற்றும் கோப்புகள் (Files)
CREATE TABLE uploaded_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT,
    file_name VARCHAR(255),
    extracted_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES users(id)
);

-- 3. AI உருவாக்கிய கேள்விகள் (Questions with Subject)
CREATE TABLE generated_questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_id INT,
    subject VARCHAR(100) DEFAULT 'பொது (General)',
    question_text TEXT NOT NULL,
    option_a VARCHAR(255),
    option_b VARCHAR(255),
    option_c VARCHAR(255),
    option_d VARCHAR(255),
    correct_option ENUM('A', 'B', 'C', 'D'),
    FOREIGN KEY (file_id) REFERENCES uploaded_files(id)
);

-- 4. மாணவர்களின் மதிப்பெண்கள் (Scores)
CREATE TABLE student_scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    score INT NOT NULL,
    total_questions INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(id)
);