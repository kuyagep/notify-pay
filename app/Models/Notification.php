<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Notification extends Model
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
        'disbursement_id',
        'notification_type',
        'message_content',
        'status',
        'sent_at',
        'sent_by',
        'error_logs',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    // Relationship: Notification belongs to a disbursement
    public function disbursement(): BelongsTo
    {
        return $this->belongsTo(Disbursement::class);
    }

    // Relationship: Sent by user
    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}
