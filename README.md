# REAL ESATE APPLICATION

Welcome to the Real Estate Web Application! This project provides both client and admin functionality for managing real estate properties. It's built using HTML, CSS, JavaScript, and PHP, with server-side functionality running on XAMPP.

## Features

- **Client Features**:
  - Browse and search for properties (for sale or rent).
  - View property details, including images, descriptions, and pricing.
  - Contact agents for inquiries.
  - Sign up for newsletters.

- **Admin Features**:
  - Log in securely to the admin dashboard.
  - Add, edit, or delete property listings.
  - Manage user inquiries.

## Installation

Follow these steps to set up the project on your local machine:

1. **Prerequisites**:

   - Install [XAMPP](https://www.apachefriends.org/index.html) to set up a local development environment.
   - Install [Git](https://git-scm.com/downloads)
   - Configure Your Identity
   - Open terminal and insert
   > git config --global user.name "Your Name"
   - Set your email address globally (also used for all repositories) using the following command on the terminal:
   > git config --global user.email "<you@example.com>"
   - Verify Installation on terminal:
   > git --version
   - Create a GitHub Account:
        If you don’t have one already, create an account on GitHub (<https://github.com/signup>).
2. **Cloning the repository**:

    - On terminal Navigate to your xampp folder in the C drive and go into the htdocs folder:
        >  cd ..\ ..\xampp\htdocs\
    - On terminal run the following command:
        > git clone <https://github.com/Stephen-Salano/Real-estate.git>
    - This will create a folder in the htdocs folder called Real-estate
    - Open the folder with vs code:
        > cd .\Real-estate\
        > code .
    - This will open the project folder on vs code
3. **Setting up the Database**:

    - Open xampp and start Apache and Mysql
    - Press admin on the Mysql section
    - This will open phpmyAdmin on the browser
    - Press new on the left sidebar
    - Under the Database name enter "home_db1" and leave everything default
    - Press create
    - On the left sidebar select home_db and on the top navigation click import and import the sql file in the project "home_db.sql"
    - scroll to the bottom and click import
    - this will create the database
4. **Running the Project**:
    - Everytime you want to run the project open xampp and make sure Apache and mySQL is running
    - On the browser enter the path to the project
        > <http://localhost/project/>
