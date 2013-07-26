<?php

namespace sraka1\Guzzle\Extensions;

use Guzzle\Cache\AbstractCacheAdapter;
use Rediska as Cache;

class RediskaCacheAdapter extends AbstractCacheAdapter
{
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function contains($id, array $options = NULL)
    {
        return $this->cache->exists($id, $options);
    }

    public function delete($id, array $options = NULL)
    {
        return $this->cache->delete($id, $options);
    }

    public function fetch($id, array $options = NULL)
    {
        return $this->cache->get($id, $options);
    }

    public function save($id, $data, $lifeTime = false, array $options = NULL)
    {
        if ($lifeTime != false) {
            return $this->cache->setAndExpire($id, $data, $lifeTime);
        } else {
            return $this->cache->set($id, $data);
        }
    }
}
