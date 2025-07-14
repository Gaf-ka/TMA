<?php
// Настройки сайта
$site_title = "Обучающий сайт о TMA";
$menu_items = [
    'home' => 'Главная',
    'about' => 'О TMA',
    'tutorials' => 'Обучение',
    'gallery' => 'Галерея',
    'contact' => 'Контакты'
];

// Контент для страниц
$page_content = [
    'home' => [
        'title' => 'Добро пожаловать на сайт о TMA',
        'content' => '
            <h2>Что такое TMA?</h2>
            <p>TMA (Trained Muscle Analysis) - это современный метод анализа мышечной активности и тренировочного прогресса.</p>
            <img src="https://via.placeholder.com/600x300?text=TMA+Example" alt="Пример TMA" class="img-fluid mb-4">
            <p>На этом сайте вы найдете обучающие материалы, примеры анализов и полезные советы по работе с TMA.</p>
        '
    ],
    'about' => [
        'title' => 'О методе TMA',
        'content' => '
            <h2>Основы TMA</h2>
            <p>TMA позволяет:</p>
            <ul>
                <li>Анализировать мышечную активность</li>
                <li>Оценивать эффективность тренировок</li>
                <li>Выявлять дисбалансы в развитии мышц</li>
                <li>Персонализировать тренировочные программы</li>
            </ul>
            <img src="https://via.placeholder.com/500x300?text=TMA+Analysis" alt="Анализ TMA" class="img-fluid my-4">
        '
    ],
    'tutorials' => [
        'title' => 'Обучающие материалы по TMA',
        'content' => '
            <h2>Видеоуроки по TMA</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200?text=Lesson+1" class="card-img-top" alt="Урок 1">
                        <div class="card-body">
                            <h5 class="card-title">Основы TMA</h5>
                            <p class="card-text">Введение в методологию TMA и базовые принципы.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200?text=Lesson+2" class="card-img-top" alt="Урок 2">
                        <div class="card-body">
                            <h5 class="card-title">Практическое применение</h5>
                            <p class="card-text">Как использовать TMA в реальных тренировках.</p>
                        </div>
                    </div>
                </div>
            </div>
        '
    ],
    'gallery' => [
        'title' => 'Галерея TMA анализов',
        'content' => '
            <h2>Примеры TMA анализов</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="https://via.placeholder.com/300x200?text=TMA+Case+1" class="img-thumbnail" alt="Пример 1">
                </div>
                <div class="col-md-4 mb-4">
                    <img src="https://via.placeholder.com/300x200?text=TMA+Case+2" class="img-thumbnail" alt="Пример 2">
                </div>
                <div class="col-md-4 mb-4">
                    <img src="https://via.placeholder.com/300x200?text=TMA+Case+3" class="img-thumbnail" alt="Пример 3">
                </div>
            </div>
        '
    ],
    'contact' => [
        'title' => 'Свяжитесь с нами',
        'content' => '
            <h2>Форма обратной связи</h2>
            <form method="post" action="?page=contact">
                <div class="mb-3">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Сообщение</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        '
    ]
];

// Обработка формы контактов
if (isset($_GET['page']) && $_GET['page'] == 'contact' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    // Здесь можно добавить отправку email или сохранение в базу данных
    $page_content['contact']['content'] = '
        <div class="alert alert-success">
            Спасибо, '.$name.'! Ваше сообщение отправлено. Мы свяжемся с вами по email '.$email.' в ближайшее время.
        </div>
        <a href="?" class="btn btn-primary">Вернуться на главную</a>
    ';
}

// Определяем текущую страницу
$current_page = $_GET['page'] ?? 'home';
if (!array_key_exists($current_page, $page_content)) {
    $current_page = 'home';
}

// HTML шаблон
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site_title ?> - <?= $page_content[$current_page]['title'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://via.placeholder.com/1920x600?text=TMA+Training');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
        }
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .content-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="?"><?= $site_title ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php foreach ($menu_items as $key => $title): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == $key ? 'active' : '' ?>" href="?page=<?= $key ?>"><?= $title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Герой секция -->
    <div class="hero-section">
        <div class="container text-center">
            <h1 class="display-4"><?= $page_content[$current_page]['title'] ?></h1>
            <p class="lead">Изучайте метод TMA с нашими обучающими материалами</p>
        </div>
    </div>

    <!-- Основной контент -->
    <div class="container">
        <div class="content-card">
            <?= $page_content[$current_page]['content'] ?>
        </div>
    </div>

    <!-- Футер -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Обучающий сайт о TMA. Все права защищены.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>