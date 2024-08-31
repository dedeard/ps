<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TherapeuticSub1 extends Model
{
    protected $table = 'therapeutic_sub1';
    public $timestamps = false;
    protected $fillable = ['name', 'therapeutic_class_id'];

    /**
     * Belongs to a therapeutic class.
     *
     * @return BelongsTo
     */
    public function therapeuticClass(): BelongsTo
    {
        return $this->belongsTo(TherapeuticClass::class);
    }

    /**
     * A subclass (sub1) may have many sub2.
     *
     * @return HasMany
     */
    public function sub2(): HasMany
    {
        return $this->hasMany(TherapeuticSub2::class, 'sub1_id');
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
