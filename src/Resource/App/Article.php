<?php
namespace Khigashiguchi\RestfulSNS\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\JsonSchema;
use Koriym\HttpConstants\StatusCode;
use Ray\AuraSqlModule\AuraSqlInject;
use Koriym\QueryLocator\QueryLocatorInject;

class Article extends ResourceObject
{
    use AuraSqlInject;
    use QueryLocatorInject;

    public function onGet(string $id) : ResourceObject
    {
        $article = $this->pdo->fetchOne($this->query['article_select'], ['id' => $id]);
        if (!$article) {
            $this->code = StatusCode::NOT_FOUND;

            return $this;
        }
        $this->body['article'] = $article;

        return $this;
    }
}