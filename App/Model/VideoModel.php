<?php

    namespace App\Model;

    // Dependências:
    use App\Entity\Video;
    use App\Database\Connection;

    class VideoModel {

        private $db;

        // Método construtor da classe:
        public function __construct() {
            $this->db = new Connection("tbvideos");
        }

        // Método responsável por criar uma nova instância:
        public function create($video) {

            if ($this->db->insert($video)) {
                return "vídeo registrado.";
            } 

            return "";
        }

        // Método responsável por atualizar um registro:
        public function update($id, $video)  {
        
            if (count($this->db->select("id=$id")->fetchAll()) == 0) {
                return "";
            }
            
            if ($this->db->update("id=$id", $video)) {
                return "vídeo atualizado.";
            }
        
            return "";
        }
        
        // Método responsável por excluir um registro:
        public function delete($id){

            if (count($this->db->select("id=$id")->fetchAll()) == 0) {
                return "";
            }
            
            if ($this->db->delete("id=$id")) {
                return "vídeo deletado.";
            }
        
            return "";
        }

        // Método responsável por retornar um registro especificado pelo id:
        public function getById($id) {

            $search = $this->db->select("id=$id")->fetch(\PDO::FETCH_ASSOC);

            if (!$search) {
                return "";
            }

            return json_encode($search);
        }

        // Método responsável por retornar todos os registros:
        public function getAll() {
            return ($this->db->select()->fetchAll(\PDO::FETCH_ASSOC));
        }

    }

?>