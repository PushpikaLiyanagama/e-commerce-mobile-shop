# E-commerce Website

This is a comprehensive E-commerce website built using PHP Laravel, HTML, CSS, and Bootstrap. The project includes an admin panel for managing products and a user interface for browsing and purchasing mobile phones. The website uses MySQL as its database.

## Features

### Admin Panel
- Add new products
- Update existing products
- Delete products

### User Interface
- View products
- Add products to cart
- View cart

## Technologies Used
- **Backend:** PHP Laravel
- **Frontend:** HTML, CSS, Bootstrap
- **Database:** MySQL

## Installation

### Prerequisites
- PHP >= 7.3
- Composer
- MySQL
- Node.js (for Laravel Mix)

### Steps

1. **Clone the repository**
    ```bash
    git clone https://github.com/PushpikaLiyanagama/e-commerce-mobile-shop.git
    cd your-repo-name
    ```

2. **Install dependencies**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Configure environment**
    - Copy the `.env.example` file to `.env`:
        ```bash
        cp .env.example .env
        ```
    - Update the `.env` file with your database configuration and other settings:
        ```dotenv
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=horizon_mobile
        DB_USERNAME=root
        DB_PASSWORD=""
        ```

4. **Generate application key**
    ```bash
    php artisan key:generate
    ```

5. **Run migrations**
    ```bash
    php artisan migrate
    ```

6. **Seed the database (optional)**
    ```bash
    php artisan db:seed
    ```

7. **Serve the application**
    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.

## Usage

### Admin Panel
1. Navigate to the admin panel at `http://localhost:8000/admin`.
2. Use the admin credentials to log in.
3. Manage products by adding, updating, or deleting them.

### User Interface
1. Navigate to the user interface at `http://localhost:8000`.
2. Browse products and add desired items to the cart.
3. View the cart and proceed with the checkout process.

## Contribution

Contributions are welcome! Please follow these steps:

1. **Fork the repository**
    ```bash
    git clone https://github.com/PushpikaLiyanagama/e-commerce-mobile-shop.git
    ```

2. **Create a new branch**
    ```bash
    git checkout -b feature/your-feature-name
    ```

3. **Make your changes**

4. **Commit your changes**
    ```bash
    git commit -m "Add your commit message"
    ```

5. **Push to the branch**
    ```bash
    git push origin feature/your-feature-name
    ```

6. **Create a Pull Request**

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)
