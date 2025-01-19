<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Engedélyezett mezők a tömeges hozzárendeléshez
    protected $fillable = [
        'user_id',
        'total_amount',
        'transaction_date',
    ];

    // Kapcsolat a User modellel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
