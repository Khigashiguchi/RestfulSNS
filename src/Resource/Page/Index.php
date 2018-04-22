<?php
namespace Khigashiguchi\RestfulSNS\Resource\Page;

use BEAR\Resource\ResourceObject;
use Koriym\HttpConstants\StatusCode;

class Index extends ResourceObject
{
    public $code = StatusCode::MOVED_PERMANENTLY;

    public $headers = [
        'Location' => '/articles'
    ];

    public function onGet() : ResourceObject
    {
        return $this;
    }
}
