<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "l_request";

    // save leave request
    public function saveLRequest($data) {
      return $this->create($data);
    }

    public function getLRequests() {
      return $this->all();
    }
}
