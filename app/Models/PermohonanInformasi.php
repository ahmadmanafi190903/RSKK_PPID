<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermohonanInformasi extends Model
{
    use HasFactory;

    protected $table = 'permohonan_informasi';

    protected $with = ['memperolehinformasi','mendapatkansalinaninformasi','status'];

    protected $guarded = ['id'];
    
    public function memperolehinformasi(): BelongsTo
    {
        return $this->belongsTo(MemperolehInformasi::class, 'id_memperoleh_informasi');
    }
    public function mendapatkansalinaninformasi(): BelongsTo
    {
        return $this->belongsTo(MendapatkanSalinanInformasi::class, 'id_mendapatkan_salinan_informasi');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'id_status');
    }

}
