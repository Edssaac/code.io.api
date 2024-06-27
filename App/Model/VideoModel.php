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

        return (bool) $result->rowCount();
    }

    public function getVideo(int $id): array
    {
        $result = $this->query(
            "SELECT id, title, description, videoid FROM video
				WHERE id = :id
			",
            $this->mapToBind([
                'id' => $id
            ])
        );

        $video = $result->fetch(PDO::FETCH_ASSOC) ?? [];

        return $video;
    }

    public function getVideos(): array
    {
        $result = $this->query(
            "SELECT id, title, description, videoid FROM video"
        );

        $videos = $result->fetchAll(PDO::FETCH_ASSOC) ?? [];

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
                'id' => $video['id'],
                'title' => $video['title'],
                'description' => $video['description'],
                'videoid' => $video['videoid']
            ])
        );

        return (bool) $result->rowCount();
    }

    public function delete(int $id): bool
    {
        $result = $this->query(
            "DELETE FROM video
				WHERE id = :id
			",
            $this->mapToBind([
                'id' => $id
            ])
        );

        return (bool) $result->rowCount();
    }
}
