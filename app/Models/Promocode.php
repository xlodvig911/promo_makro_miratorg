<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'promocode',
        'promo_user_id',
        'winner',
    ];

    public function promo_users() {
        return $this->belongsTo(PromoUser::class, 'promo_user_id', 'id');
    }
}
