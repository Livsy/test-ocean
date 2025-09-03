<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'category_id',
    ];

    protected $primaryKey = 'id';

    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticlesCategories::class, 'category_id', 'id');
    }
}
