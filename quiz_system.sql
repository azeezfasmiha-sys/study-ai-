-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2026 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `generated_questions`
--

CREATE TABLE `generated_questions` (
  `id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT 'பொது (General)',
  `question_text` text NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_option` enum('A','B','C','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generated_questions`
--

INSERT INTO `generated_questions` (`id`, `file_id`, `subject`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(2, 1, 'Information Communication Technology (ICT)', 'நிச்சயமான இடத்தில் வைத்துப் பயன்படுத்தும் கணினி வகை அல்லாதது எது?', 'சேவையகக் கணினி', 'மேசைக் கணினி', 'எல்லாம் ஒன்றில் உள்ள கணினி', 'மடிக் கணினி', 'D'),
(3, 1, 'Information Communication Technology (ICT)', 'நுணுக்குப்பன்னி எவ்வகை சாதனத்திற்கு உதாரணமாகும்?', 'முறைவழி சாதனம்', 'உள்ளீட்டுச் சாதனம்', 'வெளியீட்டுச் சாதனம்', 'சேமிப்புச் சாதனம்', 'B'),
(4, 1, 'Information Communication Technology (ICT)', 'முறைவழியாக்கியின் கதி அளக்கும் அலகு எது?', 'GB', 'MB', 'Mb', 'GHz', 'D'),
(5, 1, 'Information Communication Technology (ICT)', 'முறைவழியாக்கி உற்பத்தி செய்யும் நிறுவனம் அல்லாதது பின்வருவனவற்றுள் எது?', 'அப்பிள்', 'இன்ரெல்', 'மைக்ரோசொப்ட்', 'AMD', 'C'),
(6, 1, 'Information Communication Technology (ICT)', 'பின்வருவனவற்றுள் எது ஒரு வெளியீட்டுச் சாதனத்திற்கு உதாரணமாகும்?', 'விசைப்பலகை', 'சுட்டி', 'திரையகம்', 'நுணுக்குப்பன்னி', 'C'),
(7, 1, 'Science (அறிவியல்)', 'அங்கிகள் தமது உணவுத் தேவையைப் பூர்த்தி செய்து கொள்ளும் செயன்முறை எவ்வாறு அழைக்கப்படுகிறது?', 'போசணை', 'ஒளித்தொகுப்பு', 'சுவாசம்', 'கழிவகற்றல்', 'A'),
(8, 1, 'Science (அறிவியல்)', 'தாவரங்கள் \'தற்போசணிகள்\' என அழைக்கப்படுவதற்கான காரணம் என்ன?', 'அவை பிற விலங்குகளை உணவாக உட்கொள்வதால்', 'அவை தமது உணவைத் தாமே உற்பத்தி செய்து கொள்வதால்', 'அவை மண்ணிலிருந்து மாத்திரம் உணவைப் பெறுவதால்', 'அவை உணவிற்காக விலங்குகளில் தங்கியிருப்பதால்', 'B'),
(9, 1, 'Science (அறிவியல்)', 'பச்சைத் தாவரங்கள் ஒளித்தொகுப்புச் செயன்முறைக்காகப் பயன்படுத்தும் காரணிகள் எவை?', 'ஆக்சிஜன், நீர், மண்', 'நைட்ரஜன், சூரிய ஒளி, காற்று', 'காபனீரொட்சைட்டு, நீர், சூரிய ஒளிச் சக்தி', 'காபனீரொட்சைட்டு, ஆக்சிஜன், குளுக்கோஸ்', 'C'),
(10, 1, 'Science (அறிவியல்)', 'விலங்குகள் \'பிறபோசணிகள்\' என அழைக்கப்படக் காரணம் என்ன?', 'அவை உணவிற்காக நேரடியாக அல்லது மறைமுகமாகத் தாவரங்களில் தங்கியிருப்பதால்', 'அவை தமது உணவைத் தாமே தயாரித்துக் கொள்வதால்', 'அவை சூரிய ஒளியைப் பயன்படுத்தி உணவு தயாரிப்பதால்', 'அவை காபனீரொட்சைட்டு வாயுவை நேரடியாக உட்கொள்வதால்', 'A'),
(11, 1, 'Science (அறிவியல்)', 'பின்வருவனவற்றுள் தாவரங்களின் உணவில் மறைமுகமாகத் தங்கியிருக்கும் விலங்கு எது?', 'மான்', 'பசு', 'ஆடு', 'சிங்கம்', 'D'),
(12, 1, 'Information Communication Technology (ICT)', 'What phrase opens the provided excerpt?', 'It was the best of times', 'It was the worst of times', 'It was the age of wisdom', 'It was the age of foolishness', 'A'),
(13, 1, 'Information Communication Technology (ICT)', 'According to the text, what is directly contrasted with \'the best of times\'?', 'The age of wisdom', 'The worst of times', 'The age of foolishness', 'The best of days', 'B'),
(14, 1, 'Information Communication Technology (ICT)', 'What concept is directly juxtaposed with \'the age of wisdom\'?', 'The age of foolishness', 'The best of times', 'The worst of times', 'The age of enlightenment', 'A'),
(15, 1, 'Information Communication Technology (ICT)', 'Which literary device is most prominent in the structure of the excerpt?', 'Antithesis and parallelism', 'Onomatopoeia', 'Rhyming couplets', 'Personification of inanimate objects', 'A'),
(16, 1, 'Information Communication Technology (ICT)', 'Which word in the text is paired with \'wisdom\' to describe an age?', 'Knowledge', 'Foolishness', 'Ignorance', 'Intelligence', 'B'),
(17, 1, 'Information Communication Technology (ICT)', 'Which two adjectives are used in the text to describe the \'times\'?', 'Best and worst', 'Wisdom and foolishness', 'Bright and dark', 'Great and terrible', 'A'),
(18, 1, 'Information Communication Technology (ICT)', 'Which two nouns are used in the text to describe an \'age\'?', 'Wisdom and foolishness', 'Times and places', 'Youth and old age', 'Hope and despair', 'A'),
(19, 1, 'Information Communication Technology (ICT)', 'What phrase structure is repeatedly used to introduce each statement?', 'It was the...', 'There was a...', 'They were the...', 'This is the...', 'A'),
(20, 1, 'Information Communication Technology (ICT)', 'How many distinct contrasting pairs of ideas are presented in this excerpt?', 'One', 'Two', 'Three', 'Four', 'B'),
(21, 1, 'Information Communication Technology (ICT)', 'What overall impression or theme is created by the passage\'s structure?', 'Duality and contradiction', 'Unrelenting sadness', 'Pure happiness and joy', 'Scientific accuracy', 'A'),
(22, 1, 'General / பொது', 'தரப்பட்ட வினாத்தாளின்படி, பரீட்சைக்கான மொத்த நேரம் (மேலதிக வாசிப்பு நேரத்துடன் சேர்த்து) எவ்வளவு?', '3 மணித்தியாலங்கள்', '3 மணித்தியாலங்கள் 10 நிமிடங்கள்', '2 மணித்தியாலங்கள் 50 நிமிடங்கள்', '4 மணித்தியாலங்கள்', 'B'),
(23, 1, 'General / பொது', 'பகுதி B இல் உள்ள வினாக்களில் எத்தனை வினாக்களுக்கு மாணவர்கள் விடை எழுத வேண்டும்?', 'எல்லா வினாக்களுக்கும்', '7 வினாக்களுக்கு', '5 வினாக்களுக்கு மாத்திரம்', '10 வினாக்களுக்கு', 'C'),
(24, 1, 'General / பொது', 'இந்த வினாத்தாள் எந்த நிறுவனத்தால் நடத்தப்படும் பரீட்சைக்குரியது?', 'தேசிய தொண்டைமானாறு வெளிக்கள நிலையம்', 'தேசிய கல்வி நிறுவனம்', 'பரீட்சைத் திணைக்களம்', 'யாழ்ப்பாணம் கல்வி வலயம்', 'A'),
(25, 1, 'General / பொது', 'இந்த வினாத்தாள் எந்தப் பாடத்திற்குரியது?', 'பௌதிகவியல் (Physics)', 'இணைந்த கணிதம் (Combined Mathematics)', 'இரசாயனவியல் (Chemistry)', 'தகவல் தொழில்நுட்பம் (ICT)', 'B'),
(26, 1, 'General / பொது', 'பரீட்சை மண்டபத்திலிருந்து வெளியே எடுத்துச் செல்ல அனுமதிக்கப்படும் பகுதி எது?', 'பகுதி A மாத்திரம்', 'பகுதி B மாத்திரம்', 'பகுதி A மற்றும் பகுதி B ஆகிய இரண்டும்', 'எந்தப் பகுதியையும் எடுத்துச் செல்ல முடியாது', 'B'),
(27, 1, 'General / பொது', 'கதையில் வரும் பெருஞ்செல்வனின் குணம் எத்தகையது?', 'இரக்க குணம் மற்றும் கொடைத்தன்மை', 'பேராசை மற்றும் கொடுமைக்குணம்', 'நேர்மை மற்றும் எளிமை', 'அன்பு மற்றும் அமைதி', 'B'),
(28, 1, 'General / பொது', 'ஏழை மக்களின் நிலங்களை பெருஞ்செல்வன் எவ்வாறு பறித்துக் கொண்டான்?', 'அரசாங்க உதவியுடன் பறித்தான்', 'நியாயமான விலை கொடுத்து வாங்கினான்', 'அதிக வட்டிக்குப் பணம் கொடுத்து, அதைத் திருப்பிக் கொடுக்க இயலாதவர்களின் நிலங்களைப் பிடுங்கிக் கொண்டான்', 'மக்களாகவே அவனுக்குப் பரிசாகக் கொடுத்தனர்', 'C'),
(29, 1, 'General / பொது', 'தன் நிலங்களில் வேலை செய்த ஏழை மக்களை பெருஞ்செல்வன் எவ்வாறு நடத்தினான்?', 'அடிமைகள் போல வேலை வாங்கினான்', 'சொந்தக் குடும்பத்தினர் போல நடத்தினான்', 'அதிக ஊதியம் கொடுத்து மகிழ்ச்சியாக வைத்திருந்தான்', 'பங்குதாரர்களாக நடத்தினான்', 'A'),
(30, 1, 'General / பொது', 'பெருஞ்செல்வனின் கொடுமைகளைத் தாங்க முடியாத ஊர் மக்கள் என்ன கூறிப் புலம்பினார்கள்?', 'அவனுக்கு இன்னும் அதிக செல்வம் சேர வேண்டும் என்று', 'அவன் நல்ல மனதுடன் வாழ வேண்டும் என்று', 'இவனுக்குச் சாவு வராதா என்று', 'அவன் வேறு ஊருக்குச் செல்ல வேண்டும் என்று', 'B'),
(31, 1, 'General / பொது', 'கதையின்படி, பெருஞ்செல்வன் எத்தகைய குணம் கொண்டவனாக இருந்தான்?', 'இரக்க குணம்', 'பேராசை', 'கொடைத்தன்மை', 'நேர்மை', 'B'),
(32, 1, 'General / பொது', 'ஏழை மக்கள் பணத்தைத் திருப்பித் தர இயலாதபோது பெருஞ்செல்வன் என்ன செய்தான்?', 'அவர்களின் நிலங்களைப் பிடுங்கிக் கொண்டான்', 'பணத்தைத் தள்ளுபடி செய்தான்', 'மேலும் கடன் கொடுத்தான்', 'அவர்களை ஊரை விட்டுத் துரத்தினான்', 'A'),
(33, 1, 'General / பொது', 'பெருஞ்செல்வன் ஏழை மக்களைத் தன் நிலங்களில் எவ்வாறு வேலை வாங்கினான்?', 'நண்பர்கள் போல', 'உறவினர்கள் போல', 'அடிமை போல', 'அதிகாரிகள் போல', 'C'),
(34, 1, 'General / பொது', 'ஊர் மக்கள் எல்லோரும் பெருஞ்செல்வனைப் பார்த்து என்ன சொல்லிப் புலம்பினார்கள்?', 'இவன் இன்னும் பல்லாண்டு வாழ வேண்டும் என்று', 'இவனுக்குச் சாவு வராதா என்று', 'இவன் நல்லவன் என்று', 'இவனுக்குப் பெரிய பதவி கிடைக்க வேண்டும் என்று', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student_scores`
--

CREATE TABLE `student_scores` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_scores`
--

INSERT INTO `student_scores` (`id`, `student_id`, `score`, `total_questions`, `created_at`) VALUES
(1, 2, 3, 5, '2026-08-22 09:50:06'),
(2, 2, 0, 5, '2026-08-22 09:52:39'),
(3, 2, 2, 5, '2026-08-22 09:53:12'),
(4, 2, 2, 5, '2026-08-22 10:00:39'),
(5, 6, 1, 5, '2026-08-24 14:52:38'),
(6, 8, 1, 5, '2026-08-24 15:55:07'),
(7, 6, 1, 10, '2026-08-29 07:51:20'),
(8, 6, 1, 10, '2026-08-29 07:52:34'),
(9, 6, 1, 10, '2026-08-29 07:52:50'),
(10, 6, 0, 5, '2026-08-29 07:59:05'),
(11, 6, 2, 5, '2026-08-29 07:59:15'),
(12, 11, 3, 5, '2026-09-04 17:50:37'),
(13, 12, 1, 5, '2026-09-19 11:47:57'),
(14, 15, 1, 5, '2026-09-19 17:23:07'),
(15, 16, 0, 5, '2026-09-19 17:42:11'),
(16, 17, 1, 5, '2026-09-19 17:50:36'),
(17, 17, 1, 5, '2026-09-19 17:54:46'),
(18, 17, 1, 5, '2026-09-19 18:04:03'),
(19, 17, 1, 5, '2026-09-20 03:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `extracted_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `admin_id`, `file_name`, `extracted_text`, `created_at`) VALUES
(1, 1, 'System_Generated_File', 'AI Created Text', '2026-08-22 09:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','student') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'najeeb', 'najeeb@gmail.com', '$2y$10$CBpuW6TQgm798IlJU4P4wuwLHicvYVUN4LFdFlAl8IauXGp2026oK', 'admin', '2026-08-22 08:38:43'),
(2, 'thabish', 'thabish@gmail.com', '$2y$10$RTXrhyie/CnP08yVv/3F7ueWHJA2zA7SZVpm2hMUKDMSisgPWgRhe', 'student', '2026-08-22 09:49:04'),
(3, 'Thabish', 'azeezfasmiha@gmail.com', '$2y$10$jFausFm1ZzIFknr3zR4LOuQMwmdzfNOyDq43l3xbgu9YEqAcaxFQm', 'student', '2026-08-22 13:29:06'),
(4, 'Thabish', 'thabish12@gmail.com', '$2y$10$yiDWRGFTy7iw.Lv6WkDLTe3d2/s078gjTjXR9pUVtzLk1yndUSl3y', 'student', '2026-08-22 13:29:54'),
(5, 'Thabish', 't12@gmail.com', '$2y$10$HuZsnjNmETUpipat2/HgseUY40TNr9LYXqHlG.hwHXAzyUY9MkiPC', 'admin', '2026-08-22 13:30:50'),
(6, 'Thabish', 'v1@gmail.com', '$2y$10$B/bEwNt8Vk83NBhGLG3FyOx.UQiNoxRZq/FVMktMcEXJHmjBXNNy6', 'student', '2026-08-24 14:51:43'),
(7, 'Thabish', 'w1@gmail.com', '$2y$10$bsZPoY7Pj4vOuZIhED4a/OBQM.5GDqDIVwA/aQvLNPzB1GbisCKxC', 'student', '2026-08-24 15:25:55'),
(8, 'Thabish', 'e1@gmail.com', '$2y$10$.efA2xuofjk0aWRBZU/dOuT.i.EmxEbwWiQ3yswk7sAOnq1Z5AIKW', 'student', '2026-08-24 15:54:41'),
(9, 'ktf', 'd1@gmail.com', '$2y$10$VfWm329x3TPHdVG3fpEV6.Y3pOThyizfVXtIo6RnVkausnRvOB3VO', 'student', '2026-08-29 07:02:02'),
(10, 'tint', 't@gmail.com', '$2y$10$/gMvVqLfehFrzjR.D4x3vO/CaJhQYMkaZWXnfFaI12LGARLL/mY2a', 'student', '2026-09-02 18:27:54'),
(11, 'hamtha', 'hamthafathima52@gmail.com', '$2y$10$G48TF3TWCPRTGMz4WZExl.3OUtv6FxlSiOFrkPHUoDiYFIEq0Yz2y', 'student', '2026-09-04 17:41:24'),
(12, 'Thabish', 'azeezmohammathtabish@gmail.com', '$2y$10$CNbaPAhtmLwk4hzVxE6HDeGsEoOGzsyt81dsYF0ewNlSBbKqHYEFe', 'student', '2026-09-19 11:46:50'),
(13, '1nit', '12@gamil.com', '$2y$10$UUVM8Xkr7DkWycqi3fChju7s9jiRE89r2sdUXG/beEWLi1YrC5Zfa', 'student', '2026-09-19 11:58:13'),
(14, 'thabish', 'thabish5@gmail.com', '$2y$10$Vq/sLIeKPY/0.ah/YfNLGOiniO.7GKCCO/5faYAjHQa4F/hWLWoJK', 'student', '2026-09-19 12:21:52'),
(15, 'Thabish', 'thab@gmail.com', '$2y$10$sDLfCnh6AO6NjwKUTJq4zOsoqOeic.LD60vGocRbEz73BP1v5eHRK', 'student', '2026-09-19 17:21:37'),
(16, 'thabish', 'tha@gmail.com', '$2y$10$KVean.DK9nvqv4aqPPVPTOut8jClMGNZKHl0ZpD5F0XsP5MewCkyq', 'student', '2026-09-19 17:41:18'),
(17, 'thabish', 'azeezmohammaththabish@gmail.com', '$2y$10$nf.r8T7ynDZaNrPmiBnwf.Hzxq6tcPyC6R.CKnqqvButdo71ya1uC', 'student', '2026-09-19 17:49:54'),
(18, 'thabish', 'A@gmail.com', '$2y$10$Ase965qMN2A1IME/I8H9GOU/ptI2io91lJXsy8Ch5Z8qzEtRMR7RC', 'admin', '2026-09-20 03:36:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generated_questions`
--
ALTER TABLE `generated_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generated_questions`
--
ALTER TABLE `generated_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_scores`
--
ALTER TABLE `student_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `generated_questions`
--
ALTER TABLE `generated_questions`
  ADD CONSTRAINT `generated_questions_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `uploaded_files` (`id`);

--
-- Constraints for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD CONSTRAINT `student_scores_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD CONSTRAINT `uploaded_files_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
