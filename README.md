# Simple PHP Application with Authentication and Post Creation
This is a simple PHP application that allows users to create an account, log in, and create posts once they are logged in. The application uses PHP sessions to maintain user authentication state and MySQL to store user and post data.The application requires PHP 8.1.7 or higher.


# Installation
1. Clone the repository to your local machine.
2. Create a MySQL database and import the database.sql file to create the necessary tables.
3. Update the database connection details in includes/Connection.php to match your MySQL server credentials.

# Usage
1. Start the PHP built-in web server by running the command in project root directory.
    ```bash
      php -S localhost:8000
    ```
2. Navigate to http://localhost:8000 in your web browser to access the application.
3. Register a new user or log in with an existing account.
4. Once logged in, you can add new posts by clicking the "Add Post" button on the dashboard page.
5. You can view your own posts and all posts from other users on the home page.


# Notes
1. Passwords are hashed using the bcrypt algorithm before being stored in the database for security.
2. Users must be logged in to create posts.
3. Only logged-in users can view the home page and create posts. If a user is not logged in, they will be redirected to the login page.
4. Sessions are used to maintain user authentication state across multiple pages.
5. The application has only basic functionality and is not meant to be used in production environments without additional security measures.
