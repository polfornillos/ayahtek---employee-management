<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AEmployees extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function saveEmployee($data){
        return $this->create();
    }

    public function getEmployees(){
        return $this->all();
    }
}
