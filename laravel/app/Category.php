<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $table = 'category';

    protected $fillable = ['label', 'description'];

    /**
     * @return HasMany
     */
    public function Article(): HasMany
    {
        return $this->hasMany(Article::class);
    }

}
