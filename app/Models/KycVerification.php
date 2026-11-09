<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KycVerification extends Model
{
    protected $fillable = ['user_id', 'document_type', 'document_number', 'documents', 'reject_reason'];


    public function user() : belongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}
