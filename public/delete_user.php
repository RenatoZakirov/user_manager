<?php

// получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || ($id = (int)$data['id']) <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'ошибка ввода ID...']);
    exit;
}

// удаление пользователя
$user = R::load('users', $id);

if ($user->id) {
    R::trash($user);
    echo json_encode(['message' => 'пользователь удален!']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'пользователь не найден...']);
}
