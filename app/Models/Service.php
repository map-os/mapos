<?php

namespace App\Models;

use App\Events\ServiceCreatedEvent;
use App\Events\ServiceDeletedEvent;
use App\Events\ServiceUpdatedEvent;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToTenant;

class Service extends Model
{
    use BelongsToTenant;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * The events that the model fires.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ServiceCreatedEvent::class,
        'updated' => ServiceUpdatedEvent::class,
        'deleted' => ServiceDeletedEvent::class,
    ];
}
