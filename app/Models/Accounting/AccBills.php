<?php

namespace App\Models\Accounting;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccBills extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'acc_bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];
}
