<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'section_id',
        'class_id',
        'name',
        'email',
        'phone',
        'address',
    ];

    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }

    public function sections(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
