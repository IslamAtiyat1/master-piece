<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Payment extends Model
{
    // SELECT `id`, `card_number`, `cvv`, `expire`, `created_at`, `updated_at`, `user_id` FROM `payments` WHERE 1
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'card_number',
        'cvv',
        'expire',
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
