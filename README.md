# 🧪 Filament Test Repo - Search on related fields (User posts)

This Laravel project was created to test the **search in Filament on relationships**, in particular to enable the search for a user via the **title of their posts**.

---

## 🚀 Installation

### 1. clone repository and install dependencies

```bash
git clone <url-du-repo>
cd <name-du-repo>
composer install
npm install && npm run build
```

### 2. Environment configuration

For this test this is not necessary, I pushed .env

---

### 3. Launch migrations

```bash
php artisan migrate
```

---

### 4. Create a Filament user

```bash
php artisan make:filament-user
```

Use any information like : 
```bash
name: Test
email: test@gmail.com
password: test1234
```

---

### 5. Populate the database

```bash
php artisan db:seed
```

> This creates several users with 5 posts each, whose `title` can be used for searching.

---

### 6. Launch the server

```bash
php artisan serve
```

Then access : 
**[http://localhost:8000/admin/users](http://localhost:8000/admin/users)** 
You can search for users by typing a keyword contained in the **title of one of their posts**.
