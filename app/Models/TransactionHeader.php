<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $table = "transaction_header";

    protected $guarded = [];

    public function transactionDetail()
    {
        return  $this->hasMany(TransactionDetail::class, 'transaction_header_id', 'id');
    }

    public function user()
    {
        return  $this->hasOne(Login::class, 'id', 'user_id');
    }
}
