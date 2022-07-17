<?php

namespace App\Controller\Service;

/**
 * Class HelloService
 */
class HelloService
{

    /**
     * @param $name
     * @return string
     */
    public function hello($name): string
    {
        // Todo logic
        return 'Hello, '. $name;
    }
}