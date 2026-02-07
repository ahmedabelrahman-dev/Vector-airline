# Vector Air - Airline Reservation System Instructions

## ✈️ Project Overview

Vector Air is a high-performance airline booking platform built with Laravel 11. It handles flight scheduling, real-time seat availability, passenger bookings, and secure payment processing.

## 🛠 Tech Stack & Environment

- **Framework:** Laravel 11 (PHP 8.2+)
- **Frontend:** Tailwind CSS with Livewire (TALL Stack)
- **Database:** MySQL/PostgreSQL
- **Auth:** Laravel Breeze (using Class-based views)
- **Icons:** Heroicons (Outline for UI, Solid for state changes)

## 🎨 Design System (Vector Air Brand)

- **Primary Color:** Navy Blue (#1E293B) - Trust & Professionalism.
- **Accent Color:** Sky Blue (#0EA5E9) - Action & Energy.
- **Warning/CTA:** Safety Orange (#F97316) - For "Book Now" and Alerts.
- **Typography:** Sans-serif (Inter or Montserrat). Clean, high readability.

## 🏗 Coding Standards

- **Architecture:** Follow "Fat Models, Skinny Controllers." Move complex logic to **Action Classes** or **Services**.
- **Naming:** Use descriptive, industry-standard terms (e.g., `departure_airport_id` instead of `from_id`).
- **Typing:** Strict typing is mandatory. All methods must have return types and parameter types.
- **Validation:** Use **Form Requests** (`php artisan make:request`) for all controller validation.
- **Database:** - Always use Foreign Key constraints.
    - Use `decimal(8,2)` for prices.
    - Use IATA 3-letter codes for airports (JFK, LHR, DXB).
- **Security:** - Sanitize all user inputs.
    - Use Laravel `Crypt` for sensitive passenger data (e.g., Passport numbers).
    - Never expose internal Database IDs in the URL; use **UUIDs** or **Hashids** for public booking references.

## 🎫 Airline Domain Logic

- **Booking Reference:** Generate a 6-character alphanumeric PNR (Passenger Name Record) for every booking.
- **Timezones:** Store all timestamps in **UTC**. Use Carbon to convert to the airport's local timezone for display.
- **Seat Mapping:** Use a JSON column in the `airplanes` table to store seat layouts (e.g., `{"A1": "available", "A2": "occupied"}`).
- **Pricing:** Implement a simple "Demand Factor"—prices should increase as `available_seats` decreases.

## 🤖 Copilot Response Rules

- Prioritize **Livewire** components for interactive elements like seat selection or flight searching.
- When generating migrations, always include appropriate indexes for `departure_time` and `airport_ids` to ensure fast search.
- Do not use deprecated Laravel features (like older versions of Vite config or legacy Facade patterns).
- If I ask for a UI component, provide **Tailwind CSS** utility classes directly in the Blade/Livewire file.
