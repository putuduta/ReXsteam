<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function transactionHeader()
    {
        return $this->belongsTo('App\Models\TransactionHeader', 'transaction_id', 'id');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'game_id', 'id');
    }
}
