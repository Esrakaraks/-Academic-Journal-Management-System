<?php
namespace Core;

use Core\Cookie;

class Language {

    public function setLanguage($language) {
        Cookie::set("language", $language);
    }

    public function getLanguage() {
        return Cookie::get("language");
    }
    
}