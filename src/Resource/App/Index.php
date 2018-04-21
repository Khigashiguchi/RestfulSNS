<?php
namespace Khigashiguchi\RestfulSNS\Resource\App;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    public $body = [
        'message' => 'Welcome to the Khigashiguchi.RestfulSNS API !',
        '_links' => [
            'self' => [
                'href' => '/',
            ],
            'curies' => [
                'href' => 'http://localhost:8081/rels/{?rel}',
                'name' => 'kr',
                'templated' => true
            ],
            'kr:article' => [
                'href' => '/articles/{id}',
                'title' => 'articles item',
                'templated' => true
            ],
            'kr:articles' => [
                'href' => '/articles',
                'title' => 'article list'
            ]
        ]
    ];

    public function onGet()
    {
        return $this;
    }
}