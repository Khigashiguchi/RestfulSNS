<?php
namespace Khigashiguchi\RestfulSNS\Resource\App;

use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\JsonSchema;
use Koriym\QueryLocator\QueryLocatorInject;
use Ray\AuraSqlModule\AuraSqlInject;

class Articles extends ResourceObject
{
    use AuraSqlInject;
    use QueryLocatorInject;

    /**
     * @JsonSchema(schema="articles.json")
     */
    public function onGet() : ResourceObject
    {
        $this->body = $this->pdo->fetchAll($this->query['article_list']);

        return $this;
    }
}
