<?php
namespace Khigashiguchi\RestfulSNS\Resource\App;

use BEAR\Resource\ResourceObject;
use Koriym\HttpConstants\StatusCode;
use Ray\AuraSqlModule\AuraSqlInject;

class Article extends ResourceObject
{
    use AuraSqlInject;

    public function onGet(string $id) : ResourceObject
    {
        $article = $this->pdo->fetchOne("SELECT * FROM articles WHERE id = :id", ['id' => $id]);
        if (!$article) {
            $this->code = StatusCode::NOT_FOUND;

            return $this;
        }
        $this->body['article'] = $article;

        return $this;
    }
}