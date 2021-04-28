-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `courseevaluationsystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `course_comments`
--

CREATE TABLE `course_comments` (
  `class_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `comment_number` int(30) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rating_method` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `sweet` float NOT NULL,
  `cool` float NOT NULL,
  `difficulty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `course_comments`
--

INSERT INTO `course_comments` (`class_number`, `comment_number`, `username`, `title`, `rating_method`, `comment`, `sweet`, `cool`, `difficulty`) VALUES
('CS  321202', 5, '', '爽課', '就是很爽', '爽到不行', 3.3, 2, 4.1),
('CS  591300', 6, '', '爽課一枚', '有去上機考就有分數', '都沒有作業', 5, 5, 0),
('CS  524500', 7, '', '有點難', '作業＋期中期末考', '只要有考古題就ok了', 3.84, 3, 3.66),
('CS  233602', 8, '', '好課', '沒有考試', '就是爽', 4.97, 4.5, 0.5),
('CS  546400', 9, '', '很硬', '每個禮拜考試', '都烤焦了', 0, 0, 5),
('CS  233402', 10, '', 'test', 'test', 'test', 4.34, 3.75, 4.44),
('CS  312000', 11, '', '很硬', '硬到不行', '跟硬體一樣硬', 0, 0, 5),
('CS  330500', 12, '', '123', '123', '234', 4, 4.03, 3.97),
('CS  333402', 13, '', '工程數學', '很難', '難爆了', 0.69, 0.53, 4.44),
('CS  135601', 14, '', '新模板', '新模板', '新模板', 4.4, 3, 4.2),
('CS  135702', 15, '', '測試', '測試', '測試', 3.6, 2, 4.4),
('CS  135702', 16, '', '心得', '心得', '心得', 4, 3.3, 4.7),
('CS  321202', 17, '', '計算機網路', '計算機網路', '計算機網路', 5, 5, 0),
('CS  412500', 18, '', 'design', 'design', 'design', 4.3, 3.8, 4.1),
('CS  542200', 19, '', '平行程式', '平行程式', '平行程式', 3.2, 2.7, 2.7),
('CS  542200', 20, '', 'wow', 'wow', 'wow', 4, 3.7, 3.1),
('CS  140101', 21, '123', '哎呦薇啊', '拉拉拉', '嚕嚕嚕', 2.1, 2.3, 3),
('CS  233602', 22, '123', '相同課程', '相同課程', '相同課程', 3.3, 2.8, 4.1),
('CS  321202', 23, 'goodstd', '計算機網路概論修後心得', '課程紮實度、理解難度、修課時間彈性', '非常清晰明瞭的講解，即使困難的觀念也能透過投影片與教授的講解快速釐清，且授課影片皆有上傳至開放式線上課程網，方便同學溫習。', 3.7, 3, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `course_information`
--

CREATE TABLE `course_information` (
  `semester` int(5) NOT NULL,
  `class_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `teacher` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `avg_difficulty` float NOT NULL,
  `avg_sweet` float NOT NULL,
  `avg_cool` float NOT NULL,
  `avg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `course_information`
--

INSERT INTO `course_information` (`semester`, `class_number`, `education`, `subject`, `teacher`, `avg_difficulty`, `avg_sweet`, `avg_cool`, `avg`) VALUES
(10610, 'CS  135501', 'B', '計算機程式設計一Introduction to Programming (I)', '陳煥宗', 0, 0, 0, 0),
(10610, 'CS  135502', 'B', '計算機程式設計一Introduction to Programming (I)', '楊舜仁', 0, 0, 0, 0),
(10610, 'CS  135600', 'B', '計算機程式設計二Introduction to Programming (II)', '李哲榮', 0, 0, 0, 0),
(10610, 'CS  135701', 'B', '資訊系統及應用導論Intro. to Computer Systems & Applications', '黃子瑋', 0, 0, 0, 0),
(10610, 'CS  135702', 'B', '資訊系統及應用導論Intro. to Computer Systems & Applications', '張君天', 0, 0, 0, 0),
(10610, 'CS  210401', 'B', '硬體設計與實驗Hardware Design and Lab.', '李濬屹', 0, 0, 0, 0),
(10610, 'CS  210402', 'B', '硬體設計與實驗Hardware Design and Lab.', '黃稚存', 0, 0, 0, 0),
(10610, 'CS  233401', 'B', '線性代數Linear Algebra', '陳朝欽', 0, 0, 0, 0),
(10610, 'CS  233402', 'B', '線性代數Linear Algebra', '蔡明哲', 0, 0, 0, 0),
(10610, 'CS  233601', 'B', '離散數學Discrete Mathematics', '韓永楷', 0, 0, 0, 0),
(10610, 'CS  233602', 'B', '離散數學Discrete Mathematics', '麥偉基', 0, 0, 0, 0),
(10610, 'CS  235101', 'B', '資料結構Data Structures', '沈之涯', 0, 0, 0, 0),
(10610, 'CS  235102', 'B', '資料結構Data Structures', '高榮駿', 0, 0, 0, 0),
(10610, 'CS  312000', 'B', '積體電路設計概論Introduction of Integrated Circuit Design', '張世杰', 0, 0, 0, 0),
(10610, 'CS  314000', 'B', '類比電路設計入門Introduction to Analog Circuit Design', '李家同', 0, 0, 0, 0),
(10610, 'CS  321201', 'B', '計算機網路概論Introduction  to Computer Networks', '林華君', 0, 0, 0, 0),
(10610, 'CS  321202', 'B', '計算機網路概論Introduction  to Computer Networks', '黃能富', 0, 0, 0, 0),
(10610, 'CS  330500', 'B', '密碼與網路安全概論Cryptography and Network Security', '孫宏民', 0, 0, 0, 0),
(10610, 'CS  333000', 'B', '科學計算Scientific Computing', '徐正炘', 0, 0, 0, 0),
(10610, 'CS  333401', 'B', '工程數學Engineering Mathematics', '張隆紋', 0, 0, 0, 0),
(10610, 'CS  333402', 'B', '工程數學Engineering Mathematics', '蔡仁松', 0, 0, 0, 0),
(10610, 'CS  337100', 'B', '正規語言Formal Language', '何宗易', 0, 0, 0, 0),
(10610, 'CS  342301', 'B', '作業系統Operating Systems', '周志遠', 0, 0, 0, 0),
(10610, 'CS  342302', 'B', '作業系統Operating Systems', '周百祥', 0, 0, 0, 0),
(10610, 'CS  343300', 'B', '競技程式設計Competitive Programming Training', '李哲榮', 0, 0, 0, 0),
(10610, 'CS  390100', 'B', '系統整合實作一System Integration Implementation  I', '指導教授', 0, 0, 0, 0),
(10610, 'CS  390200', 'B', '系統整合實作二System Integration Implementation  II', '指導教授', 0, 0, 0, 0),
(10610, 'CS  410000', 'B', '計算機結構Computer Architecture', '黃婷婷', 0, 0, 0, 0),
(10610, 'CS  410100', 'B', '嵌入式系統概論Introduction to Embedded Systems', '金仲達', 0, 0, 0, 0),
(10610, 'CS  412500', 'B', '數位系統設計Digital System Design', '黃稚存', 0, 0, 0, 0),
(10610, 'CS  423500', 'B', '物聯網概論Introduction to Internet of Things', '黃能富', 0, 0, 0, 0),
(10610, 'CS  431101', 'B', '計算方法設計Design and Analysis of Algorithms', '王炳豐', 0, 0, 0, 0),
(10610, 'CS  431102', 'B', '計算方法設計Design and Analysis of Algorithms', '許健平', 0, 0, 0, 0),
(10610, 'CS  452000', 'B', '影像處理簡介Introduction to Image Processing', '許秋婷', 0, 0, 0, 0),
(10610, 'CS  460100', 'B', '人工智慧概論Introduction to Intelligent Computing', '蘇豐文', 0, 0, 0, 0),
(10610, 'CS  460200', 'B', '機器學習概論Introduction to Machine Learning', '李端興', 0, 0, 0, 0),
(10610, 'CS  513100', 'M', '新興科技設計自動化Design Automation of Emerging Technologies', '何宗易', 0, 0, 0, 0),
(10610, 'CS  513200', 'M', '深度學習硬體加速器設計Deep Learning Hardware Accelerator Design', '林永隆', 0, 0, 0, 0),
(10610, 'CS  515100', 'M', '晶片應用系統簡介Introduction to System-on-Chip and its Applications', '邱瀞德', 0, 0, 0, 0),
(10610, 'CS  517000', 'M', '數位電視系統Digital Television', '胡龍融', 0, 0, 0, 0),
(10610, 'CS  518300', 'M', 'SystemC 及其行為層級設計與建模SystemC,Behavior Coding and Modeling', '蘇培陞', 0, 0, 0, 0),
(10610, 'CS  524000', 'M', '無線網路Wireless Network', '許健平', 0, 0, 0, 0),
(10610, 'CS  524500', 'M', '寬頻行動通訊Broadband Mobile Communications', '高榮駿', 0, 0, 0, 0),
(10610, 'CS  531300', 'M', '計算生物學Computing Biology', '盧錦隆', 0, 0, 0, 0),
(10610, 'CS  531600', 'M', '近似演算法Approximation Algorithms', '蔡明哲', 0, 0, 0, 0),
(10610, 'CS  531900', 'M', '高等離散結構Advanced Discrete Structure', '韓永楷', 0, 0, 0, 0),
(10610, 'CS  533200', 'M', '離散事件模擬Discrete-Event Simulation', '林華君', 0, 0, 0, 0),
(10610, 'CS  537100', 'M', '計算理論Theory of Computation', '石維寬', 0, 0, 0, 0),
(10610, 'CS  538100', 'M', '應用數理邏輯Applied Mathematical Logic', '王俊堯', 0, 0, 0, 0),
(10610, 'CS  540500', 'M', '內嵌式編譯器Compilers for Embedded Systems', '李政崑', 0, 0, 0, 0),
(10610, 'CS  542200', 'M', '平行程式Parallel Programming', '周志遠', 0, 0, 0, 0),
(10610, 'CS  542500', 'M', '即時系統設計Real-Time System Designs', '石維寬', 0, 0, 0, 0),
(10610, 'CS  546000', 'M', '軟體專案管理Software Project Management', '黃慶育', 0, 0, 0, 0),
(10610, 'CS  546600', 'M', '軟體分析與設計方法Software Analysis and Design Methods', '劉龍龍', 0, 0, 0, 0),
(10610, 'CS  550300', 'M', '遊戲程式設計Introduction to Game Programming', '朱宏國', 0, 0, 0, 0),
(10610, 'CS  565100', 'M', '機器學習理論Machine Learning', '周志遠,阮大成', 0, 0, 0, 0),
(10610, 'CS  565600', 'M', '深度學習Deep Learning', '吳尚鴻', 0, 0, 0, 0),
(10610, 'CS  573300', 'M', '巨量資料技術與應用Big Data Technology and Applications', '鄭博仁,李哲榮', 0, 0, 0, 0),
(10610, 'CS  580100', 'M', '研究方法一Research Methodology I', '指導教授', 0, 0, 0, 0),
(10610, 'CS  591000', 'M', '書報討論Seminar', '徐正炘,何宗易', 0, 0, 0, 0),
(10610, 'CS  591300', 'M', '學術英文寫作Academic Research Writing', '陳良弼', 0, 0, 0, 0),
(10610, 'CS  631200', 'M', '平行計算方法設計Parallel Algorithm Design', '王炳豐', 0, 0, 0, 0),
(10610, 'CS  655000', 'M', '計算機視覺理論Computer Vision', '賴尚宏', 0, 0, 0, 0),
(10610, 'CS  690000', 'M', '論文Thesis', '指導教授', 0, 0, 0, 0),
(10610, 'CS  742900', 'P', '嵌入式系統設計專題Special Topic on Embedded System Design', '石維寬', 0, 0, 0, 0),
(10610, 'CS  890000', 'P', '論文研究Thesis', '指導教授', 0, 0, 0, 0),
(10620, 'CS  135500', 'B', '計算機程式設計一Introduction to Programming (I)', '李哲榮', 0, 0, 0, 0),
(10620, 'CS  135601', 'B', '計算機程式設計二Introduction to Programming (II)', '陳煥宗', 0, 0, 0, 0),
(10620, 'CS  135602', 'B', '計算機程式設計二Introduction to Programming (II)', '楊舜仁', 0, 0, 0, 0),
(10620, 'CS  140101', 'B', '資訊系統應用Computer Systems & Applications', '陳鈺書', 0, 0, 0, 0),
(10620, 'CS  140102', 'B', '資訊系統應用Computer Systems & Applications', '黃子瑋', 0, 0, 0, 0),
(10620, 'CS  150100', 'B', '英語聽講English Listening & Speaking', '郭詩芝', 0, 0, 0, 0),
(10620, 'CS  210001', 'B', '電路與電子學一Circuits and Electronics (I)', '邱瀞德', 0, 0, 0, 0),
(10620, 'CS  210002', 'B', '電路與電子學一Circuits and Electronics (I)', '王俊堯', 0, 0, 0, 0),
(10620, 'CS  210201', 'B', '數位邏輯設計Digital Logic Design', '林永隆', 0, 0, 0, 0),
(10620, 'CS  210202', 'B', '數位邏輯設計Digital Logic Design', '黃稚存', 0, 0, 0, 0),
(10620, 'CS  233400', 'B', '線性代數Linear Algebra', '洪文良', 0, 0, 0, 0),
(10620, 'CS  235100', 'B', '資料結構Data Structures', '陳宜欣', 0, 0, 0, 0),
(10620, 'CS  241001', 'B', '軟體設計與實驗Software Studio', '張君天', 0, 0, 0, 0),
(10620, 'CS  241002', 'B', '軟體設計與實驗Software Studio', '朱宏國', 0, 0, 0, 0),
(10620, 'CS  333201', 'B', '機率Probability', '許秋婷', 0, 0, 0, 0),
(10620, 'CS  333202', 'B', '機率Probability', '李端興', 0, 0, 0, 0),
(10620, 'CS  340400', 'B', '編譯器設計Compiler Design', '李政崑', 0, 0, 0, 0),
(10620, 'CS  342300', 'B', '作業系統Operating Systems', '王家祥', 0, 0, 0, 0),
(10620, 'CS  343100', 'B', 'Web程式設計、技術與應用Web Programming, Technologies, and Applications', '吳尚鴻', 0, 0, 0, 0),
(10620, 'CS  357000', 'B', '多媒體技術概論Introduction to Multimedia', '賴尚宏', 0, 0, 0, 0),
(10620, 'CS  390100', 'B', '系統整合實作一System Integration Implementation  I', '指導教授', 0, 0, 0, 0),
(10620, 'CS  390200', 'B', '系統整合實作二System Integration Implementation  II', '指導教授', 0, 0, 0, 0),
(10620, 'CS  410001', 'B', '計算機結構Computer Architecture', '金仲達', 0, 0, 0, 0),
(10620, 'CS  410002', 'B', '計算機結構Computer Architecture', '張世杰', 0, 0, 0, 0),
(10620, 'CS  411100', 'B', '平行計算概論Introduction to Parallel Computing', '李濬屹', 0, 0, 0, 0),
(10620, 'CS  431100', 'B', '計算方法設計Design and Analysis of Algorithms', '盧錦隆', 0, 0, 0, 0),
(10620, 'CS  446101', 'B', '軟體工程Software Engineering', '黃慶育', 0, 0, 0, 0),
(10620, 'CS  446102', 'B', '軟體工程Software Engineering', '劉龍龍', 0, 0, 0, 0),
(10620, 'CS  450500', 'B', '繪圖程式設計與應用Introduction to Graphics Programming and Applications', '朱宏國', 0, 0, 0, 0),
(10620, 'CS  471000', 'B', '資料庫系統概論Introduction to Database Systems', '吳尚鴻', 0, 0, 0, 0),
(10620, 'CS  510000', 'M', '高等計算機結構Advanced Computer Architecture', '金仲達', 0, 0, 0, 0),
(10620, 'CS  510700', 'M', '嵌入式軟體開發工具Development Software Tools for Embedded Systems', '石維寬', 0, 0, 0, 0),
(10620, 'CS  512200', 'M', '超大型積體電路量產可行性設計VLSI Design for Manufacturability', '麥偉基', 0, 0, 0, 0),
(10620, 'CS  513200', 'M', '深度學習硬體加速器設計Deep Learning Hardware Accelerator Design', '林永隆,許有進', 0, 0, 0, 0),
(10620, 'CS  518000', 'M', '電子系統層級設計Electronic System  Level Design', '蘇培陞', 0, 0, 0, 0),
(10620, 'CS  526200', 'M', '多媒體網路與系統Multimedia Networking and Systems', '徐正炘', 0, 0, 0, 0),
(10620, 'CS  529100', 'M', '網路之隨機程序Stochastic Processes for Networking', '高榮駿', 0, 0, 0, 0),
(10620, 'CS  530600', 'M', '社群網路Social Networks', '李端興', 0, 0, 0, 0),
(10620, 'CS  531100', 'M', '高等資料結構Advanced Data Structure', '韓永楷', 0, 0, 0, 0),
(10620, 'CS  531200', 'M', '圖形理論Graph Theory', '蔡明哲', 0, 0, 0, 0),
(10620, 'CS  531400', 'M', '隨機演算法Randomized Algorithms', '韓永楷', 0, 0, 0, 0),
(10620, 'CS  534100', 'M', '高等賽局理論與應用Advanced game Theory and its applications', '張隆紋', 0, 0, 0, 0),
(10620, 'CS  540400', 'M', '高等編譯器Advanced Compiler', '李政崑', 0, 0, 0, 0),
(10620, 'CS  542000', 'M', '雲端程式設計Cloud Programming', '周志遠', 0, 0, 0, 0),
(10620, 'CS  542100', 'M', '雲端計算Cloud Computing', '李哲榮', 0, 0, 0, 0),
(10620, 'CS  543600', 'M', '進階網站程式設計實務A Practical Guide to Advanced Web Programming', '蘇德宙', 0, 0, 0, 0),
(10620, 'CS  546400', 'M', '高科技創業與營運High-Tech Entrepreneurship', '蔡仁松', 0, 0, 0, 0),
(10620, 'CS  550000', 'M', '計算機圖學Computer Graphics', '李潤容', 0, 0, 0, 0),
(10620, 'CS  570100', 'M', '資料科學Data Science', '沈之涯', 0, 0, 0, 0),
(10620, 'CS  573100', 'M', '音樂資訊檢索Music Information Retrieval', '蘇黎', 0, 0, 0, 0),
(10620, 'CS  580200', 'M', '研究方法二Research Methodology (II)', '指導教授', 0, 0, 0, 0),
(10620, 'CS  590000', 'M', '教學實務Teaching Technique Practice', '授課教師', 0, 0, 0, 0),
(10620, 'CS  591000', 'M', '書報討論Seminar', '徐正炘,何宗易', 0, 0, 0, 0),
(10620, 'CS  591200', 'M', '科技英文English for Science and Technology', '周百祥', 0, 0, 0, 0),
(10620, 'CS  591300', 'M', '學術英文寫作Academic Research Writing', '張俊盛', 0, 0, 0, 0),
(10620, 'CS  613500', 'M', 'VLSI實體設計自動化VLSI Physical Design Automation', '何宗易', 0, 0, 0, 0),
(10620, 'CS  631100', 'M', '計算幾何Computational Geometry', '王炳豐', 0, 0, 0, 0),
(10620, 'CS  690000', 'M', '論文Thesis(M.A.)', '指導教授', 0, 0, 0, 0),
(10620, 'CS  742500', 'P', '即時系統專題Special Topics on Real-Time Systems', '石維寬', 0, 0, 0, 0),
(10620, 'CS  742600', 'P', '資源配置專題Special Topics on Resource Allocation', '林華君', 0, 0, 0, 0),
(10620, 'CS  746100', 'P', '軟體工程專題Special Topics in Software Engineering', '黃慶育', 0, 0, 0, 0),
(10620, 'CS  754000', 'P', '圖形識別專題Special Topics on Pattern Recognition', '許秋婷', 0, 0, 0, 0),
(10620, 'CS  771000', 'P', '資料庫系統專題一Special Topics in Data Base Management System(I)', '陳宜欣', 0, 0, 0, 0),
(10620, 'CS  890000', 'P', '論文研究Thesis(Ph.D.)', '指導教授', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member_profile`
--

CREATE TABLE `member_profile` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `credibility` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member_profile`
--

INSERT INTO `member_profile` (`username`, `password`, `name`, `email`, `credibility`) VALUES
('123', '123', '123', '123', 0),
('goodstd', 'goodstd', '郝學陞', 'goodstd@gmail.com', 0),
('timpan-dev', 't25931020', '潘俊廷', 'timpan.dev@gmail.com', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `press_like_record`
--

CREATE TABLE `press_like_record` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `comment_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `press_like_record`
--

INSERT INTO `press_like_record` (`username`, `comment_number`) VALUES
('990805', '32'),
('990805', '33'),
('990805', '34'),
('990805', '35'),
('s106062550', '33'),
('s106062550', '34'),
('timpan-dev', '16'),
('timpan-dev', '17'),
('timpan-dev', '5');

-- --------------------------------------------------------

--
-- 資料表結構 `track`
--

CREATE TABLE `track` (
  `username` varchar(30) NOT NULL,
  `class_number` varchar(30) NOT NULL,
  `unseen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`comment_number`);

--
-- 資料表索引 `course_information`
--
ALTER TABLE `course_information`
  ADD PRIMARY KEY (`semester`,`class_number`);

--
-- 資料表索引 `member_profile`
--
ALTER TABLE `member_profile`
  ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `press_like_record`
--
ALTER TABLE `press_like_record`
  ADD PRIMARY KEY (`username`,`comment_number`);

--
-- 資料表索引 `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`username`,`class_number`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `comment_number` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
