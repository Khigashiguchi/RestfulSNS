<?php
namespace Khigashiguchi\RestfulSNS\Resource\Page;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;
use BEAR\Resource\ResourceObject;
use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase
{
    /**
     * @var ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = (new AppInjector('Khigashiguchi\RestfulSNS', 'app'))->getInstance(ResourceInterface::class);
    }

    public function testOnGet()
    {
        $ro = $this->resource->uri('page://self/index')(['name' => 'BEAR.Sunday']);
        /* @var Index $ro  */
        $this->assertSame(200, $ro->code);
        $this->assertSame('Hello BEAR.Sunday', $ro['greeting']);

        return $ro;
    }

    /**
     * @depends testOnGet
     */
    public function testView(ResourceObject $ro)
    {
        $json = json_decode((string) $ro);
        $this->assertSame('Hello BEAR.Sunday', $json->greeting);
    }
}
