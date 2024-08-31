<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TherapeuticSub3 extends Model
{
    protected $table = 'therapeutic_sub3';

    public $timestamps = false;


    protected $fillable = ['name', 'sub2_id'];

    /**
     * Belongs to a sub2.
     *
     * @return BelongsTo
     */
    public function sub2(): BelongsTo
    {
        return $this->belongsTo(TherapeuticSub2::class);
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
