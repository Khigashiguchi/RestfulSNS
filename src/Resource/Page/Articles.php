<?php
namespace Khigashiguchi\RestfulSNS\Resource\Page;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\ResourceObject;

class Articles extends ResourceObject
{
    /**
     * @Embed(rel="articles", src="app://self/articles")
     */
    public function onGet() : ResourceObject
    {
        return $this;
    }
}
