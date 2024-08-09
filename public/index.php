<?php

require_once '../config/database.php';

// получение текущего URL пути
$request_uri = $_SERVER['REQUEST_URI'];

// определение маршрутов и соответствующих файлов
$routes = [
    '/user_manager/api/user/create' => 'create_user.php',
    '/user_manager/api/user/get' => 'get_user.php',
    '/user_manager/api/user/update' => 'update_user.php',
    '/user_manager/api/user/delete' => 'delete_user.php',
    '/user_manager/api/user/login' => 'login_user.php',
];

// поиск соответствующего файла для текущего запроса
foreach ($routes as $route => $file) {
    if (strpos($request_uri, $route) === 0) {
        // проверка метода запроса
        $method = $_SERVER['REQUEST_METHOD'];

        // проверка наличия 'id' для запросов GET, PUT, DELETE
        if (in_array($file, ['get_user.php', 'update_user.php', 'delete_user.php'])) {
            if ($method === 'GET') {
                // проверка 'id' в URL параметрах для GET
                if (!isset($_GET['id'])) {
                    http_response_code(400);
                    echo json_encode(['error' => 'параметр ID пропущен...']);
                    exit;
                }
            } else if (in_array($method, ['PUT', 'DELETE'])) {
                // проверка 'id' в теле запроса для PUT и DELETE
                $data = json_decode(file_get_contents('php://input'), true);
                if (!isset($data['id'])) {
                    http_response_code(400);
                    echo json_encode(['error' => 'параметр ID пропущен...']);
                    exit;
                }
            }
        }
        // подключение соответствующего файла
        require $file;
        exit;
    }
}

// если маршрут не найден
http_response_code(404);
echo json_encode(['error' => 'путь не найден...']);
