<?php

namespace App;

class Truncater
{
    public static array $defaultOptions = [
        'length' => 50,
        'separator' => '...'
    ];
    
    private array $config;
    
    public function __construct(array $config = [])
    {
        $this->config = array_merge(self::$defaultOptions, $config);
    }
    
    public function truncate(string $text, array $options = []): string
    {
        $config = array_merge($this->config, $options);
        $maxLength = $config['length'];
        $separator = $config['separator'];
        
        if ($maxLength < 0) {
            return '';
        }
        
        if (mb_strlen($text) <= $maxLength) {
            return $text;
        }
        
        $trimLength = $maxLength - mb_strlen($separator);
        if ($trimLength < 0) {
            return mb_substr($separator, 0, $maxLength);
        }
        
        return mb_substr($text, 0, $trimLength) . $separator;
    }
}
