<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory , HasFactory;
    protected $table = 'website';

    protected $fillable = [
        'user_id',
        'g_view_id',
        'website_name',
        'website_status',
    ];
}
