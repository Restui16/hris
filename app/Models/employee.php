<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik_ktp', 
        'nip', 
        'department_id', 
        'job_id', 
        'first_name', 
        'last_name', 
        'gender', 
        'religion', 
        'date_of_birth', 
        'phone_number', 
        'address'
    ];

   public function Department(): BelongsTo
   {
        return $this->belongsTo(Department::class);
   }

   public function Job(): BelongsTo
   {
        return $this->belongsTo(Job::class);
   }
}
