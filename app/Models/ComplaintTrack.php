<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintTrack extends Model
{
    protected $guarded = [];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }




    public function getStatusTextAttribute()
{
    return [
        'pending'    => 'قيد الانتظار',
        'in_review'  => 'قيد المراجعة',
        'resolved'   => 'تم الحل',
        'closed'     => 'مغلقة'
    ][$this->status] ?? $this->status;
}

public function getStatusBadgeAttribute()
{
    return [
        'pending'    => 'warning',
        'in_review'  => 'info',
        'resolved'   => 'success',
        'closed'     => 'secondary'
    ][$this->status] ?? 'secondary';
}

public function getPriorityTextAttribute()
{
    return [
        'low'    => 'منخفضة',
        'medium' => 'متوسطة',
        'high'   => 'عالية',
        'urgent' => 'طارئة'
    ][$this->priority] ?? $this->priority;
}

public function getPriorityBadgeAttribute()
{
    return [
        'low'    => 'secondary',
        'medium' => 'primary',
        'high'   => 'warning',
        'urgent' => 'danger'
    ][$this->priority] ?? 'secondary';
}

public function getStatusColorAttribute()
{
    return [
        'pending'    => 'bg-warning',
        'in_review'  => 'bg-info',
        'resolved'   => 'bg-success',
        'closed'     => 'bg-secondary'
    ][$this->status] ?? 'bg-secondary';
}



}
