# IT用語をマスターしよう！
## Run on: XAMPP (MariaDB & Apache)
Link code mẫu các màn guest: nhánh Initial
Link code mẫu các màn người dùng: [PHPGurukul](https://phpgurukul.com/old-age-home-management-system-using-php-and-mysql/#google_vignette)

* Hướng dẫn set up code mẫu PHP với VSCode và XAMPP:
1. Download và setup XAMPP (y như Google)
2. Tải và giải nén source code trong máy tính. VD đặt source code vào một folder có tên là ABC.
3. Copy folder ```ABC``` này và dán ```ABC``` vào trong folder ```htdocs``` của XAMPP.
* Tải database lên chạy trên PHPMyAdmin
1. Bật XAMPP Control Panel lên, ấn Start 2 mục là Apache và MariaDB.
2. Mở link [phpmyadmin](http://localhost/phpmyadmin)
3. Chú ý phần ```define('DB_NAME', 'tên gì đó');``` trong file ```includes/config.php``` khớp với tên của database.
4. Tạo một database tên giống như vậy
5. Import file sql đi kèm trong folder source code vào database vừa tạo
* Chạy localhost:
1. Mở browser và chạy link “http://localhost/ABC”
2. Student info: Eg: Student ID - 20205093, Class ID - 138000
3. Admin info: Eg: Username - admin, Password: 123456
* Đặt tên:
1. Project chung đặt chung tên tất cả mọi thứ: tên folder, tên database là ```jishotech```
# SRMS divided in two modules:
## GUEST:

## USER:

