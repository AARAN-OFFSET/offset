<?php

namespace Aaran\Erp\Models\Production;

use Aaran\Master\Models\Contact;
use Database\Factories\Erp\Production\SectionOutwardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionOutward extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public static function search(string $searches)
    {
        return empty($searches) ? static::query()
            : static::where('vname', 'like', '%' . $searches . '%');
    }

    protected static function newFactory(): SectionOutwardFactory
    {
        return new SectionOutwardFactory();
    }

    public static function nextNo()
    {
        return static::max('vno') + 1;
    }

    public function jobcard(): BelongsTo
    {
        return $this->belongsTo(Jobcard::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
