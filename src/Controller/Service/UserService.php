<?php

namespace App\Controller\Service;

class UserService
{
    /**
     * @param $email
     * @param $password
     * @return string
     */
    public function user($email, $password): string
    {
        return "Your email is " . $email . '-' . $password;
    }
}