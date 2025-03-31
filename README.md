<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Kitabi - Children's Digital Library

## Project Description

"Kitabi" is an interactive digital platform designed to provide a comprehensive library for children, featuring:

-   Illustrated digital books
-   Educational and entertaining audio content
-   Educational videos
-   Interactive quizzes to assess children's understanding after reading or watching content
-   A blog section where educational articles are published

Children can also create their own accounts to track their progress.

---

## Technologies Used

-   **Laravel 12**: For backend management and server-side rendering
-   **Blade & JavaScript**: For dynamic user interface creation
-   **CSS & Bootstrap**: For responsive and user-friendly design

---

## Running the Project

### 1. Install Required Dependencies

Ensure you have the following installed on your system:

-   **PHP** (version 8.2 or higher recommended)
-   **Composer**
-   **MySQL** (or any database supported by Laravel)
-   **Node.js & NPM** (for frontend tools)

### 2. Install Dependencies and Start the Application

```sh
# Clone the repository
git clone https://github.com/menaehab/kitabi.git
cd kitabi

# Install Laravel dependencies
composer install

# Install NPM packages
npm install && npm run dev

# Set up the environment file
cp .env.example .env

# Generate the application key
php artisan key:generate

# Set up the database
php artisan db:seed AdminSeeder

# Start the local server
php artisan serve
```

---

## Key Features

✅ A comprehensive children's library with books, videos, and audio content
✅ Support for personal child accounts to track progress
✅ Interactive quizzes after consuming content
✅ Regularly published educational articles
✅ Responsive and easy-to-use design with Bootstrap

---

## Contribution

If you would like to contribute to the development of this project, please follow these steps:

1. **Fork** the repository
2. Create a new branch for your feature (`git checkout -b feature-new`)
3. Make the necessary changes and push the updates (`git commit -m "Added new feature" && git push origin feature-new`)
4. Submit a **Pull Request** for code review

---

## Additional Information

If you have any questions or suggestions, feel free to reach out via email or open an **Issue** on the repository.
