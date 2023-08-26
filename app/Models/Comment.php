<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable=[
        'user_id',
        'product_id'
        ,'body'
    ];
    protected $guarded = [];
    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
    /**
*Get the user that owns the Wishlist
*
* @return \Illuminate\Database\Eloquent\Relations\BelongsTo
*/

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');

    }


}
