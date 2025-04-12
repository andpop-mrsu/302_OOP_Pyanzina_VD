<?php

use PHPUnit\Framework\TestCase;
use App\Truncater;

class TruncaterTest extends TestCase
{
    private string $fio = 'Пьянзина Виктория Денисовна';
    
    public function testEmptyString()
    {
        $truncater = new Truncater();
        $this->assertSame('', $truncater->truncate(''));
    }
    
    public function testDefaultConfigNoTruncation()
    {
        $truncater = new Truncater();
        $this->assertSame($this->fio, $truncater->truncate($this->fio));
    }
    
    public function testTruncationWithLength10()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fio, ['length' => 10]);
        $expected = mb_substr($this->fio, 0, 10 - mb_strlen('...')) . '...';
        $this->assertSame($expected, $result);
    }
    
    public function testTruncationWithLength50()
    {
        $truncater = new Truncater();
        $this->assertSame($this->fio, $truncater->truncate($this->fio, ['length' => 50]));
    }
    
    public function testTruncationNegativeLength()
    {
        $truncater = new Truncater();
        $this->assertSame('', $truncater->truncate($this->fio, ['length' => -10]));
    }
    
    public function testTruncationWithCustomSeparatorAndLength10()
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->fio, ['length' => 10, 'separator' => '*']);
        $expected = mb_substr($this->fio, 0, 9) . '*';
        $this->assertSame($expected, $result);
    }
    
    public function testTruncationWithCustomSeparatorOnly()
    {
        $truncater = new Truncater();
        $this->assertSame($this->fio, $truncater->truncate($this->fio, ['separator' => '*']));
    }
    
    public function testObjectWithOverriddenDefaultConfig()
    {
        $truncater = new Truncater(['length' => 10]);
        $result = $truncater->truncate($this->fio);
        $expected = mb_substr($this->fio, 0, 10 - mb_strlen('...')) . '...';
        $this->assertSame($expected, $result);
    }

    public function testObjectWithDefaultConfig()
    {
        $truncater = new Truncater();
        $this->assertSame($this->fio, $truncater->truncate($this->fio));
    }
}
