<?php
namespace Khigashiguchi\RestfulSNS\Resource\App;

use BEAR\Package\Annotation\ReturnCreatedResource;
use BEAR\Resource\ResourceObject;
use BEAR\Resource\Annotation\JsonSchema;
use Koriym\QueryLocator\QueryLocatorInject;
use Koriym\Now\NowInterface;
use Koriym\HttpConstants\StatusCode;
use Koriym\HttpConstants\ResponseHeader;
use Ray\AuraSqlModule\AuraSqlInject;
use Ray\Di\Di\Assisted;

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

    /**
     * @Assisted("now")
     * @ReturnCreatedResource
     */
    public function onPost(
        string $user_id,
        string $title,
        string $description = '',
        string $status = 'drafted',
        NowInterface $now = null
    ) : ResourceObject {
        $value = [
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'created' => (string) $now,
            'updated' => (string) $now
        ];
        $this->pdo->perform($this->query['article_insert'], $value);
        $id = $this->pdo->lastInsertId();
        $this->code = StatusCode::CREATED;
        $this->headers[ResponseHeader::LOCATION] = "/article?id={$id}";

        return $this;
    }
}
