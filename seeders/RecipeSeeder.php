<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo user mẫu - dùng firstOrCreate để tránh trùng lặp
        $users = [
            User::firstOrCreate(
                ['email' => 'minh@example.com'],
                ['name' => 'Chef Minh', 'password' => bcrypt('password')]
            ),
            User::firstOrCreate(
                ['email' => 'huong@example.com'],
                ['name' => 'Chef Hương', 'password' => bcrypt('password')]
            ),
            User::firstOrCreate(
                ['email' => 'lan@example.com'],
                ['name' => 'Chef Lan', 'password' => bcrypt('password')]
            ),
        ];

        // Công thức mẫu
        $recipes = [
            [
                'user_id' => $users[0]->id,
                'name' => 'Phở Bò Hà Nội',
                'category' => 'Món chính',
                'cook_time' => '2 giờ',
                'servings' => '4 người',
                'description' => 'Phở bò truyền thống với nước dùng đậm đà, thơm ngon.',
                'ingredients' => ['500g xương bò', '300g thịt bò', '1kg bánh phở', 'Hành tây, gừng', 'Gia vị: hoa hồi, quế, thảo quả'],
                'steps' => ['Ninh xương bò trong 3-4 giờ', 'Nướng hành và gừng cho thơm', 'Cho gia vị vào nước dùng', 'Thái thịt bò mỏng', 'Trụng bánh phở và thưởng thức'],
            ],
            [
                'user_id' => $users[1]->id,
                'name' => 'Bánh Flan Caramel',
                'category' => 'Tráng miệng',
                'cook_time' => '45 phút',
                'servings' => '6 người',
                'description' => 'Bánh flan mềm mịn với lớp caramel ngọt thơm.',
                'ingredients' => ['6 quả trứng', '400ml sữa đặc', '400ml sữa tươi', '150g đường', 'Vani'],
                'steps' => ['Thắng caramel với đường', 'Đổ caramel vào khuôn', 'Trộn trứng với sữa', 'Hấp bánh 30 phút', 'Để nguội và úp ra đĩa'],
            ],
            [
                'user_id' => $users[2]->id,
                'name' => 'Trà Sữa Trân Châu',
                'category' => 'Đồ uống',
                'cook_time' => '30 phút',
                'servings' => '2 ly',
                'description' => 'Trà sữa thơm ngon với trân châu dai giòn.',
                'ingredients' => ['100g bột năng', '50g đường đen', 'Trà đen', 'Sữa tươi', 'Đá viên'],
                'steps' => ['Nấu trân châu từ bột năng', 'Pha trà đen đậm', 'Trộn trà với sữa', 'Thêm trân châu và đá', 'Thưởng thức'],
            ],
            [
                'user_id' => $users[0]->id,
                'name' => 'Gỏi Cuốn Tôm Thịt',
                'category' => 'Món phụ',
                'cook_time' => '25 phút',
                'servings' => '4 người',
                'description' => 'Gỏi cuốn tươi mát với tôm và thịt luộc.',
                'ingredients' => ['200g tôm', '200g thịt ba chỉ', 'Bánh tráng', 'Bún tươi', 'Rau sống các loại'],
                'steps' => ['Luộc tôm và thịt', 'Chuẩn bị rau sống', 'Nhúng bánh tráng', 'Cuốn gỏi', 'Pha nước chấm'],
            ],
            [
                'user_id' => $users[1]->id,
                'name' => 'Canh Rau Củ Chay',
                'category' => 'Món chay',
                'cook_time' => '20 phút',
                'servings' => '4 người',
                'description' => 'Canh rau củ thanh đạm, bổ dưỡng cho sức khỏe.',
                'ingredients' => ['Cà rốt', 'Khoai tây', 'Đậu hũ', 'Nấm hương', 'Rau cải'],
                'steps' => ['Sơ chế rau củ', 'Đun nước dùng chay', 'Cho rau củ vào nấu', 'Nêm gia vị', 'Múc ra bát và thưởng thức'],
            ],
        ];

        foreach ($recipes as $recipeData) {
            // Dùng firstOrCreate để tránh trùng lặp
            Recipe::firstOrCreate(
                ['name' => $recipeData['name'], 'user_id' => $recipeData['user_id']],
                $recipeData
            );
        }
    }
}