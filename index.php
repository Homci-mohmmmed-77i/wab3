<?php
session_start(); [cite: 97]
require "config.php"; [cite: 33]

$page = $_GET['page'] ?? 'login'; [cite: 98]

// نظام التوجيه (Routing) [cite: 99]
switch ($page) {
    case 'login':
        (new AuthController())->login(); [cite: 102]
        break;

    case 'admin.dashboard':
        requireRole('admin'); [cite: 105]
        (new AdminController())->dashboard(); [cite: 105]
        break;

    case 'professor.grades':
        requireRole('professor'); [cite: 108]
        (new ProfessorController())->grades(); [cite: 108]
        break;

    case 'student.dashboard':
        requireRole('student'); [cite: 112]
        (new StudentController())->dashboard(); [cite: 112]
        break;

    default:
        header("Location: ?page=login"); [cite: 113]
}
?>
