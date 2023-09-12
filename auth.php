<?php
require_once 'autoload.php';
session_start();
$message = '<span  style="color: white; text-align: center; font-size: 25px; font-weight: 900;">Войдите для просмотра</span>';
if (isset($_SESSION['role'])) {
    header('Location: index.php');
    exit;
} elseif (
    isset($_POST['login']) &&
    isset($_POST['password'])
) {
    $login = Helper::clearString($_POST['login']);
    $password = Helper::clearString($_POST['password']);
    $userMap = new UserMap();
    $user = $userMap->auth($login, $password);
    if ($user) {
        $_SESSION['id'] = $user->user_id;
        $_SESSION['role'] = $user->sys_name;
        $_SESSION['roleName'] = $user->name;
        $_SESSION['fio'] = $user->fio;
        header('Location: index.php');
        exit;
    } else {
        $message = '<span style="color:red; text-align: center; font-size: 25px; font-weight: 900;">Некорректен
логин или пароль</span>';
    }
}
require_once('template/login.php');
?>