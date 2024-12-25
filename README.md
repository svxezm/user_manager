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

2. Make sure you have PHP or a web server like Apache or Nginx installed.

3. Open the client/ directory and install dependencies
```bash
cd client
npm install
```

4. Compile Sass
```bash
npm run build
```

5. Run the following command to initialize the database:
```bash
sqlite3 server/db/database.db < migrations/create_users_table.sql
```

6. Now just navigate to `http://localhost/` and you're ready to go!

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
Feel free to use this project to learn or even build your own verson. Just make sure to give the credits if sharing it.
