<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'created_at',
        'updated_at',
    ];

    protected $primaryKey = 'id';

    public function article(): BelongsTo
    {
        return $this->belongsTo(Articles::class, 'post_id', 'id');
    }
}
