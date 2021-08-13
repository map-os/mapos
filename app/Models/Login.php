<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use BelongsToTenant, HasFactory;

    protected $guarded = [];
}
