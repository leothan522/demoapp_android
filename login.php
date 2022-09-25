<?php
require "Query.php";

function getLogin($email, $password, $fcm_token){
    $query = new Query();
    $row = null;
    $sql = "SELECT * FROM `users` WHERE `email` = '{$email}';";
    $row = $query->getFirst($sql);
    if ($row) {
        if (password_verify($password, $row['password'])) {
            $sql = "UPDATE `users` SET `fcm_token`='{$fcm_token}' WHERE  `id`={$row['id']};";
            $update = $query->save($sql);
            $row['success'] = true;
            return $row;
        }else{
            $row['success'] = false;
            $row['error'] = "password";
            return $row;
        }
    } else {
        $row['success'] = false;
        $row['error'] = "email";
        return $row;
    }
}

$data = array();

if (empty($_POST['email']) && empty($_POST['password'])) {
    $data['success'] = false;
    $data['message'] = 'Campos Vacios al enviar los datos';
}else{
    $usuario = getLogin($_POST['email'], $_POST['password'], $_POST['fcm_token']);
    if ($usuario['success']){
        $data['id'] = $usuario['id'];
        $data['name'] = ucwords($usuario['name']);
        $data['email'] = strtolower($usuario['email']);
        $data['telefono'] = $usuario['telefono'];
        $data['success'] = true;
        $data['message'] = "Bienvenido ".ucwords($data['name']);
    }else{
        $data['success'] = false;
        $data['message'] = "Estas credenciales no coinciden con nuestros registros.";
        if ($usuario['error'] == "email"){
            $data['error'] = "Email NO registrado";
        }else{
            $data['error'] = "Contraseña Incorrecta";
        }
    }

}

echo json_encode($data, JSON_UNESCAPED_UNICODE);