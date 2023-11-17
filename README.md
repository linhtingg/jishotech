# IT用語をマスターしよう！
## Run on: XAMPP (MariaDB & Apache)

Link code mẫu tham khảo: [PHPGurukul](https://phpgurukul.com/old-age-home-management-system-using-php-and-mysql/#google_vignette)
<br/>
*Nên tải code mẫu về và chạy riêng ra một thư mục khác nhé.* <br/>
*Chủ yếu các chức năng xoay quanh session, lấy record từ database, foreach, form handling,...*
<br/>
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

## Lưu ý:
1. Project chung đặt chung tên tất cả mọi thứ: tên folder, tên database là ```jishotech```
2. Bỏ tạm MySQL đi đỡ conflict port 3306
3. Để ý folder làm việc. Các màn chức năng của user thì đều đặt ở trong folder ```user```
4. Bỏ phần session start ở đầu các file trong folder ```user``` đi (để đỡ phải đăng nhập)
5. Mỗi chức năng tạo một branch mới >> Sau khi code xong thì tạo pull request và merge vào main >> Đóng luôn branch  lại. Xong chức năng nào là xong oke luôn không phải quay lại nhiều.
6. Khi merge pull request vào main chỉ cần 1 người review là có thể merge 
*nhưng có thể by pass bằng tick vào force merge nếu lúc đó không nhờ được ai*
# JishoTech is divided in two modules:

## GUEST:

## USER:

