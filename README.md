# 🦷 Dental Management System

A full-featured web-based Dental Practice Management System built with Laravel, designed to streamline clinic operations including patient scheduling, treatment planning, insurance tracking, and X-ray file management. Now enhanced with an integrated AI Chatbot powered by OpenAI's GPT model.

---

## 🚀 Features

- 🧑‍⚕️ **Patient Management**  
  Add, view, edit, and manage patient records including contact details and medical history.

- 📅 **Appointment Scheduling**  
  Book appointments with date/time, and view them in a clean list view.

- 💉 **Treatment Planning**  
  Record treatment details, edit procedures, and associate them with patient profiles.

- 🏥 **Insurance Tracking**  
  Store and view insurance details like provider name, policy number, and validity.

- 🖼️ **X-ray Upload**  
  Upload and store patient X-ray files securely.

- 🔐 **Authentication**  
  Secure login & registration for clinic staff using Laravel Breeze.

- 🤖 **AI Chatbot Integration**  
  An AI-powered Chatbot using OpenAI's GPT-3.5 model is integrated directly into the dashboard. It allows users to ask dental-related queries and receive real-time assistance from the embedded assistant.

---

## 🧠 Technologies Used

- **Backend:** Laravel 10+
- **Frontend:** Blade Templates, Bootstrap 5
- **Database:** MySQL
- **File Uploads:** Laravel Storage System
- **AI/LLM Integration:** OpenAI GPT (via Guzzle & REST API)
- **HTTP Requests:** Laravel's `Http` client
- **Version Control:** Git & GitHub

---

## 🧪 Screenshots

### 🧭 Dental Dashboard  
![Dental Dashboard](public/screenshots/Dental%20Dashboard.png)

### 📅 Appointments Table  
![Appointments Table](public/screenshots/Appointments%20Table.png)

### ➕ New Appointment Form  
![New Appointments](public/screenshots/New%20Appointments.png)

### 👤 Patients Table  
![Patients Table](public/screenshots/Patients%20Table.png)

### 💉 New Treatment Form  
![New Treatment](public/screenshots/New%20Treatment.png)

### 📋 Treatments Table  
![Treatments Table](public/screenshots/Treatments%20Table.png)

---

## ⚙️ How to Run Locally

```bash
# 1. Clone the repository
git clone https://github.com/ishaansharma03/dental-management-system.git

# 2. Move into the project directory
cd dental-management-system

# 3. Install PHP & JS dependencies
composer install
npm install && npm run dev

# 4. Set up environment variables
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Configure your database in `.env`

# 7. Run migrations
php artisan migrate

# 8. Serve the application
php artisan serve


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
