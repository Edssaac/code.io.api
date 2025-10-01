<?php

namespace App;

class Controller
{
    public function validateVideo(array $video): array
    {
        $info = [];

        if (!isset($video["title"]) || strlen($video["title"]) < 5 || strlen($video["title"]) > 50) {
            $info["error"][] = "campo title inválido: deve conter pelo menos 5 caracteres e no máximo 50.";
        }

        if (!isset($video["description"]) || strlen($video["description"]) < 10 || strlen($video["description"]) > 500) {
            $info["error"][] = "campo description inválido: deve conter pelo menos 10 caracteres e no máximo 500.";
        }

        if (!isset($video["videoid"]) || strlen($video["videoid"]) != 11) {
            $info["error"][] = "campo videoid inválido: deve conter 11 caracteres.";
        } else {
            $curl = curl_init();

            $youtubeApi = $_ENV["YOUTUBE_API_V3_URL"];
            $key = $_ENV["YOUTUBE_API_V3_KEY"];
            $id = $video["videoid"];

            curl_setopt_array(
                $curl,
                [
                    CURLOPT_URL => "$youtubeApi/videos?part=id&id=$id&key=$key",
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_CONNECTTIMEOUT => 5,
                    CURLOPT_TIMEOUT => 10
                ]
            );

            $response = json_decode(curl_exec($curl), true);

            curl_close($curl);

            if (is_null($response) || isset($response["error"])) {
                trigger_error(print_r($response, true), E_USER_WARNING);
                $info["error"][] = "não foi possível validar o vídeo no momento.";
            } else if (empty($response["items"])) {
                $info["error"][] = "videoid inválido: nenhum vídeo encontrado para o id informado.";
            }
        }

        return $info;
    }
}
