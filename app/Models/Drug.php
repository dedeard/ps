<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Drug extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    /**
     * Polymorphic relationship to the therapeutic class or subclass.
     *
     * @return MorphTo
     */
    public function therapeutic(): MorphTo
    {
        return $this->morphTo();
    }
}
