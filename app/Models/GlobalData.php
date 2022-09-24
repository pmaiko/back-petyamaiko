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
                            "label" => "Works",
                            "link" => "/works"
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
