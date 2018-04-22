<?php
namespace Khigashiguchi\RestfulSNS\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;

class Article extends ResourceObject
{
    /**
     * @Embed(rel="article", src="app://self/article{?id}")
     */
    public function onGet(int $id) : ResourceObject
    {
        return $this;
    }
}