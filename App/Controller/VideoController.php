<?php

namespace App\Controller;

use App\Controller;
use App\Model\VideoModel;

class VideoController extends Controller
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
}
