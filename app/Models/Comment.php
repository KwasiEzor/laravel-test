<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // protected $fillable = ['content'];  // accepte seulement le champ indiqué dans le tableau
    protected $guarded = [];  // peut tout accepter

    public function commentable()
    {
        return $this->morphTo();
    }
}
