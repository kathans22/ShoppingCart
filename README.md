# Shopping Cart Project

## Description

Our e-commerce site, driven by REST APIs and MySQL, delivers a seamless shopping experience. The platform is designed to accommodate both guests and registered users, ensuring a smooth interaction with products and the shopping cart.

### Key Features

- **Admin Panel**: 
  - View, add, delete, and update products.
  - Manage the entire product catalog effortlessly.
  
- **Guest Users**:
  - Browse the available products without the need to register.
  
- **Registered Users**:
  - Manage their shopping cart by adding, updating, and removing items.
  
- **Secure Payment Processing**:
  - Payments are processed securely using AES encryption, ensuring safe and convenient shopping.

### Technology Stack

- **Backend**: PHP REST APIs
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL

## Database Structure

### 1. `cartlogintb`

This table stores the login information for users.

| Column   | Type          | Description                  |
|----------|---------------|------------------------------|
| `id`     | int(11)       | Primary key, auto-incremented |
| `email`  | varchar(100)  | User's email address          |
| `phno`   | varchar(11)   | User's phone number           |
| `username` | varchar(100) | Unique username               |
| `password` | varchar(100) | User's password (hashed)      |

### 2. `carttb`

This table manages the shopping cart for each user.

| Column   | Type          | Description                             |
|----------|---------------|-----------------------------------------|
| `id`     | int(11)       | Primary key, auto-incremented           |
| `username` | varchar(100) | Username of the cart owner (foreign key) |
| `pid`    | varchar(100)  | Product ID (foreign key)                |
| `qty`    | int(11)       | Quantity of the product                 |

### 3. `ordertb`

This table keeps track of user orders.

| Column   | Type          | Description                             |
|----------|---------------|-----------------------------------------|
| `id`     | int(11)       | Primary key, auto-incremented           |
| `username` | varchar(100) | Username of the order owner (foreign key) |
| `pid`    | varchar(100)  | Product ID (foreign key)                |
| `poid`   | int(11)       | Payment order ID (foreign key)          |
| `qty`    | int(11)       | Quantity ordered                        |

### 4. `payordertb`

This table stores the payment order details.

| Column        | Type           | Description                              |
|---------------|----------------|------------------------------------------|
| `poid`        | int(11)        | Primary key, auto-incremented            |
| `username`    | varchar(100)   | Username of the payer (foreign key)      |
| `creditcardno` | mediumtext     | Encrypted credit card number             |
| `cvv`         | mediumtext     | Encrypted CVV                            |
| `status`      | varchar(100)   | Payment status (e.g., 'done', 'pending') |

### 5. `productstb`

This table contains all the product information.

| Column   | Type          | Description                             |
|----------|---------------|-----------------------------------------|
| `id`     | int(11)       | Primary key, auto-incremented           |
| `pid`    | varchar(100)  | Unique product ID                       |
| `pname`  | varchar(100)  | Name of the product                     |
| `price`  | int(11)       | Price of the product                    |
| `category` | varchar(100) | Category of the product                 |
| `pimage` | varchar(100)  | Path to the product image               |

## Usage

### Prerequisites

- **Server**: Apache or Nginx
- **Database**: MySQL or MariaDB
- **PHP**: Version 8.2.0 or later

### Installation

1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/your-username/shoppingcart.git
   cd shoppingcart

2. Import the SQL database:
Use the provided SQL script (shoppingcartdb.sql) to set up the database.
  You can import this script using phpMyAdmin or MySQL CLI: **mysql -u username -p shoppingcartdb < shoppingcartdb.sql**

3. Update the database connection details in your PHP files to match your environment.

4. Run the application on your server.
