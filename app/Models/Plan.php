<?php

namespace App\Models;

use App\Enum\DataUnit;
use App\Enum\LimitType;
use App\Enum\PlanType;
use App\Enum\PlanTypeBp;
use App\Enum\TimeUnit;
use App\Enum\ValidityUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bandwidth_id',
        'price',
        'type',
        'typebp',
        'limit_type',
        'time_limit',
        'time_unit',
        'data_limit',
        'data_unit',
        'validity',
        'validity_unit',
        'shared_users',
        'router_id',
        'is_radius',
        'pool_id',
        'pool_expired_id',
        'enabled',
    ];

    protected $casts = [
        'type' => PlanType::class,
        'typebp' => PlanTypeBp::class,
        'time_unit' => TimeUnit::class,
        'limit_type' => LimitType::class,
        'data_unit' => DataUnit::class,
        'validity_unit' => ValidityUnit::class,
    ];

    public function bandwidth(): BelongsTo
    {
        return $this->belongsTo(Bandwidth::class);
    }

    public function router(): BelongsTo
    {
        return $this->belongsTo(Router::class);
    }

    public function pool_expired(): BelongsTo
    {
        return $this->belongsTo(Pool::class, 'pool_expired_id');
    }

    public function pool(): BelongsTo
    {
        return $this->belongsTo(Pool::class, 'pool_id');
    }
}
