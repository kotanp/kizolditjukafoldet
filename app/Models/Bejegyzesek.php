<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bejegyzesek extends Model
{
    use HasFactory;
    protected $table = 'bejegyzesek';
    public $timestamps = false;
    protected $fillable = [
        'tevekenyseg_id',
        'osztaly_id',
        'diak',
        'allapot',
    ];

    public function osztaly(){
        return $this->hasMany(Osztaly::class, 'id', 'osztaly_id');
    }

    public function tevekenyseg(){
        return $this->hasMany(Tevekenyseg::class, 'id', 'tevekenyseg_id');
    }
}
