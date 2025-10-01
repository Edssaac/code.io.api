<?php

namespace App\Model;

use App\Model;
use PDO;

class VideoModel extends Model
{
    public function insert(array $video): bool
    {
        $result = $this->query(
            "INSERT INTO video SET
                title = :title, 
                description = :description, 
                videoid = :videoid
            ",
            $this->mapToBind($video)
        );

        return true;
    }

    public function getVideo(int $id): array
    {
        $result = $this->query(
            "SELECT id, title, description, videoid FROM video
				WHERE id = :id
			",
            $this->mapToBind([
                "id" => $id
            ])
        );

        $video = $result->fetch(PDO::FETCH_ASSOC);

        if (empty($video)) {
            return [];
        }

        return $video;
    }

    public function getVideos(array $filters = []): array
    {
        if (empty($filters["limit"])) {
            $filters["limit"] = $_ENV["PAGINATION_LIMIT"];
        }

        if (empty($filters["offset"])) {
            $filters["offset"] = 0;
        }

        $result = $this->query("
            SELECT id, title, description, videoid 
            FROM video 
            ORDER BY id ASC 
            LIMIT {$filters["limit"]}
            OFFSET {$filters["offset"]}
        ");

        $videos = $result->fetchAll(PDO::FETCH_ASSOC) ?? [];

        if (empty($videos)) {
            return [];
        }

        return $videos;
    }

    public function update(array $video): bool
    {
        $result = $this->query(
            "UPDATE video 
                SET title = :title, description = :description, videoid = :videoid
				WHERE id = :id
			",
            $this->mapToBind([
                "id" => $video["id"],
                "title" => $video["title"],
                "description" => $video["description"],
                "videoid" => $video["videoid"]
            ])
        );

        return true;
    }

    public function delete(int $id): bool
    {
        $result = $this->query(
            "DELETE FROM video
				WHERE id = :id
			",
            $this->mapToBind([
                "id" => $id
            ])
        );

        return true;
    }
}
