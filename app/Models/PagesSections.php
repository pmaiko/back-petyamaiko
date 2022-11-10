<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesSections extends Model
{
    use HasFactory;

  protected $table = "pages_sections";

  protected $guarded = [];

  public function pages () {
    $this->hasMany(Pages::class)->where();
  }
}
