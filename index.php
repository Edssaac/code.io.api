<?php
    
    // Autoload do Composer:
    // require_once('\vendor\autoload.php');
    require_once(__DIR__.'/vendor/autoload.php');

    // Dependências:
    use App\Controller\VideoController;


    // Headers:
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    // Fim dos Headers


    // Parâmentros:
    $controller = null;
    $id         = null;
    $data       = null;
    $method     = $_SERVER['REQUEST_METHOD']; // Permitidos: DELETE, GET, POST, PUT
    $uri        = $_SERVER['REQUEST_URI']; // ex: /gamenews/api/games/10
    $unsetCount = ($_SERVER['HTTP_HOST'] == 'localhost') ? 2 : 1; // Quantidade a ser removida da URI
    // Fim da declaração dos parâmetros


    // Passa os dados recebidos para o $data em formato de array:
    parse_str(file_get_contents("php://input"), $data); 
    

    // Tratando a URI:
    $ex = explode("/", $uri);

    for ($i=0; $i<$unsetCount; $i++) {
        unset($ex[$i]);
    }

    $ex = array_filter(array_values($ex));

    if ( isset($ex[0]) ) {
        $controller = $ex[0];
    }

    if ( isset($ex[1]) ) {
        $id = $ex[1];
    }
    // Fim do tratamento da URI


    if ($controller == null) {
        echo json_encode([
            "mensagem" => "code.io.api", 
            "versão" => "1.0.0",
            "documentação" => "https://github.com/Edssaac/code.io.api",
        ]);
        die;
    }

    if ($controller != 'video') {
        echo json_encode(["erro" => "caminho não suportado pela API. verifique a documentação."]);
        die;
    }

    $videoController = new VideoController();

    switch ($method) {
        case 'POST':
            if ($id == null) {
                echo $videoController->create($data);
            } else {
                echo json_encode(["erro" => "requisição inválida: rota POST não deve receber um ID."]);
            }
        break;

        case 'PUT':
            if ($id != null) {
                echo $videoController->update($id, $data);
            } else {
                echo json_encode(["erro" => "requisição inválida: rota PUT necessita de um ID para que a atualização ocorra."]);
            }
        break;
            
        case 'DELETE':
            if ($id != null) {
                echo $videoController->delete($id);
            } else {
                echo json_encode(["erro" => "requisição inválida: rota DELETE necessita de um ID para que a exclusão ocorra."]);
            }
        break;

        case 'GET':
            if ($id != null) {
                echo $videoController->getById($id);
            } else {
                echo $videoController->getAll();
            }
        break;
        
        default:
            echo json_encode(["erro" => "método de requisição não suportado."]);
        break;
    }

?>