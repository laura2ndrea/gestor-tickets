<?php
// Controlador para la gestión de usuarios
require_once 'models/User.php';

function indexAction() {
    $userModel = new User();
    $users = $userModel->getAllUsers();

    // Cargar la vista con los datos de los usuarios
    require 'views/user/index.php';
}

function createAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nick = $_POST['nick'];
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        $id_estado = $_POST['id_estado'];
        $id_rol = $_POST['id_rol'];

        $userModel = new User();
        $userModel->createUser($nick, $correo, $contrasenia, $id_estado, $id_rol);

        header('Location: index.php?controller=user&action=index');
    } else {
        require 'views/user/create.php';
    }
}

function editAction() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $nick = $_POST['nick'];
        $correo = $_POST['correo'];
        $id_estado = $_POST['id_estado'];
        $id_rol = $_POST['id_rol'];

        $userModel = new User();
        $userModel->updateUser($id_usuario, $nick, $correo, $id_estado, $id_rol);

        header('Location: index.php?controller=user&action=index');
    } else {
        $id_usuario = $_GET['id_usuario'];
        $userModel = new User();
        $user = $userModel->getUserById($id_usuario);

        require 'views/user/edit.php';
    }
}
?>