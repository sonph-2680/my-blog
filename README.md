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

-   Chạy server dev của Laravel

    ```console
    $ php artisan serve
    ```

    > Ứng dụng sẽ chạy ở địa chỉ mặc định http://localhost:8000

## How to deploy

Để deploy project chúng ta cần setup server gồm nginx, php-fpm, mysql sau đó thực hiện pull code và deploy như bình thường.

1. Setup nginx, php-fpm, mysql, composer, git, nodejs, npm or yarn.
2. Config domain.
3. Publish your project.

Ngoài ra bạn có thể deploy bằng docker với việc sử dụng dockerfile trong thư mục docker của project.
