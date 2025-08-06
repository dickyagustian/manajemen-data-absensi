# Sistem Absensi Karyawan - Laravel 11 CRUD

## Deskripsi
Sistem manajemen absensi karyawan yang dibangun dengan Laravel 11. Aplikasi ini memungkinkan pencatatan kehadiran karyawan dengan fitur check-in dan check-out.

## Fitur Utama

### ✅ CRUD Lengkap
- **Create**: Tambah data absensi baru
- **Read**: Lihat semua data absensi dengan filter
- **Update**: Edit data absensi dan check-out
- **Delete**: Hapus data absensi

### ✅ Fitur Khusus
- **Check-in**: Pencatatan waktu datang otomatis
- **Check-out**: Tombol untuk mengisi waktu pulang
- **Filter**: Pencarian berdasarkan tanggal dan bulan
- **Status**: Hadir, Izin, Sakit dengan badge berwarna

## Struktur Database

### Tabel: `absensi`
```sql
- id (Primary Key, Auto Increment)
- nama_karyawan (String)
- tanggal (Date)
- jam_datang (Time)
- jam_pulang (Time, Nullable)
- status (Enum: 'Hadir', 'Izin', 'Sakit')
- created_at (Timestamp)
- updated_at (Timestamp)
```

## Instalasi dan Setup

### 1. Clone Repository
```bash
git clone <repository-url>
cd laravel-crud
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Database
Edit file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_absensi
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Jalankan Migrasi
```bash
php artisan migrate
```

### 6. Jalankan Seeder (Data Dummy)
```bash
php artisan db:seed
```

### 7. Jalankan Server
```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Struktur File

```
laravel-crud/
├── app/
│   ├── Http/Controllers/
│   │   └── AbsensiController.php
│   └── Models/
│       └── Absensi.php
├── database/
│   ├── migrations/
│   │   └── 2025_08_02_043616_create_absensi_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── AbsensiSeeder.php
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php
│   └── absensi/
│       ├── index.blade.php
│       ├── create.blade.php
│       ├── edit.blade.php
│       └── show.blade.php
└── routes/
    └── web.php
```

## Routes

| Method | URL | Description |
|--------|-----|-------------|
| GET | `/` | Redirect ke halaman absensi |
| GET | `/absensi` | Halaman utama (index) |
| GET | `/absensi/create` | Form tambah absensi |
| POST | `/absensi` | Simpan data absensi |
| GET | `/absensi/{id}` | Detail absensi |
| GET | `/absensi/{id}/edit` | Form edit absensi |
| PUT | `/absensi/{id}` | Update data absensi |
| DELETE | `/absensi/{id}` | Hapus data absensi |
| PATCH | `/absensi/{id}/checkout` | Check-out absensi |

## Fitur Detail

### 1. Halaman Utama (Index)
- Tabel responsif dengan Bootstrap 5
- Filter berdasarkan tanggal dan bulan
- Pagination
- Tombol aksi: Edit, Delete, Check-out
- Badge status berwarna

### 2. Form Tambah Absensi
- Validasi input
- Auto-fill waktu saat ini
- Dropdown status
- Responsive design

### 3. Form Edit Absensi
- Pre-filled dengan data existing
- Field jam pulang opsional
- Validasi update

### 4. Check-out Feature
- Tombol check-out untuk mengisi jam pulang
- Konfirmasi sebelum check-out
- Auto timestamp saat ini

### 5. Data Dummy
Seeder menghasilkan data untuk:
- 5 karyawan berbeda
- 30 hari terakhir
- Status bervariasi (Hadir, Izin, Sakit)
- Jam datang 07:00-09:00
- Jam pulang 16:00-18:00 (untuk status Hadir)

## Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **Icons**: Bootstrap Icons
- **Date/Time**: Carbon (Laravel)

## Screenshot Fitur

### Halaman Utama
- Tabel data absensi dengan filter
- Tombol aksi untuk setiap baris
- Pagination di bagian bawah

### Form Tambah/Edit
- Layout responsif
- Validasi real-time
- Auto-fill waktu

### Check-out
- Tombol hijau untuk check-out
- Konfirmasi dialog
- Update otomatis jam pulang

## Kontribusi

1. Fork repository
2. Buat branch fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

MIT License

## Support

Untuk pertanyaan atau bantuan, silakan buat issue di repository ini. 