<?php

namespace App\Models;


use App\Events\WorkOrderCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('description', 'like', '%'. request('search'). '%')->orWhere(
                'created_at', 'like', '%'. request('search'). '%')->orWhere(
                    'id', 'like', '%'. request('search'). '%');
        }
    }

    protected $dispatchesEvents = [
        'created' => WorkOrderCreated::class,
    ];
}
