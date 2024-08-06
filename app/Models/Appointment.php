<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_date',
        'worker_id',
        'status',
        'user_id',
        'branch_id',
        'company_id'
    ];

    protected $dates = ['appointment_date'];

    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
