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

use Countable;
use ArrayAccess;
use IteratorAggregate;
use ArrayIterator;

/**
 * MapAbstract
 */
abstract class MapAbstract implements Countable, ArrayAccess, IteratorAggregate, MapInterface
{
    /**
     * Normalize offset
     *
     * @param scalar $offset Offset
     *
     * @return scalar Normalized offset
     */
    protected function normalizeKey($offset)
    {
        return $offset;
    }
    
    /**
     * Count (Countable)
     *
     * @return integer Count items
     */
    public function count()
    {
        return count($this->keys());
    }
    
    /**
     * Offset exists (ArrayAccess)
     *
     * @param scalar $offset Offset
     *
     * @return boolean Key exists
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }
    
    /**
     * Offset get (ArrayAccess)
     *
     * @param scalar $offset Offset
     *
     * @return mixed Value
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }
    
    /**
     * Offset set (ArrayAccess)
     *
     * @param scalar $offset Offset
     * @param mixed  $value  Value
     */
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }
    
    /**
     * Offset unset (ArrayAccess)
     *
     * @param scalar $offset Offset
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }
    
    /**
     * Get iterator (IteratorAggregate)
     *
     * @return ArrayIterator Iterator
     */    
    public function getIterator()
    {
        return new ArrayIterator($this->all());
    }
}