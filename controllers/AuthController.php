public function login() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = User::findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin')
                header("Location: ?page=admin.dashboard");

            elseif ($user['role'] == 'professor')
                header("Location: ?page=professor.grades");

            else
                header("Location: ?page=student.dashboard");

        } else {
            echo "Login error";
        }
    }
}
