## Local setup

-   Cài đặt các package composer

    ```console
    $ composer install
    ```

-   Cài đặt các package node

    ```console
    $ npm install
    ```

-   Compile `app.scss`

    ```console
    $ npm run dev
    ```

-   Copy file `.env` và chỉnh sửa các biến môi trường

    ```console
    $ cp .env.example .env
    ```

    > Cần khởi chạy một database trước và chú ý chỉnh sửa các biến **DB**


-   Migrate database

    ```console
    $ php artisan migrate
    ```
-   Tạo `APP_KEY`
    ```console
    $ php artisan key:generate
    ```

-   Chạy server dev của Laravel

    ```console
    $ php artisan serve
    ```

    > Ứng dụng sẽ chạy ở địa chỉ mặc định http://localhost:8000

## Deploy to Heroku

> Để deploy project, chúng ta cần chuẩn bị:
> - Một tài khoản [Heroku](https://heroku.com) 
> - Tạo một app mới trong heroku
> - Cài đặt [Heroku CLI](https://devcenter.heroku.com/articles/heroku-cli#download-and-install) phù hợp với hệ điều hành và login
> ```console
> $ heroku login
> ```

-   Tạo một database cho app tại tab **Resources**
    ![Peek 2021-10-05 09-03](https://user-images.githubusercontent.com/82442432/135949176-5be12a9e-1046-495a-ba5f-72008aac9b1a.gif)

-   Để xem thông tin database vừa tạo, chọn database và truy cập **Settings** > **View Credentials**
    ![2021-10-05_09-16](https://user-images.githubusercontent.com/82442432/135949752-1ba9971e-30ea-4ea6-894c-781b89efd2d7.png)

-   Thêm buildpack `nodejs` và `php` trong section **Buildpacks** tại tab **Settings**. Chú ý cần thêm đúng thứ tự.
    ![Peek 2021-10-05 09-06](https://user-images.githubusercontent.com/82442432/135949252-6eae81d9-3222-4ea0-b857-ee878c6e242d.gif)

-   Cũng tại tab **Settings**, chọn **Reveal Config Vars** để thêm các biến môi trường tương tự file `.env` của project
    ![2021-10-05_10-09](https://user-images.githubusercontent.com/82442432/135953951-6a39b02e-c10c-4fe4-974a-b9f28b37ccc5.png)
    > Chú ý thêm biến `USE_NPM_INSTALL = true` để Heroku càu đặt các package nodejs cần thiết khi deploy
    
-   Tạo `Procfile` có nội dung như sau tại thư mục gốc của project
    ```console
    $ echo web: vendor/bin/heroku-php-apache2 public/ > Procfile
    ```
    
-   Thêm git remote của Heroku app vào project
    ```console
    $ heroku git:remote -a [your_app_name]
    ```

-   Đẩy code lên repository của Heroku app
    ```console
    $ git push heroku [your_branch:]master
    ```
    
-   Kiểm tra đã `build` và `deploy` thành công hay chưa trên Heroku dashboard. Nếu đã thành công, chọn `Run console` và chạy `php artisan migrate` để tạo các bảng cần thiết trong database.   
    ![2021-10-05_09-55](https://user-images.githubusercontent.com/82442432/135952936-3d95df52-1c20-4cca-ab31-2ce5f3bb9a15.png)
    
-   Sau khi migrate thành công, chọn `Open app` để mở trang web đã được deploy
    > http://my-blog-demo-app.herokuapp.com/

