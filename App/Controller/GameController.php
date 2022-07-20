<?php

    namespace App\Controller;

    // Dependências:
    use App\Entity\Game;
    use App\Model\GameModel;

    class GameController {

        private $gameModel;

        // Método construtor da classe:
        public function __construct() {
            $this->gameModel = new GameModel();
        }

        // POST - Método responsável por criar uma nova instância:
        public function create($data = null) {
            $game = $this->convertType($data);
            $result = $this->validate($game);

            if ($result == "") {
                return json_encode(["mensagem" => $this->gameModel->create($game)]);
            } else {
                return json_encode(["mensagem" => $result]);
            }

        }

        // PUT - Método responsável por atualizar uma instância:
        public function update($id = null, $data = null) {
            $game = $this->convertType($data);
            $game->setId($id);
            $result = $this->validate($game, true);

            if ($result == "") {
                return json_encode(["mensagem" => $this->gameModel->update($game)]);
            } else {
                return json_encode(["erro" => $result]);
            }
        }

        // DELETE - Método responsável por excluir uma instância:
        public function delete($id = 0) {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            if($id <= 0) {
                return json_encode(["erro" => "id inválido: deve ser maior que 0."]);
            }
        
            $result = $this->gameModel->delete($id);
        
            return json_encode(["mensagem" => $result]);
        }

        // GET - Método responsável por retornar uma instância especificada pelo id:
        public function getById($id = 0) {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            if($id <= 0) {
                return json_encode(["erro" => "id inválido: deve ser maior que 0."]);
            }
        
            // return $this->gameModel->getById($id);
            return json_encode(["resultado" => json_decode($this->gameModel->getById($id), true)]);
        }

        // GET - Método responsável por retornar todas as instâncias:
        public function getAll() {
            // return $this->gameModel->getAll();
            return json_encode(["resultado" => json_decode($this->gameModel->getAll(), true)]);
        }

        // Método responsável por converter os dados recebidos em um objeto Game:
        private function convertType($data) {
            if ($data == null) {
                return new Game();
            }

            return new Game
            (
                null, 
                (isset($data['titulo'])     ? $data['titulo']       : null), 
                (isset($data['descricao'])  ? $data['descricao']    : null), 
                (isset($data['videoId'])    ? $data['videoId']      : null)
            );
        }

        // Método responsável por validar os dados recebidos:
        private function validate(Game $game, $update = false) {
            $message = "";

            if ($update && $game->getId() <= 0) {
                return "id inválido: deve ser númerico e maior que 0.";
            }

            if (strlen($game->getTitulo()) <= 3 || strlen($game->getTitulo()) > 100) {
                return "título inválido: deve conter mais que 3 caracteres e menos que 100.";
            }

            if (strlen($game->getDescricao()) < 10 || strlen($game->getDescricao()) > 250) {
                return "descrição inválida: deve conter mais que 10 caracteres e menos que 250.";
            }

            if ($game->getVideoId() == "" || strlen($game->getVideoId()) > 15) {
                return "videoId inválido: não pode estar vazio e deve conter menos que 16 caracteres.";
            }

            return $message;
        }

    }

?>