# Notify-Pay

Notify-Pay is an **automated cashier notification system** that promptly informs personnel when their benefits, salaries, or disbursements are deposited into their bank accounts.  
Built with **Laravel**, Notify-Pay ensures transparency, accountability, and faster communication.

---

## ✨ Features
- 🔔 Automated notifications (SMS / Email / In-App)
- 🏦 Bank integration for disbursement updates
- 👥 Role-based user management (Admin, Cashier, Personnel)
- 📊 Transaction history & reporting
- 🔒 Secure authentication and data protection
- ⚡ Real-time status tracking

---

## 📂 Tech Stack
- **Backend:** Laravel 12.x (PHP 8.3+)
- **Frontend:** Blade / React (optional)
- **Database:** MySQL / PostgreSQL
- **Notifications:** Laravel Notifications (SMS, Email)
- **Deployment:** Nginx / Apache / Docker (optional)

---

## 🗄️ Database Schema (Core Tables)
- **users** – system users (admin, cashier, personnel)
- **beneficiaries** – employees/personnel receiving payments
- **banks** – list of banks integrated
- **transactions** – disbursement records
- **notifications** – sent notifications log

---

## ⚙️ Installation
```bash
# Clone repository
git clone https://github.com/kuyagep/notify-pay.git

# Navigate into project
cd notify-pay

# Install dependencies
composer install
npm install && npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Start development server
php artisan serve
