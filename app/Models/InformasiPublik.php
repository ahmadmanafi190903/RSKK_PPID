<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InformasiPublik extends Model
{
    use HasFactory;

    protected $table = 'informasi_publik';

    protected $guarded = ['id'];

    protected $with = ['kategori', 'infopubdet'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriInformasi::class, 'kategori_informasi_id');
    }

    public function infopubdet(): HasMany
    {
        return $this->hasMany(InformasiPublikDetail::class);
    }
}
