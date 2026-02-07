# Vector Air - Airline Reservation System

Vector Air is a high-performance airline booking platform built with Laravel 11 and Jetstream (Livewire).

## 🚀 Getting Started

### Prerequisites

- PHP 8.2+
- Node.js & NPM
- Composer
- SQLite (default) or MySQL

### Installation

1. **Clone & Setup:**

    ```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    ```

2. **Database:**

    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

3. **Build Assets:**

    ```bash
    npm run build
    ```

4. **Serve:**
    ```bash
    php artisan serve
    npm run dev  # In a separate terminal for hot reload
    ```

## 🎨 Design & Features

- **Theme:** Clean & Sky-High (Navy Blue `#1E293B`, Sky Blue `#0EA5E9`, Safety Orange `#F97316`).
- **Stack:** Laravel 11, Livewire, Tailwind CSS, Jetstream.
- **Key Pages:**
    - **Homepage:** Booking Engine with predictive search (simulated).
    - **Seat Selection:** Interactive SVG map.
    - **Dashboard:** User bookings and profile.

## 🛠 Project Structure

- `app/Models`: Flight, Airport, Airplane, Booking, Passenger.
- `app/Livewire`: `FlightSearch` (Hero), `SeatSelection` (SVG Map).
- `resources/views/welcome.blade.php`: Custom Landing Page.

## 🤝 Contributing

1. Fork the repo.
2. Create a feature branch.
3. Submit a Pull Request.

---

_Built with ❤️ by Vector Air Tech Team_
