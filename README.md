# Shopthucung_Laravel

\*Chức năng

1.User
o Trang người dùng.
o Đăng ký tài khoản, đăng nhập người dùng
o Tìm kiếm phân trang sản phẩm
o Xem thêm sản phẩm
o Chi tiết sản phẩm
o Giỏ hàng
o Xem các đơn hàng đã mua
o xem trạng thái sản phẩm, thông tin sản phẩm, khách hàng
o Thanh toán COD, Thanh toán online VNPAY

2.Admin
o Trang quản trị
o Đăng nhập admin tk: admin@gmail.com mk: 123
o Tổng quan (Dashboard)
o Quản lý đơn hàng
o Quản lý sản phẩm
o Quản lý danh mục
o Thêm sửa xóa sản phẩm, danh mục CRUD, Search
o Thống kê doanh thu tổng quan

\*Yêu cầu cài đặt :Composer + Xampp.

Hướng dẫn cài đặt:
Bước 1: Giải nén tập tin .rar vừa tải về.

Bước 2: Mở Xampp start Apache, MySQL

Bước 3: Truy cập localhost/phpmyadmin tạo mới tên Database là larave
import file shopthucung_laravel/larave.sql và bấm chạy

Bước 4: Mở thư mục shopthucung_laravel lên và chạy terminal gõ 2 lệnh sau:

composer install
php artisan key:generate

Bước 5: Chỉnh lại file .env

Bước 6: Cuối cùng chạy lệnh

php artisan serve