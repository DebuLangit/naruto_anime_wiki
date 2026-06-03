# Struktur MVC - PROGRESS 1

## 📁 Struktur Folder

```
PROGRESS 1/
├── Model/
│   ├── UserModel.php
│   ├── AuthModel.php
│   └── MerchandiseModel.php
│
├── Controller/
│   ├── AuthController.php
│   ├── DashboardController.php
│   ├── MerchandiseController.php
│   └── CharacterController.php
│
├── View/
│   ├── auth/
│   │   ├── login.php
│   │   └── logout.php
│   ├── user/
│   │   ├── dashboard.php
│   │   ├── merchandise.php
│   │   ├── detail_merchandise.php
│   │   ├── characters.php
│   │   ├── anime.php
│   │   ├── naruto.php
│   │   ├── boruto.php
│   │   └── shippuden.php
│   ├── css/
│   │   ├── dashboard.css
│   │   ├── login.css
│   │   ├── merchandise.css
│   │   └── style.css
│   ├── js/
│   │   ├── confirm.js
│   │   └── script.js
│   └── img/
│
└── index.php (Router utama)
```

## 🎯 Penjelasan Setiap Folder

### **Model/** - Database & Business Logic
Menangani semua interaksi dengan database dan logika bisnis.

- **UserModel.php** - Manage user data (CRUD)
- **AuthModel.php** - Handle authentication logic (login verification)
- **MerchandiseModel.php** - Manage merchandise data (CRUD)

### **Controller/** - Aplikasi Logic
Menangani request dari user dan memanggil Model/View yang sesuai.

- **AuthController.php** - Handle login/logout process
- **DashboardController.php** - Handle dashboard display
- **MerchandiseController.php** - Handle merchandise list & detail
- **CharacterController.php** - Handle character pages

### **View/** - User Interface
Menampilkan halaman HTML kepada user.

- **auth/** - Login & Logout pages
- **user/** - User pages (dashboard, merchandise, characters, dll)
- **css/** - All stylesheets
- **js/** - All JavaScript files
- **img/** - All images

## 🚀 Cara Menggunakan

### 1. Setup Database Connection
Edit `Model/` files untuk menambahkan database connection:
```php
public function __construct($database) {
    $this->db = $database;
}
```

### 2. Implement Model Methods
Lengkapi setiap method di folder Model dengan query database:
```php
public function getAllUsers() {
    $query = "SELECT * FROM users";
    return $this->db->query($query);
}
```

### 3. Implement Controller Logic
Lengkapi setiap method di folder Controller:
```php
public function index() {
    $users = $this->userModel->getAllUsers();
    include '../View/user/dashboard.php';
}
```

### 4. Add Assets
Pindahkan images ke folder `View/img/` dan update CSS/JS sesuai kebutuhan.

## 🔄 Request Flow

1. User akses `index.php?page=dashboard`
2. Router mengenali request dan instantiate Controller yang sesuai
3. Controller memanggil method dari Model untuk get data dari database
4. Controller include file View dan pass data
5. View menampilkan HTML dengan data tersebut

## 📝 Notes

- Semua file View sudah include session check untuk keamanan
- CSS dan JS files sudah di-link di setiap View
- Router utama di `index.php` untuk centralized request handling
- Struktur ini mengikuti MVC best practices

Selamat coding! 🎉
