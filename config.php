<?php
// الاتصال بقاعدة البيانات PDO
$pdo = new PDO("mysql:host=localhost;dbname=gpa_db", "root", "");

function requireRole($expectedRole) {
    // التحقق من وجود الجلسة وصلاحية الوقت (1800 ثانية) [cite: 344, 356]
    if (!isset($_SESSION['role']) || (time() - $_SESSION['last_activity'] > 1800)) {
        session_destroy(); [cite: 345]
        header("Location: ?page=login"); [cite: 349]
        exit;
    }

    // التحقق من الدور المطلوب [cite: 350]
    if ($_SESSION['role'] !== $expectedRole) {
        http_response_code(403); [cite: 351]
        die("Access Denied"); [cite: 354]
    }

    $_SESSION['last_activity'] = time(); // تحديث وقت النشاط [cite: 357]
}
?>
