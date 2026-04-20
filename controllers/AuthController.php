<?php
class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email']; [cite: 301]
            $password = $_POST['password']; [cite: 306]

            // البحث عن المستخدم في الموديل [cite: 309]
            $user = User::findByEmail($email);

            // التحقق من كلمة المرور [cite: 302]
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id']; [cite: 303]
                $_SESSION['role'] = $user['role']; [cite: 319]
                $_SESSION['name'] = $user['name']; [cite: 320]
                $_SESSION['last_activity'] = time(); [cite: 321]

                // التوجيه حسب الدور [cite: 322]
                if ($user['role'] === 'admin') header("Location: ?page=admin.dashboard"); [cite: 323]
                elseif ($user['role'] === 'professor') header("Location: ?page=professor.grades"); [cite: 324]
                elseif ($user['role'] === 'student') header("Location: ?page=student.dashboard"); [cite: 328]
                exit;
            } else {
                $_SESSION['error'] = "Invalid email or password"; [cite: 332]
                header("Location: ?page=login"); [cite: 334]
            }
        } else {
            include "views/login.php"; // عرض صفحة الدخول [cite: 339]
        }
    }
}
?>
