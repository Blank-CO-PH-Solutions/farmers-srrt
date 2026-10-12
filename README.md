# Farmers SRRT — Service Request & Rating System

A Laravel-based system for managing farmer service requests, office routing, referrals, and ratings.

## Features

- **Service Requests** — Farmers submit requests with location, priority, and optional calamity flag
- **Office Routing** — Requests flow through offices with status tracking and history
- **Referrals** — Forward requests between offices (outgoing/incoming)
- **Ratings** — Farmers rate completed service requests
- **Attachments** — Upload supporting files per request
- **Role-based Users** — Farmers and office staff with role field on User model

## Tech Stack

- PHP & Laravel
- MySQL / SQLite
- Eloquent ORM

## Getting Started

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Project Structure

```
app/Models/
  User.php               # Authenticated users (farmers + staff)
  ServiceRequest.php     # Core request entity
  Office.php             # Handling offices
  ServiceType.php        # Request category
  Rating.php             # Farmer ratings
  Referral.php           # Office-to-office forwarding
  RequestStatusHistory.php  # Status change audit log
  Attachment.php         # Uploaded files
```

## License

MIT — see [LICENSE](LICENSE)
