<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'santris';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        ''
    ];

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
