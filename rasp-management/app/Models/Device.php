<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public function mustBeRefreshed()
    {
        $this->update(['refresh' => true]);
    }

    public function alreadyBeenRefreshed()
    {
        $this->update(['refresh' => false]);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function phrases()
    {
        return $this->belongsToMany(Phrase::class);
    }
}
