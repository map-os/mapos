<?php

namespace App\Models;

use App\Events\ProductCreatedEvent;
use App\Events\ProductDeletedEvent;
use App\Events\ProductUpdatedEvent;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToTenant;

class Product extends Model
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
        'barcode',
        'purchase_price',
        'sale_price',
        'unit',
        'quantity_in_stock',
        'minimum_quantity_in_stock',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'quantity_in_stock' => 'integer',
        'minimum_quantity_in_stock' => 'integer',
    ];

    /**
     * The events that the model fires.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ProductCreatedEvent::class,
        'updated' => ProductUpdatedEvent::class,
        'deleted' => ProductDeletedEvent::class,
    ];
}
