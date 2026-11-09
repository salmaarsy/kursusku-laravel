<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'code',
        'name',
        'description',
        'fee',
        'quota',
        'start_date',
        'status',
    ];

    /**
     * Tipe data atribut model.
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
        ];
    }
}
