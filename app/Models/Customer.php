<?php

namespace App\Models;

use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('customer_name', 'like', '%'. request('search'). '%')->orWhere(
                'phone_number', 'like', '%'. request('search'). '%')->orWhere(
                    'address', 'like', '%'. request('search'). '%');
        }
    }
}
