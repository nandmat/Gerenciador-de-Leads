<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;
use App\Models\User;

class ContactHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lead_id',
        'contact_date',
        'resume'
    ];

    protected $casts = [
        'contact_date' => 'datetime'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function lead(){
        return $this->belongsTo(Lead::class);
    }
}
