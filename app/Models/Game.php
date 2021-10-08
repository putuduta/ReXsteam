<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'game';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'game_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Carts', 'game_id', 'id');
    }
}
