<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Disbursement extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::ulid();
            }
        });
    }

    protected $fillable = [
        'employee_id',
        'benefit_type_id',
        'amount',
        'date_deposited',
        'reference_number',
        'remarks',
        'encoded_by',
        'encoded_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function benefitType()
    {
        return $this->belongsTo(BenefitType::class);
    }

    public function encoder()
    {
        return $this->belongsTo(User::class, 'encoded_by');
    }
}
