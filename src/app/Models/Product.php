<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
    ];

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    }
    public function scopeSort($query, $key)
    {
        if ($key == 1) {
            $query->orderBy('price', 'desc');
        } elseif ($key == 2) {
            $query->orderBy('price', 'asc');
        }
        return $query;
    }

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Season::class, 'product_season','product_id', 'season_id');
    }
}
