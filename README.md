# Manajemen User API

API sederhana untuk mengelola data user (CRUD) menggunakan Laravel.

- **Framework:** Laravel
- **Database:** MySQL / SQLite (lihat konfigurasi `.env`)
- **Fitur utama:** create/read/update/delete user dengan validasi input dan respons JSON.

---

## 📦 Persiapan & Instalasi

1. **Clone repo**

```bash
git clone <repo-url>
cd manajemen-user-api
```

2. **Install dependencies**

```bash
composer install
```

3. **Konfigurasi `.env`**

```bash
cp .env.example .env
```

Atur koneksi database (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

4. **Generate aplikasi key**

```bash
php artisan key:generate
```

5. **Migrasi database**

```bash
php artisan migrate
```

6. **Jalankan server lokal**

```bash
php artisan serve
```

Default: `http://127.0.0.1:8000`

---

## 🔧 API Endpoints (User)

Semua endpoint berada di bawah base URL `/api/users`.

### 1) Ambil list user

- **Method:** GET
- **URL:** `/api/users`

### 2) Ambil detail user

- **Method:** GET
- **URL:** `/api/users/{id}`

### 3) Tambah user baru

- **Method:** POST
- **URL:** `/api/users`
- **Body (JSON)**
    - `name` (string, required)
    - `employee_id` (string, required, unik)
    - `email` (string, required, unik, format email)
    - `password` (string, required, min 6)
    - `position` (string, required)
    - `status` (string, required, nilai: `intern` atau `staff`)
    - `date_of_birth` (string, required, format `YYYY-MM-DD`)

### 4) Update user

- **Method:** PUT/PATCH
- **URL:** `/api/users/{id}`
- **Body (JSON)**
    - Dapat menyertakan satu atau beberapa field dari body `POST /api/users`
    - Field yang tidak disertakan tidak akan diubah

### 5) Hapus user

- **Method:** DELETE
- **URL:** `/api/users/{id}`

---

## ✅ Validasi Request

Validasi dikelola oleh form request:

- `App\Http\Requests\UserStoreRequest` (create)
- `App\Http\Requests\UserUpdateRequest` (update)

### Rules utama

- `name`: required, string, max 255
- `employee_id`: required, unik
- `email`: required, email, unik
- `password`: required (min 6)
- `position`: required, string
- `status`: required, `intern` atau `staff`
- `date_of_birth`: required, format `YYYY-MM-DD`

---

## 🧪 Testing API (Postman / Insomnia / curl)

Gunakan tools seperti Postman atau Insomnia untuk mengetes API. Contoh `curl`:

```bash
curl -X POST http://127.0.0.1:8000/api/users \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Jane Doe",
    "employee_id": "EMP-001",
    "email": "jane@example.com",
    "password": "secret123",
    "position": "Developer",
    "status": "staff",
    "date_of_birth": "1990-01-01"
  }'
```

---

## 📸 Dokumentasi / Screenshot API Testing

Sisipkan screenshot hasil testing atau dokumentasi API di bawah ini.

> **Tip:** Simpan gambar di folder `docs/screenshots/` atau `docs/images/` lalu referensikan di markdown.

### Contoh (ganti dengan file Anda sendiri)

![Create user](docs/screenshots/create-user.png)

![Get user list](docs/screenshots/list-users.png)

---

## 🧩 Struktur Proyek (singkat)

- `app/Http/Controllers/UserController.php` - CRUD user
- `app/Http/Requests/UserStoreRequest.php` - Validasi ketika membuat user
- `app/Http/Requests/UserUpdateRequest.php` - Validasi ketika mengubah user
- `routes/api.php` - Route API
- `database/migrations/` - Skema tabel `users`

---

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT.
