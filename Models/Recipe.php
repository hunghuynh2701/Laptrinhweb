<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'cook_time',
        'servings',
        'description',
        'image',
        'ingredients',
        'steps',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
    ];

    /**
     * Các danh mục công thức
     */
    public const CATEGORIES = [
        'Món chính',
        'Món phụ',
        'Tráng miệng',
        'Đồ uống',
        'Món chay',
    ];

    /**
     * Quan hệ với User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quan hệ với Comments
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    /**
     * Quan hệ với Ratings
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    /**
     * Tính điểm đánh giá trung bình
     */
    public function getAverageRatingAttribute(): float
    {
        return $this->ratings()->avg('rating') ?? 0;
    }

    /**
     * Đếm số lượng đánh giá
     */
    public function getRatingsCountAttribute(): int
    {
        return $this->ratings()->count();
    }

    /**
     * Lấy đánh giá của user hiện tại
     */
    public function getUserRatingAttribute(): ?int
    {
        if (!auth()->check()) {
            return null;
        }
        
        $rating = $this->ratings()->where('user_id', auth()->id())->first();
        return $rating ? $rating->rating : null;
    }

    /**
     * Scope tìm kiếm
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('name', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%")
              ->orWhereJsonContains('ingredients', $keyword);
        });
    }

    /**
     * Scope lọc theo danh mục
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
