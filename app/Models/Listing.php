<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * A Listing has many Click records
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    /**
     * A User has many Listing records
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Tag has many Listing records
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
