<?php

namespace App\Http\Requests;

use App\Models\Recipe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecipeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'category' => ['required', Rule::in(Recipe::CATEGORIES)],
            'cook_time' => 'required|string|max:100',
            'servings' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
            'ingredients' => 'required|string',
            'steps' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên món ăn.',
            'name.max' => 'Tên món ăn không được quá 255 ký tự.',
            'category.required' => 'Vui lòng chọn danh mục.',
            'category.in' => 'Danh mục không hợp lệ.',
            'cook_time.required' => 'Vui lòng nhập thời gian nấu.',
            'servings.required' => 'Vui lòng nhập khẩu phần.',
            'description.max' => 'Mô tả không được quá 1000 ký tự.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, webp.',
            'image.max' => 'Hình ảnh không được quá 5MB.',
            'ingredients.required' => 'Vui lòng nhập nguyên liệu.',
            'steps.required' => 'Vui lòng nhập các bước thực hiện.',
        ];
    }
}