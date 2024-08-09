<?php

// получение данных из запроса
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'ошибка ввода ID...']);
    exit;
}

// поиск пользователя
$user = R::load('users', $id);

if ($user->id) {
    echo json_encode($user);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'пользователь не найден...']);
}
