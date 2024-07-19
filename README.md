# Laravel EMI Processing Project

This project demonstrates an EMI processing system using Laravel with the repository and service pattern. It includes functionalities for creating, processing, and displaying loan and EMI details.

## Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL

## Installation

1. **Clone the repository:**

   ```sh
   git https://github.com/vishnusomanus/EMI-Processing.git
   cd EMI-Processing
   ```
1. **Install dependencies:**
    ```sh
    composer install
    ```
1. **Copy the .env file and configure the database:**
    ```sh
    cp .env.example .env
    ```

    Update the database configuration in the .env file:
    
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

    ```
1. **Generate an application key:**
    ```sh
    php artisan key:generate
    ```

1. **Migrations and Seeding**
    
    Run the migrations:
    ```sh
    php artisan migrate
    ```
    Seed the database:
    ```sh
    php artisan db:seed
    ```

    This will populate the loan_details and users tables with sample data.
## Usage

### 1. **Login to the Admin Page:**

   - Access the login page at `/login`.
   - Use the seeded user credentials:
     - **Username:** developer
     - **Password:** Test@Password123#

### 2. **View Loan Details:**

   - After logging in, navigate to `/loan` to view the loan details.

### 3. **Process EMI Data:**

   - Navigate to `/process-emi-data` to view the page with the "Process Data" button.
   - Click the "Process Data" button to generate the `emi_details` table and process the EMI data.
   - The resulting EMI data will be displayed on `/emi` page.

## Code Structure

### Repositories

- **LoanDetailRepository:** Handles operations related to the `loan_details` table.
- **EmiDetailRepository:** Manages operations related to the `emi_details` table.

### Services

- **LoanDetailService:** Contains the business logic for processing EMI details.

### Controllers

- **LoanDetailsController:** Manages requests related to loan details and EMI processing.

### Models

- **LoanDetail:** Represents the `loan_details` table.

### Migrations

- **Create Loan Details Table:** Migration file for creating the `loan_details` table.
- **Create Users Table:** Migration file for creating the `users` table.

### Seeders

- **LoanDetailsTableSeeder:** Seeds the `loan_details` table with sample data.
- **UsersTableSeeder:** Seeds the `users` table with a default user.

## License

This project is open-source and available under the MIT License.







