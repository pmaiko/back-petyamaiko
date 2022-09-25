<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalData extends Model
{
    static function getData () {
        return [
            "header" => [
                "menu" => [
                    "logo" => "< <span>P</span>etya <span>M</span>aiko <span>/></span>",
                    "items" => [
                        [
                            "label" => "Home",
                            "link" => "/"
                        ],
                        [
                            "label" => "Projects",
                            "link" => "/projects"
                        ],
                        [
                            "label" => "About Me",
                            "link" => "/about"
                        ],
                    ]
                ]
            ]
        ];
    }
}
