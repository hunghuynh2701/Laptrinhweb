<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests\RecipeRequest;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Danh sách công thức
     */
    public function index()
    {
        $recipes = Recipe::with(['user', 'ratings', 'comments'])
            ->latest()
            ->paginate(12);

        $categories = Recipe::CATEGORIES;

        return view('recipes.index', compact('recipes', 'categories'));
    }

    /**
     * Tìm kiếm công thức
     */
    public function search(Request $request)
    {
        $keyword = $request->get('q', '');
        
        $recipes = Recipe::with(['user', 'ratings', 'comments'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(12);

        $categories = Recipe::CATEGORIES;

        return view('recipes.index', compact('recipes', 'categories', 'keyword'));
    }

    /**
     * Lọc theo danh mục
     */
    public function byCategory($category)
    {
        $recipes = Recipe::with(['user', 'ratings', 'comments'])
            ->where('category', $category)
            ->latest()
            ->paginate(12);

        $categories = Recipe::CATEGORIES;
        $currentCategory = $category;

        return view('recipes.index', compact('recipes', 'categories', 'currentCategory'));
    }

    /**
     * Công thức của tôi
     */
    public function myRecipes()
    {
        $recipes = Recipe::with(['user', 'ratings', 'comments'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(12);

        $categories = Recipe::CATEGORIES;

        return view('recipes.my-recipes', compact('recipes', 'categories'));
    }

    /**
     * Form tạo công thức mới
     */
    public function create()
    {
        $categories = Recipe::CATEGORIES;
        return view('recipes.create', compact('categories'));
    }

    /**
     * Lưu công thức mới
     */
    public function store(RecipeRequest $request)
    {
        $data = $request->validated();

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        // Chuyển ingredients và steps thành array
        $data['ingredients'] = array_filter(
            array_map('trim', explode("\n", $data['ingredients']))
        );
        $data['steps'] = array_filter(
            array_map('trim', explode("\n", $data['steps']))
        );

        $data['user_id'] = auth()->id();

        Recipe::create($data);

        return redirect()->route('recipes.my')
            ->with('success', 'Đã đăng công thức thành công!');
    }

    /**
     * Xem chi tiết công thức
     */
    public function show(Recipe $recipe)
    {
        $recipe->load(['user', 'comments.user', 'ratings']);
        
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Form chỉnh sửa công thức
     */
    public function edit(Recipe $recipe)
    {
        // Kiểm tra quyền sở hữu
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa công thức này.');
        }

        $categories = Recipe::CATEGORIES;
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Cập nhật công thức
     */
    public function update(RecipeRequest $request, Recipe $recipe)
    {
        // Kiểm tra quyền sở hữu
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền chỉnh sửa công thức này.');
        }

        $data = $request->validated();

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        // Chuyển ingredients và steps thành array
        $data['ingredients'] = array_filter(
            array_map('trim', explode("\n", $data['ingredients']))
        );
        $data['steps'] = array_filter(
            array_map('trim', explode("\n", $data['steps']))
        );

        $recipe->update($data);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Đã cập nhật công thức thành công!');
    }

    /**
     * Xóa công thức
     */
    public function destroy(Recipe $recipe)
    {
        // Kiểm tra quyền sở hữu
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'Bạn không có quyền xóa công thức này.');
        }

        // Xóa ảnh nếu có
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('recipes.my')
            ->with('success', 'Đã xóa công thức thành công!');
    }
}
