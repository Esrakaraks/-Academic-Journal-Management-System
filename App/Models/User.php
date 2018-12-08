<?php
namespace App\Models;

use Core\Model;
use Core\Cookie;

class User extends Model{

    public function __construct() {
        parent::__construct("users");
    }}

  /*
  * public function getUsers() {
        return [
            [
                "ad" => "Emre",
                "soyad" => "Incu",
                "yas" => "26"
            ],
            [
                "ad" => "Emre",
                "soyad" => "Incu",
                "yas" => "26"
            ],
            [
                "ad" => "Emre",
                "soyad" => "Incu",
                "yas" => "26"
            ]
        ];
    }

    public function getUserById() {
        return [
            "user" => [
                "ad" => "Emre",
                "soyad" => "Incu",
                "yas" => "26"
            ]
        ];
    }

    public function isLoged() {
        return Cookie::exists("emre@gmail.com");
    }

    public function login() {
        
    }

    public function logout() {
        
    }
}*/
?>