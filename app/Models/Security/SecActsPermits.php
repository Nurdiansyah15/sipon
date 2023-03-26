<?php

namespace App\Models\Security;

use App\Models\Santri;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecActsPermits extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sec_acts_permits';

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
    public function activity()
    {
        return $this->hasOne(SecActs::class, "id", "sec_acts_id");
    }
}
