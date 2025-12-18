# Laptrinhwebbên m TÊN DỰ ÁN : WEBSITE CHIA SẺ CÔNG THỨC NẤU ĂN
dự án laravel


# THÀNH VIÊN THAM GIA GỒM
1. Nguyễn Hữu Kha          23CNTT2
2. Võ Duy Khải             23CNTT2
3. Vũ Xuân Tuấn            23CNTT2
4. Huỳnh Duy Hưng          23CNTT2
5. Nguyễn Hữu Tú           23CNTT1

# CÔNG NGHỆ SỬ DỤNG
1. Backend Framework: Laravel 10.x/11.x
- Eloquent ORM: Quản lý cơ sở dữ liệu thông qua các Model, giúp thao tác với bảng recipes, users, categories một cách trực quan.
- Blade Templating Engine: Xử lý hiển thị giao diện phía server-side, giúp tái sử dụng các thành phần (layout, component).
- Middleware: Kiểm soát quyền truy cập (ví dụ: chỉ user đã đăng nhập mới được đăng công thức).
- Laravel Mix/Vite: Quản lý và biên dịch các tài nguyên frontend (CSS, JS).

2. Cơ sở dữ liệu (Database): MySQL
- Lưu trữ thông tin người dùng, công thức, nguyên liệu và các bước thực hiện.
- Quản lý mối quan hệ (Relationships): 1 người dùng có nhiều công thức (1-n), 1 công thức thuộc về nhiều danh mục (n-n).

3. Frontend: HTML5,PHP
- Tailwind CSS (hoặc Bootstrap 5): Giúp xây dựng giao diện nhanh chóng, hỗ trợ Responsive (hiển thị tốt trên cả điện thoại và máy tính).
- Axios / Fetch API: Thực hiện các yêu cầu gửi dữ liệu không cần tải lại trang (ví dụ: khi người dùng nhấn "Like" hoặc "Lưu món ăn").

4. Các thư viện bổ trợ (Packages)
- Intervention Image: Xử lý hình ảnh món ăn (tự động cắt ảnh, nén dung lượng khi người dùng upload).
- Spatie Laravel Permission: Phân quyền rõ ràng giữa Admin (quản trị hệ thống) và Member (người chia sẻ công thức).
- Laravel Breeze/Jetstream: Cung cấp sẵn hệ thống Đăng ký/Đăng nhập chuẩn bảo mật.

5. Công cụ phát triển (Development Tools)
- Composer: Quản lý các thư viện PHP.
- NPM/Yarn: Quản lý các thư viện JavaScript.
- Git & GitHub: Quản lý mã nguồn và làm việc nhóm

# CÁCH CÀI ĐẶT VÀ CHẠY DỰ ÁN

1. Yêu cầu hệ thống (Prerequisites)
Trước khi bắt đầu, hãy đảm bảo máy tính đã cài đặt các công cụ sau:
- PHP (Phiên bản >= 8.1)
- Composer (Trình quản lý thư viện PHP)
- MySQL (Hệ quản trị cơ sở dữ liệu)
- Node.js & NPM (Để biên dịch giao diện)
2. 2. Các bước cài đặt chi tiết
- Bước 1: Tải mã nguồn về máy Nếu bạn sử dụng Git:
- Bước 2: Cài đặt các thư viện (Backend & Frontend)
- Bước 3: Cấu hình file môi trường (.env) Laravel sử dụng file .env . Tạo database
- Bước 4: Khởi chạy ứng dụng
