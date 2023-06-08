<?php

namespace App\Models\Security;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Santri;


class SecHomePermits extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sec_home_permits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function santri()
    {
        return $this->hasOne(Santri::class, "nis", "nis");
    }
}
