<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContactHistory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',
        'last_contact'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'last_contact' => 'datetime'
    ];

    public function contactHistories()
    {
        return $this->hasMany(ContactHistory::class);
    }
}
