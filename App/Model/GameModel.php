<?php

    namespace App\Model;

    // Dependências:
    use App\Entity\Game;
    use App\Util\Serialize;

    class GameModel {

        private $fileName;
        private $listGame;

        // Método construtor da classe:
        public function __construct() {
            $this->fileName = "../database/games.db";
            $this->listGame = [];
            $this->load();
        }

        // Método responsável por criar uma nova instância:
        public function create(Game $game) {
            $game->setId($this->getLastId());
            $this->listGame[] = $game;
            $this->save();

            return "jogo registrado.";
        }

        // Método responsável por atualizar um registro:
        public function update(Game $game)  {
            $result = "jogo não encontrado.";
        
            for($i = 0; $i < count($this->listGame); $i++) {
                if($this->listGame[$i]->getId() == $game->getId()) {
                    $this->listGame[$i] = $game;
                    $result = "jogo atualizado.";
                }
            }
        
            $this->save();
        
            return $result;
        }
        
        // Método responsável por excluir um registro:
        public function delete($id){
            $result = "jogo não encontrado.";

            for($i = 0; $i < count($this->listGame); $i++) {
                if($this->listGame[$i]->getId() == $id) {
                    unset($this->listGame[$i]);
                    $result = "jogo deletado.";
                }
            }
        
            $this->listGame = array_filter(array_values($this->listGame));
        
            $this->save();

            return $result;
        }

        // Método responsável por retornar um registro especificado pelo id:
        public function getById($id) {
            foreach($this->listGame as $game){
                if($game->getId() == $id) {
                    return (new Serialize())->serialize($game);
                }
            }
        
            return json_encode([]);
        }

        // Método responsável por retornar todos os registros:
        public function getAll() {
            return (new Serialize())->serialize($this->listGame);
        }

        // Método responsável por retornar o último id acrescentado por 1:
        private function getLastId(){
            $lastId = 0;
        
            foreach($this->listGame as $g) {
                if($g->getId() > $lastId) {
                    $lastId = $g->getId();
                }
            }

            return (++$lastId);
        }

        // Método responsável por salvar os dados:
        public function save() {
            $temp = []; // Array temporário de jogos a serem salvos;

            // Passando os dados para o array temporário:
            foreach ($this->listGame as $game) {
                $temp[] = [
                    "id" => $game->getId(),
                    "titulo" => $game->getTitulo(),
                    "descricao" => $game->getDescricao(),
                    "videoId" => $game->getVideoId()
                ];
            }

            $string = json_encode($temp); // Convertendo o array temporário em json;
            $fp = fopen($this->fileName, "w"); // Abrindo o arquivo em modo de escrita;
            fwrite($fp, $string); // Escrevendo o json no arquivo;
            fclose($fp); // Fechando o arquivo;
        }

        // Método responsável por carregar os dados:
        public function load() {
            // Verificando se o arquivo não existe ou se está vazio:
            if (!file_exists($this->fileName) || filesize($this->fileName) <=0) {
                return [];
            }

            $fp = fopen($this->fileName, "r"); // Abrindo o arquivo em modo de leitura;
            $string = fread($fp, filesize($this->fileName));
            fclose($fp); // Fechando o arquivo;
            
            $arrayGame = json_decode($string, true);

            // Passando os dados para o array temporário:
            foreach ($arrayGame as $game) {
                $this->listGame[] = new Game(
                    $game["id"],
                    $game["titulo"],
                    $game["descricao"],
                    $game["videoId"]
                );
            }
        }

    }

?>