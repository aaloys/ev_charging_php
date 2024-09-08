<?php

require_once __DIR__ . '/vendor/autoload.php';

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$api_host = "https://jncp.jerit.in/ev_charging";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/api-admin') {
  header('Location: http://127.0.0.1:8000/admin');
  exit();
}


switch (true) {
  case $uri === '/':
    echo $twig->render('pages/index.twig', ['api_host' => $api_host]);
    break;
  case $uri === '/register':
    echo $twig->render('pages/signup.twig', ['api_host' => $api_host]);
    break;
  case $uri === '/login':
    echo $twig->render('pages/login.twig', ['api_host' => $api_host]);
    break;
  case $uri === '/book':
    echo $twig->render('pages/book.twig', ['api_host' => $api_host]);
    break;
    case $uri === '/feedback':
      echo $twig->render('pages/feedback.twig', ['api_host' => $api_host]);
      break;
    case $uri === '/find':
      echo $twig->render('pages/find.twig', ['api_host' => $api_host]);
      break;
    case $uri === '/payment':
      echo $twig->render('pages/payment.twig', ['api_host' => $api_host]);
      break;
    case $uri === '/profile':
      echo $twig->render('pages/profile.twig', ['api_host' => $api_host]);
      break;
    case $uri === '/admin':
      echo $twig->render('pages/admin.twig', ['api_host' => $api_host]);
      break;
    default:
      http_response_code(404);
      echo "Page Not Found";
      exit();
}
