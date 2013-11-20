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

/**
 * MapInterface
 */
interface MapInterface
{
    /**
     * Set
     *
     * @param scalar $offset Offset
     * @value mixed  $value  Value
     */
    public function set($key, $value);
    
    /**
     * Get
     *
     * @param scalar $key Key
     *
     * @param mixed Value
     */
    public function get($key);
    
    /**
     * Has
     *
     * @param scalar $key Key
     *
     * @param boolean Key exists
     */
    public function has($key);
    
    /**
     * Remove
     *
     * @param scalar $key Key
     */
    public function remove($key);
    
    /**
     * Keys
     *
     * @return array Keys
     */
    public function keys();
    
    /**
     * All
     *
     * @return array All paramters
     */
    public function all();
    
    /**
     * Replace
     *
     * @param array|Iterator $items Items
     */
    public function replace($items);
}