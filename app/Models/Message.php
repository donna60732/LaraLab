<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id', 'content'];
}
