<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TherapeuticSub2 extends Model
{
    protected $table = 'therapeutic_sub2';
    public $timestamps = false;
    protected $fillable = ['name', 'sub1_id'];

    /**
     * Belongs to a sub1.
     *
     * @return BelongsTo
     */
    public function sub1(): BelongsTo
    {
        return $this->belongsTo(TherapeuticSub1::class);
    }

    /**
     * A subclass (sub2) may have many sub3.
     *
     * @return HasMany
     */
    public function sub3(): HasMany
    {
        return $this->hasMany(TherapeuticSub3::class, 'sub2_id');
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
