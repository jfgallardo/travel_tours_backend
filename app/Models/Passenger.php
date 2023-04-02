<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'email',
        'id_cpf',
        'date_birth',
        'phone',
        'number_passport',
        'pass_validity',
        'pass_issue',
        'contry_issue',
        'contry_residence'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}