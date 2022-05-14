<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Device extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $fillable = ['refresh'];

    public function mustBeRefreshed()
    {
        Log::info("Must be refreshed");
        $this->update(['refresh' => true]);
    }

    public function alreadyBeenRefreshed()
    {
        $this->update(['refresh' => false]);
    }
}
