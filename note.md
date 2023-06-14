# DỰ ÁN WEBSITE HỌC TRỰC TUYẾN


## DANH CHO NGƯỜI DÙNG
- Hiển thị danh sách khoa học
- Hiển thị thông tin chi tiết khóa học
- Hiển thị danh sách tn tức
- Hiển thị chi tiết tin tức
- Phân quyền khóa học cho học viên
- Xem video bài giảng
- Download tài liệu bài giảng
- Học thử bài giảng
- Giỏ hàng
- Đăng ký/Đăng nhập
- Mua khóa học
- Trang tài khoản : Thông tin ca nhân, khóa học của tôi

## Dành cho quản tri

- Quản lý danh mục
- Quản lý học viên
- Quản lý khóa học
- Quản lý giảng viên
- Quản lý bài giảng
- Quản lý danh mục tin tức
- Quản lý tin tức
- Quản lý người dùng ( Quản lý hệ thống )
- Kích hoạt khóa học cho học viên
- Phân quyền quản trị hệ thống
- Báo cáo, thông kê ....
- Quản lý file tài liệu
- Quản lý đơn hàng
- Quản lý video 


## API

- Xây dựng API hoàn chỉnh

## Phân tích Database


1. Table categories => Quản lý danh mục (đã tạo)

- id => int
- name => varchar(200)
- slug => varchar(200)
- parent_id => int
- created_at => timestamp
- updated_at => timestamp

2. Table courses => Quản lý khóa học (đã tạo)

- id => int
- name => varchar (255)
- slug => varchar (255)
- detail => text
- teacher_id => int
- thumbnail => varchar(255) ->để cuối
- price => float
- sale_price => float
- code => varchar (100)
- durations =>float -> tính tự động từng video của khóa học
- is_document => tinyint
- supports => text
- status => tinyint
- created_at => timestamp
- updated_at => timestamp

3. Table lessions => Quản lý bài giảng

- id =>int
- name =>varchar(200)
- slug => varchar(200)
- video_id => int
- document_id => int
- parent_id => int
- is_trial => tinyint
- views => int
- position => int
- duration => float
- description => text
- created_at => timestamp
- updated_at => timestamp

4. Table category_courses => Trung gian liên kết giữa danh mục và khóa học (đã tạo)


- id => int
- category_id => int
- course_id => int
- created_at => timestamp
- updated_at => timestamp

5. Table teachers => Giảng viên (đã tạo)

- id => int
- name => varchar(100)
- slug => varchar(100)
- description => text
- epx => float
- image =>  varchar(255)
- created_at => timestamp
- updated_at => timestamp

6. Table videos => Quản lý video bài giảng

- id => int
- name => varchar(255)
- url => varchar(255)
- created_at => timestamp
- updated_at => timestamp


7. Table document => Quản lý tài liệu bài giảng

- id => int
- name => varchar(255)
- url => varchar(255)
- size => float
- created_at => timestamp
- updated_at => timestamp


8. Table category_posts => Quản lý danh mục tin tức (đã tạo)

- id => int
- name => varchar(200)
- slug => varchar(200)
- parent_id => int
- created_at => timestamp
- updated_at => timestamp

9. Table posts => Quản lý bài viết (đã tạo)

- id => int
- title => varchar(255)
- slug => varchar(255)
- content => text
- exceprt => text ('đoạn trích')
- thumbnail => varchar(255)
- category_post_id => int
- created_at => timestamp
- updated_at => timestamp

10. Table students => Quản lý học viên 

- id => int
- name => varchar(100)
- email => varchar(100)
- phone => varchar(20)
- password => varchar(100)
- address => varchar(200)
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

11. Table student_courses => Trung gian học viên và khóa học

- id => int
- course_id => int
- student_id => int
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

12. Table orders => Quản lý đơn đăng ký của học viên

- id => int
- student_id => int
- total => float
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

13. Table order_detail => chi tiết đơn hàng

- id => int
- order_id => int
- course_id => int
- price => float
- created_at => timestamp
- updated_at => timestamp

14. Table order_status => Quản lý trạng thái đơn hàng

- id => int
- name => varchar(200)
- created_at => timestamp
- updated_at => timestamp

15.  Table users => Quản trị hệ thống (đã tạo)

- id => int
- name => varchar(100)
- email => varchar(100)
- password => varchar(100)
- group_id => int
- created_at => timestamp
- updated_at => timestamp

16. Table groups => Quản trị nhóm người dùng (đã tạo)

- id => int
- name => varchar(100)
- permissions => text
- created_at => timestamp
- updated_at => timestamp

17. Table modules => Danh sách các module trong trang quản trị

- id => int
- name => varchar(200)
- title => varchar(200)
- role => text
- created_at => timestamp
- updated_at => timestamp

18. Table options => Quản lý các thiết lập (đã tạo)

- id => int
- name => varchar(100)
- value => text
- created_at => timestamp
- updated_at => timestamp

## Cài đặt Project và kết nối với Github

composer create-project laravel/laravel 

### Kết nối với Github

- Đăng ký tài khoản Github (Nếu có rồi hãy đăng nhập)
- Tạo Repository
- Kết nối với folder project trên máy tính
- Push code lên Github

### Quy trinh update code len github
- git add .
- git commit -m "Noi dung update"
- git push
+ clear cache git
- git rm -r --cached

### Cai dat laravel module
#### add layout
##### Tạo migrations -seeders - Chuận bị giao diện
- modules nào thì quản lý migrations đó
- có thể chạy 1 lần hết migrations hoặc chạy từng migration
- tạo seeder khi cần php artisan make:seeder UserSeeder
- sự dụng DB hoặc models để tạo seeder dữ liệu
- Chạy seeders bằng lệnh theo class
-- php artisan db:seed --class=Modules\User\seeders\UserSeeder
- sự dụng phân trang serve
- tạo table cho list user
- tạo form trang thêm user
#### tạo repository và các phương thức cần thiết
- Hiện thị danh sách user ( có phân trang )
- Thêm user
- Sửa user
- Xóa user
- Lấy thông tin user(detail)
** chú ý: nếu không thì đặt biệt thì sự dung BaseRepository luôn vì đủ phương thức, những phương thức khác thì tạo thêm bên UserRepository
- vì hiện thị danh sách user theo phân trang nên ta tạo thêm phương thức bên UserRepositoryInterface (chỉ định nghĩa thêm $limit)
- viết phương thức xử lý bên UserRepository
- nhớ đăng ký Repository trong ModuleServiceProvider trong phương thức register
- viết phương thức reset password (vì sửa user không cần sửa password)
- viết phương thức check Password sự dụng Hash::check($password,$hashPassword) lấy hash password find($id)
### xử lý from request validations
- tạo request UserRequest  (lệnh UserRequset php artisan make:request UserRequest)
- chuyển Request xuống đúng Modules
- viết các cái rules và messages
- hiện thị ra giao diện 
*** thêm 'middleware'=>'web' trong namespace trong route 
### viết chức năng thêm user
- nếu thêm thất bại thì nhớ lại dữ liệu của người dùng nhập vào sự dụng old('tên biến') trong value
- tạo message bằng lang/en
- tạo validation để tối ưu request trong lang/en
#### viết chức năng hiện thi danh sách user 
- sự dung datatables.net
- lấy các cnd của css và js và jquyery
- sự dụng serve side để lấy dự liệu 
- sự dụng serve side thì không có tbody trong tabel
- copy {
        processing: true,
        serverSide: true,
        ajax: 'scripts/server_processing.php',
    }
     cho vào file script trong datatable
- @yield('scripts') trong layouts master
- viết file scripts trong php theo modules
- viết function data để lấy dự liệu ra thành file json
    public function data(){
        $users=$this->userRepo->getAll();
        return response()->json($users);
    }
- Router gọi phương thức data ra
- viết thêm hàm  getAllUsers() trong UserRepository
- lấy route function data thay vào scripts
    $(document).ready(function(){
        $("#datatable").DataTable(
            {
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.users.data')}}",
            }
        );
    });
- tìm hiểu columns data trong datatable
"columns": [
    { "data": "engine" },
    { "data": "browser" },
    { "data": "platform" },
    { "data": "version" },
    { "data": "grade" }
  ]

  ///
- packge datatable của laravel
Installing Laravel DataTables
Laravel DataTables can be installed with Composer. More details about this package in Composer can be found here.

Run the following command in your project to get the latest version of the package:

composer require yajra/laravel-datatables-oracle:"^10.3.1"
If you are using most of the DataTables plugins like Buttons & Html, you can alternatively use the all-in-one installer package.

Laravel 9
composer require yajra/laravel-datatables:"^9.0"
Laravel 10
composer require yajra/laravel-datatables:^10.0
Configuration
This step is optional if you are using Laravel 5.5+

Open the file config/app.php and then add following service provider.

'providers' => [
    // ...
    Yajra\DataTables\DataTablesServiceProvider::class,
],
After completing the step above, use the following command to publish configuration & assets:

php artisan vendor:publish --tag=datatables
$users=$this->userRepo->getAllUsers();
        return DataTables::of($users)
        ->addColumn('edit','<a href="#" class="btn btn-warning">Sửa</a>')
        ->addColumn('delete','<a href="#" class="btn btn-danger">Xóa</a>')
        ->rawColumns(['edit', 'delete'])
        ->toJson();
seed thêm dự liệu

 kiểm tra câu lệnh sql bằng debug bar laravel
 - composer require barryvdh/laravel-debugbar --dev
 - thêm service provider
 'Debugbar' => Barryvdh\Debugbar\Facades\Debugbar::class,
 - chạy lệnh 
 php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"

  
- định dạng lại thời gian cột created_at sử dụng Carbon ,format('d/m/Y H:i:s')
### viết chức năng cập nhật user
- route hiện thị sửa 
- sửa lại UserRequest để cập nhật lại user, để lưu ại email không bị trùng
- kiểm tra lại id và sửa lại rules
### viết chức năng xóa user
- viết js trong file script trong public
- sử dụng thư viện sweetAlert để cảnh báo trước khi xóa.
- sử dụng Route delete thì serve phải hỗ trợ
- đặt lại name cho route
#### quản lý categories crud
- tạo modules
- tạo các route trong route.php
- tạo migration 
### tối ưu slug
thêm function slu vào script


khi onchange="" thay đổi




### courses
- tạo migrations
- tạo controller
- tích hợp ckeditor
- tích hợp filemanager
----
composer require unisharp/laravel-filemanager
 php artisan vendor:publish --tag=lfm_config
 php artisan vendor:publish --tag=lfm_public
 php artisan storage:link
 khi cài xong thì vào gile .env
 thay APP_URL http://127.0.0.1:8000

  Thêm vào trong file ckeditor
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };

  <div class="mb-3">
                <div class="row align-items-end">
                    <div class="col-7">
                        <label for="">Ảnh đại diện</label>
                        <input type="text" id="thumbnail" name="thumbnail" value="{{old('thumbnail')}}" class="form-control @error('thumbnail') is-invalid @enderror" id=""
                        placeholder="Ảnh đại diện...">
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-2 d-grid">
                        <button type="button"  class="btn btn-primary" id="lfm" data-input="thumbnail"
                        data-preview="holder">
                            <i class="fa fa-save"></i> Chọn ảnh
                        </button>
                    </div>
                    <div class="col-3">
                        <div id="holder">
                        </div>
                    </div>
                </div>
            </div>
     chỉnh sửa thêm file lfm.php trong configs
     chỉnh filesystems.php trong configs để bỏ tên miền ảo để lưu tên file
routes.php

Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

### viết formRequest và validation
### viết function create
### viết sửa delete courses

### viết chương trình relationship courses với categories
- tạo migration
- tạo model CourseCategory.php
- thiết lập relationship cho 2 bảng
- tạo danh sách hiện thi các chuyên mục
- copy function helper để sử dụng lại để làm ckeckbox
- thêm name vào value input trong function và thêm categories required


### Xây dựng Modules quản lý khóa học

### Xây dựng Modules Quản lý giảng viên

### Thiết lập ràng buộc khóa học và giảng viên
-- Ràng buộc khóa ngoại 
=> Nếu giảng viên  bị xóa => Các khóa học  liên quan đến giảng viên sẽ bị xóa 
-- Ràng buộc  hình ảnh
+ 1 hình ảnh sử dụng nhiều nơi => xóa 1 bản ghi => xóa ảnh
+ Tạo 1 modules Media (Database) => khi chọn ảnh ở các module => bật popup của module media
### thiết lập menu Item
- tạo balde menu-item
- check show từng menu
- 
### thiết lập Auth --bootstrap
- composer require laravel/ui
- php artisan ui bootstrap --auth
- 




