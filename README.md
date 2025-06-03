# Health Funding App

A modern health funding platform built with **Laravel**, **Sanctum**, **Livewire**, **Tailwind CSS**, and **Laravel APIs**, designed to manage and streamline the process of health-related donations and interactions between managers, donors, health workers, and patients.

---

## 🌐 Tech Stack

- **Laravel** – Backend PHP framework
- **Laravel Sanctum** – Lightweight API authentication
- **Livewire** – Reactive components for the web admin dashboard
- **Tailwind CSS** – Utility-first CSS framework for styling
- **Laravel API** – Provides authenticated RESTful endpoints consumed by a mobile app

---

## 🧩 Key Features

### 🔧 Admin Dashboard (Web)
- Manage **donors**, **donations**, **health workers**, and **patients**
- Dashboard widgets and statistics (e.g., total donations, active users)
- Approve/reject donation or support requests
- Real-time interaction with Livewire components
- Role-based access control for different admin functions
- API control and user syncing with mobile clients

### 🔌 API Integration
- Fully secured and authenticated API endpoints
- Supports role-based access for mobile clients (donors, health workers, patients)
- Used by a mobile application to sync and manage dashboard data

---

## 🗂 Project Structure Overview

```
- app/
  - Http/
    - Controllers/
    - Middleware/
    - Resources/
  - Models/
- routes/
  - web.php
  - api.php
- resources/
  - views/
    - livewire/
  - css/
- config/
- database/
  - migrations/
  - seeders/
```

---

## ⚙️ Getting Started

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/health-funding-app.git
   cd health-funding-app
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment configuration:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run database migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Serve the application:**
   ```bash
   php artisan serve
   ```

---

## 🔐 Authentication

- Uses **Laravel Sanctum** for API token-based authentication
- Web authentication via standard session-based login
- Mobile clients consume the same API through secure token headers

---

## 📡 API Overview

APIs are accessible via `/api/*` and used by a mobile application.

Example endpoints:

| Method | Endpoint              | Description                        |
|--------|-----------------------|------------------------------------|
| POST   | `/api/login`          | Authenticates user and issues token |
| GET    | `/api/dashboard`      | Returns role-specific dashboard data |
| GET    | `/api/donations`      | Lists donations by authenticated user |
| POST   | `/api/donations`      | Creates a new donation entry       |
| GET    | `/api/health-workers` | Returns list and data of health workers |

> All API routes are protected using Sanctum and require valid tokens.

---

## 👥 User Roles

| Role         | Permissions Description                         |
|--------------|--------------------------------------------------|
| **Manager**  | Full admin control: manage users, donations, and APIs |
| **Donor**    | View/manage donation history                    |
| **Health Worker** | Manage health services and report activity |
| **Patient**  | View health funding updates and request status  |

---

## 🧪 Running Tests

```bash
php artisan test
```

---

## 📄 License

This project is open-source and distributed under the [MIT License](LICENSE).

---

## 🤝 Contributions

Feel free to fork this repository, open issues, or submit pull requests to contribute to the project.
