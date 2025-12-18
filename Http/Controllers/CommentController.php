<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Thêm bình luận
     */
    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận.',
            'content.max' => 'Bình luận không được quá 1000 ký tự.',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'recipe_id' => $recipe->id,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Đã thêm bình luận!');
    }

    /**
     * Xóa bình luận
     */
    public function destroy(Comment $comment)
    {
        // Kiểm tra quyền sở hữu
        if ($comment->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền xóa bình luận này.');
        }

        $comment->delete();

        return back()->with('success', 'Đã xóa bình luận!');
    }
}
