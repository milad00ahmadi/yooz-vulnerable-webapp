<?

error_reporting(E_ERROR);
require '../vendor/autoload.php';

$app = \App\Application::getInstance();

$app->setBasePath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

$app->setup();

