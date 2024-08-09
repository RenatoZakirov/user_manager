<?php

// получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username'], $data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ошибка ввода...']);
    exit;
}

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];

// создание пользователя
$user = R::dispense('users');
$user->username = $username;
$user->email = $email;
$user->password = password_hash($password, PASSWORD_BCRYPT);
$id = R::store($user);

http_response_code(201);
echo json_encode(['id' => $id, 'message' => 'пользователь создан!']);
