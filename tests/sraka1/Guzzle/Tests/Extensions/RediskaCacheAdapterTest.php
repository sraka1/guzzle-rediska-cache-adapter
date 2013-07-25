<?php

namespace sraka1\Guzzle\Tests\Extensions;

use \sraka1\Guzzle\Extensions\RediskaCacheAdapter;
use \Rediska;

class RediskaCacheAdapterTest extends \Guzzle\Tests\GuzzleTestCase
{

    /**
     * @var Rediska
     */
    private $cache;

    /**
     * @var RediskaCacheAdapter
     */
    private $adapter;

    protected function setUp()
    {
        parent::setUp();
        $this->cache = new Rediska();
        $this->adapter = new RediskaCacheAdapter($this->cache);
    }

    protected function tearDown()
    {
        $this->adapter = null;
        $this->cache = null;
        parent::tearDown();
    }

    public function testSave()
    {
        $this->assertTrue($this->adapter->save('id', 'data'));
    }

    public function testFetch()
    {
        $this->assertEquals('data', $this->adapter->fetch('id'));
    }

    public function testContains()
    {
        $this->assertTrue($this->adapter->contains('id'));
    }

    public function testDelete()
    {
        $this->assertEquals(1, $this->adapter->delete('id'));
    }
}
