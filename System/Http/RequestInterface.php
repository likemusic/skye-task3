<?php

namespace App\System\Http;

/**
 * Interface RequestInterface
 * @package App\System\Http
 */
interface RequestInterface
{
    /**
     * @return array
     */
    public function all() : array;
}