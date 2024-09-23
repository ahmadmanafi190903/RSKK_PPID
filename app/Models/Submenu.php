<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submenu extends Model
{
    use HasFactory;

    protected $table = 'submenus';

    protected $with = ['parent'];

    protected $guarded = ['id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
