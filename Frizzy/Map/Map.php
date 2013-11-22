<?php

/**
 * This file is part of frizzy/Map.
 *
 * @author  Bernard van Niekerk <frizzy@paperjaw.com>
 * @link    https://github.com/frizzy/Map
 * @license https://paperjaw.com/license
 * @package frizzy/Map
 * 
 * (c) 2013 Bernard van Niekerk
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Frizzy\Map;

use InvalidArgumentException;

/**
 * Map
 */
class Map extends MapAbstract
{
    private $items = array();
        
    /**
     * Set
     *
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        if (! is_scalar($key)) {
            throw InvalidArgumentException('Invalid key type');
        }
        $this->items[$this->normalizeKey($key)] = $value;
    }
    
    /**
     * Get
     *
     * {@inheritDoc}
     */
    public function get($key)
    {
        if (! $this->has($key)) {
            return null;
        }
        
        return $this->items[$this->normalizeKey($key)];
    }
    
    /**
     * Has
     *
     * {@inheritDoc}
     */
    public function has($key)
    {
        return array_key_exists($this->normalizeKey($key), $this->items);
    }
    
    /**
     * Remove
     *
     * {@inheritDoc}
     */
    public function remove($key)
    {
        unset($this->items[$this->normalizeKey($key)]);
    }
    
    /**
     * Keys
     *
     * {@inheritDoc}
     */
    public function keys()
    {
        return array_keys($this->items);
    }
    
    /**
     * Replace
     *
     * {@inheritDoc}
     */
    public function replace($items)
    {
        $this->items = array();
        foreach ($items as $key => $value) {
            $this->set($key, $value);
        }
    }
    
    /**
     * All
     *
     * {@inheritDoc}
     */
    public function all()
    {
        return $this->items;
    }
}
