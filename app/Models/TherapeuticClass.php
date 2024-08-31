<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TherapeuticClass extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    /**
     * A therapeutic class may have many subclasses (Sub1).
     *
     * @return HasMany
     */
    public function sub1(): HasMany
    {
        return $this->hasMany(TherapeuticSub1::class);
    }

    /**
     * Polymorphic relationship: Drugs related to this class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphOne
     */
    public function drug()
    {
        return $this->morphOne(Drug::class, 'therapeutic');
    }
}
