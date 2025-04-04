<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'police_number',
        'national_id',
        'date_of_conscription',
        'discharge_from_conscription',
        'governorate',
        'phone_number',
        'medical_condition',
        'confidentiality',
        'authority',
        'job',
        'notes',
        'special_case',
        'start_date',
        'regiment_id',
    ];

    // العلاقة مع Regiment (Soldier ينتمي إلى Regiment)
    public function regiment()
    {
        return $this->belongsTo(Regiment::class);
    }

    // العلاقة مع Leave (Soldier يمكن أن يكون له العديد من Leaves)
    public function leaves()
    {
        return $this->hasMany(Leave::class);
        
    }

    
}
