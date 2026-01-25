<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
        'department_id',
        'priority', // low, medium, high, urgent
        'status',   // pending, in_review, resolved, closed
        'assigned_to',
        'attachment',
    ];

    protected $casts = [
        'attachment' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function assignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(ComplaintNotification::class);
    }

    // في Model Complaint
public function getStatusColorAttribute()
{
    return match($this->status){
        'pending'   => 'bg-warning bg-opacity-25',
        'in_review' => 'bg-info bg-opacity-25',
        'resolved'  => 'bg-success bg-opacity-25',
        'closed'    => 'bg-secondary bg-opacity-25',
        default     => 'bg-light',
    };
}

 // ====== STATUS ======
    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            'pending'   => 'قيد الانتظار',
            'in_review' => 'قيد المراجعة',
            'resolved'  => 'تم الحل',
            'closed'    => 'مغلقة',
            default     => 'غير معروف',
        };
    }

    public function getStatusBadgeAttribute()
    {
        return match ($this->status) {
            'pending'   => 'warning',
            'in_review' => 'info',
            'resolved'  => 'success',
            'closed'    => 'secondary',
            default     => 'dark',
        };
    }

    // ====== PRIORITY ======
    public function getPriorityTextAttribute()
    {
        return match ($this->priority) {
            'low'    => 'منخفضة',
            'medium' => 'متوسطة',
            'high'   => 'مرتفعة',
            'urgent' => 'عاجلة',
            default  => 'غير محددة',
        };
    }

    public function getPriorityBadgeAttribute()
    {
        return match ($this->priority) {
            'low'    => 'secondary',
            'medium' => 'primary',
            'high'   => 'warning',
            'urgent' => 'danger',
            default  => 'dark',
        };
    }

}