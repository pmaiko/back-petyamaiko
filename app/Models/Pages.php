<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
  use HasFactory;

  protected $table = "pages";

  protected $guarded = [];

  public function blocks () {
    return $this->hasMany(PagesBlocks::class, 'page_id');
  }
}
