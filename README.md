# 🐶 The Dog House

A modern **Laravel web application** that lets users explore adorable dog images using the **Dog CEO API**, filter by breed, save favorites, and view.

Built with **Laravel**, **Tailwind CSS**, and **SQLite**

---

## ✨ Features

- 🐕 Fetch random dog images
- 🐾 Filter dogs by breed
- ❤️ Save favorite dogs
- 🗑 Delete favorites
- 📱 Fully responsive design

---

## 🛠 Tech Stack

| Technology | Purpose |
|----------|--------|
| Laravel | Backend framework |
| Tailwind CSS | Styling & layout |
| SQLite | Lightweight database |
| Dog CEO API | External dog image API |
| Blade | Server-side templating |
| PHP 8+ | Programming language |

## 🚀 Getting Started (Local Setup)

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/dog-house.git
cd dog-house
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure SQLite
```bash
touch database/database.sqlite
```
Update .env:
```bash
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Compile Assets
```bash
npm run dev
```
### 7. Start the Server
```bash
php artisan serve
```
Open:
```bash
http://127.0.0.1:8000
```
