<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CattleHistory extends Model
{
    use HasFactory;

    protected $table = 'cattle_history';

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'cattle_id',
        'event_date',
        'event_type',
        'description',
        'medication_used',
        'dose_administered',
        'veterinarian',
        'breeding_type',
        'sire_id',
        'dam_id',
        'breeding_date',
        'expected_birth_date',
        'birth_date',
        'calf_id',
        'birth_result',
        'weight',
        'handling_type',
        'handling_description',
        'movement_type',
        'destination',
    ];

    // Relação com o animal registrado no evento
    public function cattle()
    {
        return $this->belongsTo(Cattle::class, 'cattle_id');
    }

    // Relação com o reprodutor (pai)
    public function sire()
    {
        return $this->belongsTo(Cattle::class, 'sire_id');
    }

    // Relação com a mãe do bezerro
    public function dam()
    {
        return $this->belongsTo(Cattle::class, 'dam_id');
    }

    // Relação com o bezerro gerado no parto
    public function calf()
    {
        return $this->belongsTo(Cattle::class, 'calf_id');
    }
}
