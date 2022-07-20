<?php

    namespace App\Controller;

    // Dependências:
    use App\Entity\Video;
    use App\Model\VideoModel;

    class VideoController {

        private $videoModel;

        // Método construtor da classe:
        public function __construct() {
            $this->videoModel = new VideoModel();
        }

        // POST - Método responsável por criar uma nova instância:
        public function create($data = null) {
            $video = $this->convertType($data);
            $result = $this->validate($video);

            if ($result == "") {
                return json_encode(["mensagem" => $this->videoModel->create($video)]);
            } else {
                return json_encode(["mensagem" => $result]);
            }

        }

        // PUT - Método responsável por atualizar uma instância:
        public function update($id = null, $data = null) {
            $video = $this->convertType($data);
            $video->setId($id);
            $result = $this->validate($video, true);

            if ($result == "") {
                return json_encode(["mensagem" => $this->videoModel->update($video)]);
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
        
            $result = $this->videoModel->delete($id);
        
            return json_encode(["mensagem" => $result]);
        }

        // GET - Método responsável por retornar uma instância especificada pelo id:
        public function getById($id = 0) {
            $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            if($id <= 0) {
                return json_encode(["erro" => "id inválido: deve ser maior que 0."]);
            }
        
            // return $this->videoModel->getById($id);
            return json_encode(["resultado" => json_decode($this->videoModel->getById($id), true)]);
        }

        // GET - Método responsável por retornar todas as instâncias:
        public function getAll() {
            // return $this->videoModel->getAll();
            return json_encode(["resultado" => json_decode($this->videoModel->getAll(), true)]);
        }

        // Método responsável por converter os dados recebidos em um objeto Video:
        private function convertType($data) {
            if ($data == null) {
                return new Video();
            }

            return new Video
            (
                null, 
                (isset($data['titulo'])     ? $data['titulo']       : null), 
                (isset($data['descricao'])  ? $data['descricao']    : null), 
                (isset($data['videoid'])    ? $data['videoid']      : null)
            );
        }

        // Método responsável por validar os dados recebidos:
        private function validate(Video $video, $update = false) {
            $message = "";

            if ($update && $video->getId() <= 0) {
                return "id inválido: deve ser númerico e maior que 0.";
            }

            if (strlen($video->getTitulo()) < 10 || strlen($video->getTitulo()) > 25) {
                return "título inválido: deve conter mais que 9 caracteres e menos que 26.";
            }

            if (strlen($video->getDescricao()) < 10 || strlen($video->getDescricao()) > 250) {
                return "descrição inválida: deve conter mais que 9 caracteres e menos que 251.";
            }

            if ($video->getVideoid() == "" || strlen($video->getVideoid()) > 11) {
                return "videoid inválido: não pode estar vazio e deve conter no máximo que 11 caracteres.";
            }

            return $message;
        }

    }

?>