<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $table = 'computers';
    protected $fillable = ['computer_name','model','operating_system','processor','memory','available'];
    public function issue()
    {
        return $this->hasMany(Issue::class,'computer_id','id');
    }
    public function getKeyName()
    {
        return $this->primaryKey;
    }
}
