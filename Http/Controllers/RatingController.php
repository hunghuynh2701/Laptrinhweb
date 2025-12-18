<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Thêm hoặc cập nhật đánh giá
     */
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ], [
            'rating.required' => 'Vui lòng chọn số sao.',
            'rating.min' => 'Đánh giá phải từ 1 đến 5 sao.',
            'rating.max' => 'Đánh giá phải từ 1 đến 5 sao.',
        ]);

        // Cập nhật hoặc tạo mới (updateOrCreate)
        Rating::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'recipe_id' => $recipe->id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return back()->with('success', 'Đã đánh giá ' . $request->rating . ' sao!');
    }
}
