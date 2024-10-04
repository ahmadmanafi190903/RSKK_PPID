<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestAnswar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'quest_answars';
}
