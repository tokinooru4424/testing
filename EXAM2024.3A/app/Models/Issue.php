<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $table = 'issues';
    protected $fillable = ['computer_id','reported_by','reported_date','description','urgency','status'];
    public function computer(){
        return $this->belongsTo(Computer::class,'computer_id','id');
    }
    public function getKeyName()
    {
        return $this->primaryKey;
    }
}
