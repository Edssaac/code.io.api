<?php

require_once(__DIR__ . '/system/vendor/autoload.php');

use Library\Log;

const API_NAME = 'code.io.api';
const API_VERSION = '1.0.0';
const API_DOCS = 'https://github.com/edssaac/code.io.api';
const ERROR_INVALID_REQUEST = 'Requisição inválida:';
const ERROR_UNSUPPORTED_PATH = 'Caminho não suportado pela API. Verifique a documentação.';
const ERROR_UNSUPPORTED_METHOD = 'Método de requisição não suportado pela API. Verifique a documentação.';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Max-Age: 3600');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

set_exception_handler(function (Throwable $exception) {
    Log::write(sprintf(
        'Exceção: %s - Arquivo: %s - Linha: %s',
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    ));

    sendJsonResponse(['status' => 400, 'error' => 'Houve um erro interno.'], 400);
});

set_error_handler(function ($errorLevel, $errorMessage, $errorFile, $errorLine) {
    if (error_reporting() === 0) {
        return false;
    }

    switch ($errorLevel) {
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = 'Notice';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error = 'Warning';
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $error = 'Fatal Error';
            break;
        default:
            $error = 'Unknown';
            break;
    }

    Log::write(sprintf(
        '%s: %s - Arquivo: %s - Linha: %s',
        $error,
        $errorMessage,
        $errorFile,
        $errorLine
    ));

    return true;
});

function loadEnvironmentVariables()
{
    if (!file_exists(__DIR__ . '/.env')) {
        throw new Exception('Arquivo .env não encontrado no projeto!');
    }

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $dotenv->required([
        'DB_HOST',
        'DB_NAME',
        'DB_USER',
        'DB_PASSWORD',
        'YOUTUBE_API_V3_URL',
        'YOUTUBE_API_V3_KEY'
    ])->notEmpty();
}

function sendJsonResponse($data, $statusCode = 200)
{
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

function handleRoutes()
{
    function validateRequestMethod($method)
    {
        $allowedMethods = ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'];

        if (!in_array($method, $allowedMethods)) {
            sendJsonResponse(['status' => 405, 'error' => ERROR_UNSUPPORTED_METHOD], 405);
        }
    }

    function validateID($id)
    {
        return !is_null($id) && is_numeric($id);
    }

    $settings = [
        'data'      => json_decode(file_get_contents('php://input'), true) ?? [],
        'method'    => $_SERVER['REQUEST_METHOD'],
        'uri'       => trim($_SERVER['REQUEST_URI'], '/')
    ];

    $path = array_values(array_filter(explode('/', $settings['uri']), function ($value) {
        return !(empty($value) || $value == 'code.io.api');
    }));

    $service = !empty($path[0]) ? strtolower($path[0]) : NULL;
    $id = $path[1] ?? NULL;

    if (empty($service)) {
        sendJsonResponse([
            'api' => API_NAME,
            'version' => API_VERSION,
            'documentation' => API_DOCS
        ]);
    }

    $supportedServices = [
        'video'
    ];

    if (!in_array($service, $supportedServices)) {
        sendJsonResponse([
            'error' => ERROR_UNSUPPORTED_PATH,
            'documentation' => API_DOCS
        ], 404);
    }

    $controllerClass = 'App\Controller\\' . ucfirst($service) . 'Controller';
    $controller = new $controllerClass();

    validateRequestMethod($settings['method']);

    switch ($settings['method']) {
        case 'GET':
            if (validateID($id)) {
                sendJsonResponse($controller->getById($id));
            } else {
                sendJsonResponse($controller->getAll());
            }
            break;

        case 'POST':
            if (validateID($id)) {
                sendJsonResponse(['status' => 400, 'error' => ERROR_INVALID_REQUEST . ' Rota não deve receber um ID.'], 400);
            }

            sendJsonResponse($controller->insert($settings['data']));
            break;

        case 'PUT':
            if (!validateID($id)) {
                sendJsonResponse(['status' => 400, 'error' => ERROR_INVALID_REQUEST . ' Rota deve receber um ID válido.'], 400);
            }

            $settings['data']['id'] = $id;

            sendJsonResponse($controller->update($settings['data']));
            break;

        case 'DELETE':
            if (!validateID($id)) {
                sendJsonResponse(['status' => 400, 'error' => ERROR_INVALID_REQUEST . ' Rota deve receber um ID válido.'], 400);
            }

            sendJsonResponse($controller->delete($id));
            break;
    }
}

loadEnvironmentVariables();
handleRoutes();
