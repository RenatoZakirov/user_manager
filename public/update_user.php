<?php

// получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id'], $data['username'], $data['email'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ошибка ввода...']);
    exit;
}

$id = (int)$data['id'];
$username = $data['username'];
$email = $data['email'];

// обновление пользователя
$user = R::load('users', $id);

if ($user->id) {
    $user->username = $username;
    $user->email = $email;
    R::store($user);
    echo json_encode(['message' => 'пользователь обновлен!']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'пользователь не найден...']);
}
