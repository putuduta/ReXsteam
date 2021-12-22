<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = 'transaction_headers';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
