<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_nis_santri');
    }
}
