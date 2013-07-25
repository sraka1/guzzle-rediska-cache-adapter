<?php

namespace sraka1\Guzzle\Extensions;

use \Guzzle\Common\Cache\AbstractCacheAdapter;
use \Rediska as Cache;

class RediskaCacheAdapter extends AbstractCacheAdapter
{
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function contains($id)
    {
        return $this->cache->exists($id);
    }

    public function delete($id)
    {
        return $this->cache->delete($id);
    }

    public function fetch($id)
    {
        return $this->cache->get($id);
    }

    public function save($id, $data, $lifeTime = false)
    {
        if ($lifeTime != false) {
            return $this->cache->setAndExpire($id, $data, $lifeTime);
        } else {
            return $this->cache->set($id, $data);
        }
    }
}
