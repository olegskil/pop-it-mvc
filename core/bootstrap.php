<?php
//Путь до директории с конфигурационными файлами
const DIR_CONFIG = '/../config';

//Подключение автозагрузчика composer
require_once __DIR__ . '/../vendor/autoload.php';

//Создание экземпляра приложения
$app = new Src\Application(require __DIR__ . '/../config/app.php');

//Подключение хелперов
require_once __DIR__ .  '/../core/helpers.php';

//Функция возвращает глобальный экземпляр приложения
function app() 
{
    global $app;
    return $app;
}
return $app;
//Функция, возвращающая массив всех настроек приложения
function getConfigs(string $path = DIR_CONFIG): array
{
$settings = [];
foreach (scandir(__DIR__ . $path) as $file) {
    $name = explode('.', $file)[0];
    if (!empty($name)) {
        $settings[$name] = include __DIR__ . "$path/$file";
    }
}
return $settings;
}
require_once __DIR__ . '/../routes/web.php';

//return new Src\Application(new Src\Settings(getConfigs()));