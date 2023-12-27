# University Travel Agency Project

This is a Laravel-based project for managing travel reservations for a university travel agency.

## Prerequisites

Before you proceed, make sure you have the following installed on your system:

-   PHP (>= 7.3)
-   [Composer](https://getcomposer.org/)
-   [Node.js](https://nodejs.org/) with npm

## Installation Instructions

Follow these steps to set up the project on your local machine:

### Step 1: Clone the repository

Clone this repository to your local machine using the following command:

```bash
git clone <repository-url>
```

### Step 2: Install Composer Dependencies

Navigate to the project directory and install the PHP dependencies with Composer:

```bash
cd /path/to/travel-agency
composer install
```

### Step 3: Install NPM Dependencies

Install the necessary Node.js modules using npm:

```bash
npm install
```

### Step 4: Database Setup

Make sure to set up your .env file with appropriate database credentials before running migrations and seeds.(check .env.example file)

To set up your database, run the following npm script which will execute the database migrations and seeders:

```bash
npm run db
```

This will migrate and add a data to the database.

### Step 5: Start the Project

Start the Laravel server using npm. This will serve your project on localhost:8000:

```bash
npm start
```

#### Accessing the Application

After starting the server, you can access the application in your web browser:

[a link](http://localhost:8000)

#### To log in to the system, use the following credentials:

Email: user@admin.com
Password: 12345678

# License

#### This project is licensed under the MIT License - see the LICENSE.md file for details.
