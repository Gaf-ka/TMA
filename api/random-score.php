<?php
header('Content-Type: application/json');

// Простая "база данных" в виде файла
$dbFile = __DIR__ . '/scores.json';

// Создаем файл, если его нет
if (!file_exists($dbFile)) {
    file_put_contents($dbFile, json_encode([]));
}

// Чтение данных
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $scores = json_decode(file_get_contents($dbFile), true);
    // Сортируем по убыванию счета
    usort($scores, function($a, $b) {
        return $b['score'] - $a['score'];
    });
    echo json_encode($scores);
    exit;
}

// Запись данных
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['name']) || !isset($input['score'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Неверные данные']);
        exit;
    }
    
    $scores = json_decode(file_get_contents($dbFile), true);
    
    // Добавляем новый результат
    $scores[] = [
        'name' => substr(trim($input['name']), 0, 20),
        'score' => (int)$input['score'],
        'date' => date('Y-m-d H:i:s')
    ];
    
    // Сохраняем
    file_put_contents($dbFile, json_encode($scores));
    
    echo json_encode(['success' => true]);
    exit;
}
?>