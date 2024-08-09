<?php

// получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['email'], $data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ошибка ввода...']);
    exit;
}

$email = $data['email'];
$password = $data['password'];

// поиск пользователя
$user = R::findOne('users', 'email = ?', [$email]);

if ($user && password_verify($password, $user->password)) {
    echo json_encode(['message' => 'вы авторизованы!']);
} else {
    http_response_code(401);
    echo json_encode(['error' => 'ошибка ввода email или пароля...']);
}
