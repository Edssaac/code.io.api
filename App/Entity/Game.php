<?php

    namespace App\Entity;

    class Game {

        // atributos da classe:
        private $id;
        private $titulo;
        private $descricao;
        private $videoId;

        // construtor da classe:
        public function __construct($id=0, $titulo='', $descricao='', $videoId='') {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->descricao = $descricao;
            $this->videoId = $videoId;
        }

        // setters:
        public function setId($id) {
            $this->id = $id;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setVideoId($videoId) {
            $this->videoId = $videoId;
        }

        // getters:
        public function getId() {
            return $this->id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getVideoId() {
            return $this->videoId;
        }

    }

?>