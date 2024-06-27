<?php

namespace App\Controller;

use App\Model\VideoModel;

class VideoController
{
    private VideoModel $videoModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    public function insert(array $video): array
    {
        $result = $this->validateVideo($video);

        if (isset($result['error'])) {
            return [
                'status' => 400,
                'error' => $result['error']
            ];
        }

        $result = $this->videoModel->insert($video);

        if ($result) {
            return [
                'status' => 201,
                'message' => 'vídeo registrado com sucesso.'
            ];
        }

        return [
            'status' => 400,
            'error' => 'vídeo não pôde ser registrado.'
        ];
    }

    public function update(array $video): array
    {
        $result = $this->validateVideo($video);

        if (isset($result['error'])) {
            return [
                'status' => 400,
                'error' => $result['error']
            ];
        }

        $result = $this->videoModel->update($video);

        if ($result) {
            return [
                'status' => 200,
                'message' => 'vídeo atualizado com sucesso.'
            ];
        }

        return [
            'status' => 400,
            'error' => 'vídeo não pôde ser atualizado.'
        ];
    }

    public function delete(int $id): array
    {
        $result = $this->videoModel->delete($id);

        if ($result) {
            return [
                'status' => 204,
                'message' => 'vídeo deletado com sucesso.'
            ];
        }

        return [
            'status' => 400,
            'error' => 'vídeo não pôde ser deletado.'
        ];
    }

    public function getById(int $id): array
    {
        $video = $this->videoModel->getVideo($id);

        if ($video) {
            return [
                'status' => 200,
                'video' => $video
            ];
        }

        return [
            'status' => 404,
            'error' => 'vídeo não encontrado.'
        ];
    }

    public function getAll()
    {
        return [
            'status' => 200,
            'videos' => $this->videoModel->getVideos()
        ];
    }

    private function validateVideo(array $video): array
    {
        $info = [];

        if (!isset($video['title']) || strlen($video['title']) < 5 || strlen($video['title']) > 50) {
            $info['error'][] = 'campo title inválido: deve conter pelo menos 5 caracteres e no máximo 50.';
        }

        if (!isset($video['description']) || strlen($video['description']) < 10 || strlen($video['description']) > 500) {
            $info['error'][] = 'campo description inválido: deve conter pelo menos 10 caracteres e no máximo 500.';
        }

        if (!isset($video['videoid']) || strlen($video['videoid']) != 11) {
            $info['error'][] = 'campo videoid inválido: deve conter 11 caracteres.';
        } else {
            $curl = curl_init();

            $youtubeApi = $_ENV['YOUTUBE_API_V3_URL'];
            $key = $_ENV['YOUTUBE_API_V3_KEY'];
            $id = $video['videoid'];

            curl_setopt_array(
                $curl,
                [
                    CURLOPT_URL => "$youtubeApi/videos?part=id&id=$id&key=$key",
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_RETURNTRANSFER => TRUE,
                ]
            );

            $response = json_decode(curl_exec($curl), true);

            curl_close($curl);

            if (is_null($response) || isset($response['error'])) {
                trigger_error(print_r($response, true), E_USER_ERROR);
                $info['error'][] = 'não foi possível validar o vídeo no momento.';
            } else if (empty($response['items'])) {
                $info['error'][] = 'videoid inválido: nenhum vídeo encontrado para o id informado.';
            }
        }

        return $info;
    }
}
