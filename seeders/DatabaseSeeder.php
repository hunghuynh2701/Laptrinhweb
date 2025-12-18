<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo user mẫu
        $user1 = User::create([
            'name' => 'Chef Minh',
            'email' => 'minh@cookshare.com',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'Chef Hương',
            'email' => 'huong@cookshare.com',
            'password' => Hash::make('password'),
        ]);

        $user3 = User::create([
            'name' => 'Chef Lan',
            'email' => 'lan@cookshare.com',
            'password' => Hash::make('password'),
        ]);

        $user4 = User::create([
            'name' => 'Chef Thảo',
            'email' => 'thao@cookshare.com',
            'password' => Hash::make('password'),
        ]);

        // Tạo Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cookshare.com',
            'password' => Hash::make('admin123'),
        ]);

        // Công thức mẫu với hình ảnh từ Unsplash
        Recipe::create([
            'user_id' => $user1->id,
            'name' => 'Phở Bò Hà Nội',
            'category' => 'Món chính',
            'cook_time' => '2 giờ',
            'servings' => '4 người',
            'description' => 'Phở bò truyền thống với nước dùng đậm đà, thơm ngon. Món ăn đặc trưng của ẩm thực Việt Nam.',
            'image' => 'https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?w=800&q=80',
            'ingredients' => ['500g xương bò', '300g thịt bò tái', '200g thịt bò chín', '1kg bánh phở tươi', '2 củ hành tây', '1 củ gừng lớn', 'Hoa hồi, quế, thảo quả', 'Hành lá, ngò gai, húng quế', 'Nước mắm, muối, đường'],
            'steps' => ['Ninh xương bò trong 4-5 giờ với lửa nhỏ', 'Nướng hành tây và gừng cho thơm rồi cho vào nồi nước dùng', 'Cho các loại gia vị hoa hồi, quế, thảo quả vào túi vải', 'Nêm nếm nước dùng với nước mắm, muối, đường', 'Thái thịt bò mỏng, chuẩn bị rau ăn kèm', 'Trụng bánh phở qua nước sôi', 'Xếp bánh phở, thịt bò vào tô, chan nước dùng nóng', 'Thêm hành lá, rau thơm và thưởng thức'],
            'created_at' => now(),
        ]);

        Recipe::create([
            'user_id' => $user2->id,
            'name' => 'Bánh Flan Caramel',
            'category' => 'Tráng miệng',
            'cook_time' => '45 phút',
            'servings' => '6 người',
            'description' => 'Bánh flan mềm mịn với lớp caramel ngọt thơm, tan chảy trong miệng.',
            'image' => 'https://images.unsplash.com/photo-1528975604071-b4dc52a2d18c?w=800&q=80',
            'ingredients' => ['6 quả trứng gà', '400ml sữa đặc có đường', '400ml sữa tươi không đường', '150g đường trắng', '1 thìa cà phê vani', '50ml nước lọc'],
            'steps' => ['Thắng caramel: Đun đường với nước đến khi có màu nâu hổ phách', 'Đổ caramel vào khuôn, xoay đều để phủ đáy', 'Đánh tan trứng với sữa đặc và sữa tươi', 'Thêm vani, lọc hỗn hợp qua rây', 'Đổ hỗn hợp vào khuôn đã có caramel', 'Hấp cách thủy 30-35 phút với lửa nhỏ', 'Để nguội rồi cho vào tủ lạnh 2-3 giờ', 'Úp ngược ra đĩa và thưởng thức'],
            'created_at' => now(),
        ]);

        Recipe::create([
            'user_id' => $user3->id,
            'name' => 'Trà Sữa Trân Châu',
            'category' => 'Đồ uống',
            'cook_time' => '30 phút',
            'servings' => '2 ly',
            'description' => 'Trà sữa thơm ngon với trân châu đường đen dai giòn, ngọt ngào.',
            'image' => 'https://images.unsplash.com/photo-1558857563-b371033873b8?w=800&q=80',
            'ingredients' => ['100g bột năng', '50g đường đen', '2 túi trà đen', '200ml sữa tươi', '100ml sữa đặc', 'Đá viên', 'Nước sôi'],
            'steps' => ['Nấu trân châu: Trộn bột năng với nước đường đen nóng', 'Nhào bột đến khi mịn, cán mỏng và cắt viên nhỏ', 'Luộc trân châu trong nước sôi đến khi nổi lên', 'Vớt ra ngâm trong nước đường đen', 'Pha trà đen đậm với nước sôi, để nguội', 'Trộn trà với sữa tươi và sữa đặc', 'Cho trân châu vào ly, thêm đá', 'Đổ trà sữa vào và thưởng thức'],
            'created_at' => now(),
        ]);

        Recipe::create([
            'user_id' => $user4->id,
            'name' => 'Gỏi Cuốn Tôm Thịt',
            'category' => 'Món phụ',
            'cook_time' => '25 phút',
            'servings' => '4 người',
            'description' => 'Gỏi cuốn tươi mát với tôm, thịt luộc và rau sống, chấm nước mắm chua ngọt.',
            'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800&q=80',
            'ingredients' => ['200g tôm sú', '200g thịt ba chỉ luộc', '10 bánh tráng', '100g bún tươi', 'Xà lách, rau thơm các loại', 'Giá đỗ', 'Tỏi, ớt, chanh', 'Nước mắm, đường'],
            'steps' => ['Luộc tôm chín, bóc vỏ và bổ đôi', 'Luộc thịt ba chỉ chín, thái lát mỏng', 'Chuẩn bị rau sống: rửa sạch, để ráo', 'Nhúng bánh tráng qua nước ấm cho mềm', 'Đặt rau, bún, tôm, thịt lên bánh tráng', 'Cuộn chặt tay, gấp mép hai bên', 'Pha nước mắm: nước mắm + đường + chanh + tỏi + ớt', 'Chấm gỏi cuốn với nước mắm và thưởng thức'],
            'created_at' => now(),
        ]);

        Recipe::create([
            'user_id' => $user2->id,
            'name' => 'Canh Rau Củ Chay',
            'category' => 'Món chay',
            'cook_time' => '20 phút',
            'servings' => '4 người',
            'description' => 'Canh rau củ thanh đạm, bổ dưỡng cho sức khỏe với các loại rau củ tươi ngon.',
            'image' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd?w=800&q=80',
            'ingredients' => ['2 củ cà rốt', '2 củ khoai tây', '200g đậu hũ', '100g nấm hương', '200g rau cải ngọt', 'Hành lá, ngò rí', 'Muối, tiêu, nước tương'],
            'steps' => ['Sơ chế rau củ: gọt vỏ, cắt miếng vừa ăn', 'Ngâm nấm hương cho nở, cắt bỏ chân', 'Đun sôi nước dùng chay', 'Cho cà rốt và khoai tây vào nấu trước', 'Thêm nấm hương và đậu hũ', 'Cho rau cải vào sau cùng', 'Nêm nếm với muối, nước tương', 'Rắc hành lá, ngò rí và thưởng thức'],
            'created_at' => now(),
        ]);

        Recipe::create([
            'user_id' => $user1->id,
            'name' => 'Bún Chả Hà Nội',
            'category' => 'Món chính',
            'cook_time' => '1 giờ',
            'servings' => '4 người',
            'description' => 'Bún chả thơm lừng với thịt nướng than hoa đậm vị, đặc sản Hà Nội.',
            'image' => 'https://images.unsplash.com/photo-1529692236671-f1f6cf9683ba?w=800&q=80',
            'ingredients' => ['500g thịt ba chỉ', '300g thịt nạc vai xay', '500g bún tươi', 'Rau sống các loại', 'Nước mắm, đường, tỏi, ớt', 'Giấm, chanh', 'Hành khô, tiêu'],
            'steps' => ['Ướp thịt ba chỉ với nước mắm, đường, tỏi, tiêu', 'Trộn thịt xay với gia vị, nặn thành viên', 'Nướng thịt trên than hoa đến chín vàng', 'Pha nước mắm: nước mắm + đường + giấm + tỏi + ớt', 'Đun sôi nước mắm pha, để nguội', 'Chuẩn bị bún và rau sống', 'Xếp thịt nướng vào bát nước mắm', 'Ăn kèm bún, rau sống và nem cua bể'],
            'created_at' => now(),
        ]);

        $this->command->info('✅ Đã tạo dữ liệu mẫu thành công!');
        $this->command->info('📧 Tài khoản demo: admin@cookshare.com / admin123');
    }
}
