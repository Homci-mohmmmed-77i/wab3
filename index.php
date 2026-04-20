session_start();

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        require 'controllers/AuthController.php';
        break;

    case 'admin.dashboard':
        requireRole('admin');
        require 'controllers/AdminController.php';
        break;

    case 'professor.grades':
        requireRole('professor');
        require 'controllers/ProfessorController.php';
        break;

    case 'student.dashboard':
        requireRole('student');
        require 'controllers/StudentController.php';
        break;

    default:
        header("Location: ?page=login");
}
