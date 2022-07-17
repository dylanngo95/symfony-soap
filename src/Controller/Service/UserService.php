<?php

namespace App\Controller\Service;

use stdClass;

class UserService
{
    /**
     * @param $email
     * @return stdClass
     */
    public function user($email)
    {
        $user1 = new StdClass();
        $user1->email = "email1@$email";
        $user1->password = "1234";

        $user2 = new StdClass();
        $user2->email = "email2@$email";
        $user2->password = "1234";

        $userArray[] = $user1;
        $userArray[] = $user2;

        $users = new StdClass();
        $users->User = $userArray;
        return $users;
    }
}