# User Manager Project

This is a user management system I created to practice PHP, SQL and frontend integration. It lets you securely add, edit, and delete users. I built this to improve my skills with backend logic and database handling.

---

## Features
- User login and authentication
- User creation, listing, and deletion
- Password hashing for secure storage
- Dynamic styling with Sass
- Organized file structure for scalability

---

## Installation

### Prerequisites
- **PHP** (>= 7.4)
- **SQLite** (>= 3.x)
- **Node.js** (for Sass compilation and client-side dependencies)
- **Apache** (or any web server)

### Setup Steps

1. Clone the Repository
```bash
git clone https://github.com/svxezm/user_manager.git
```

2. Make sure you have PHP or a web server like Apache or Nginx installed. In case you use Apache, ensure your DocumentRoot points to the project root directory.

3. Open the client/ directory and install dependencies
```bash
cd client
npm install
```

4. Compile Sass
```bash
npx grunt
```

5. Outside client/ directory, run the following commands to initialize the database and insert the initial values:
```bash
sqlite3 server/db/database.db < server/migrations/create_users_table.sql
php server/seed.php
```

6. Now just navigate to `http://localhost/server/index.php` and you're ready to go! And remember: the default name is 'admin' and password is 'admin123'.

7. Extra: build with Docker
```bash
docker build -t user_manager .
docker run -p 8080:80 user_manager
```
In case you need extra permissions, run the following command and try again.
```bash
sudo usermod -aG docker $USER
```

---

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
Feel free to use this project to learn or even build your own verson. Just make sure to give the credits if sharing it.
