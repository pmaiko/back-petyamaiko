<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesBlocks extends Model
{
    use HasFactory;

  protected $table = "pages_blocks";

  protected $guarded = [];

  public function pages () {
    $this->hasMany(Pages::class)->where();
  }
}
