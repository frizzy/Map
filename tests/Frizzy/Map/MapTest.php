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
 * MapTest
 */
class MapTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAndGet()
    {
        $items = $this->getInstance();
        $value  = 'testValue';
        $items->set($this->getTestKey(), $value);
        $this->assertEquals($value, $items->get($this->getTestKey()));
        
        return $items;
    }
    
    /**
     * @depends testSetAndGet
     */
    public function testUnset($items)
    {
        $items->remove($this->getTestKey());
        $this->assertNull($items->get($this->getTestKey()));
        
        return $items;
    }
    
    /**
     * @depends testUnset
     */
    public function testNotHas($items)
    {
        $this->assertTrue(! $items->has($this->getTestKey()));
    }
    
    public function testHas()
    {
        $offset1 = 'offset1';
        $items = $this->getInstance(array($offset1 => 'offsetValue1'));
        $this->assertTrue($items->has($offset1));
        $offset2 = 'offset2';
        $items->set($offset2, 'offsetValue2');
        $this->assertTrue($items->has($offset2));
        
        return $items;
    }
    
    /**
     * @depends testHas
     */
    public function testReplace($items)
    {
        $items->replace(array());
        $this->assertCount(0, $items->all());
        $items->replace(array($this->getTestKey() => 'value'));
        $this->assertCount(1, $items->all());
        
        return $items;
    }
    
    /**
     * @depends testReplace
     */
    public function testCountable($items)
    {        
        $this->assertCount(1, $items);
    }
    
    public function testIterator()
    {
        $expectedValues = array('one' => 1, 'two' => 2);
        $items = $this->getInstance($expectedValues);
        $values = array();
        $count  = 0;
        foreach ($items as $key => $value) {
            $count++;
            $values[$key] = $value;
        }
        $this->assertCount($count, $expectedValues);
        $this->assertEquals($values, $expectedValues);   
    }
    
    private function getTestKey()
    {
        return 'testKey';
    }
    
    private function getInstance(array $items = array())
    {
        return new Map($items);
    }
}