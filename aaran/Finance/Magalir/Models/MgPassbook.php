<?php

namespace Aaran\Finance\Magalir\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MgPassbook extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    public function mgClub(): BelongsTo
    {
        return $this->belongsTo(MgClub::class);
    }

    public function mgMember(): BelongsTo
    {
        return $this->belongsTo(MgMember::class);
    }

    public function mgLoan(): BelongsTo
    {
        return $this->belongsTo(MgLoan::class);
    }
}
