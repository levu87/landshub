
## Hướng dẫn  
##### Cmd
```
git clone https://github.com/quocsuu/do-an-tot-nghiep.git

```
#### Cấu hình database trong file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tên db
DB_USERNAME=root
DB_PASSWORD=root
```
```
composer i

php artisan migrate

php artisan db:seed

php artisan serve
```
### Bị 500:
   `php artisan key:generate`

> Check log (Xem báo lỗi) xem trong storage/logs/laravel-xxxx.log

### Connect mamp macbook
File config/database.php tìm thay bằng dòng này
`'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',`

### Thông tin test vnpay
```
Ngân hàng	NCB
Số thẻ	9704198526191432198
Tên chủ thẻ	NGUYEN VAN A
Ngày phát hành	07/15
Mật khẩu OTP	123456
```