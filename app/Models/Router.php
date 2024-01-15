<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip_address',
        'username',
        'password',
        'description',
        'enabled',
    ];

    protected $appends = [
        'status',
    ];

    public function getStatusAttribute(): string
    {
        return $this->enabled ? 'Enabled' : 'Disabled';
    }
}
