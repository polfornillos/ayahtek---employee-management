<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    // save leave request
    public function saveLRequest($data) {
      return $this->create($data);
    }
}
