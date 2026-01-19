# PHP MySQL Docker Template

A ready-to-use Docker template for PHP applications with MySQL database and Nginx web server. Optimized for development and small-scale deployments.

## 🚀 Quick Start

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd <your-repo-name>
   ```

2. **Configure environment variables**
   ```bash
   cp .env.example .env
   # Edit .env with your database credentials
   ```

3. **Start the application**
   ```bash
   docker-compose up -d
   ```

4. **Access your application**
   - Open http://localhost:8080 in your browser
   - You should see a connection success message

## 📁 Project Structure

```
├── src/                 # PHP application files
│   └── index.php       # Sample PHP file with MySQL connection
├── docker-compose.yml  # Docker services configuration
├── Dockerfile          # PHP-FPM container setup
├── nginx.conf          # Nginx server configuration
├── .env               # Environment variables
└── README.md          # This file
```

## 🛠 Services

### PHP Application (app)
- **Image**: PHP 8.2-FPM
- **Extensions**: PDO MySQL, MySQLi
- **Volume**: `./src` mounted to `/var/www`

### Database (db)
- **Image**: MariaDB 10.11
- **Optimizations**: Configured for low memory usage (1GB RAM)
- **Persistent Storage**: Database data stored in Docker volume

### Web Server (nginx)
- **Image**: Nginx Alpine
- **Port**: 8080 (configurable via .env)
- **Configuration**: Optimized for PHP-FPM

## ⚙️ Configuration

### Environment Variables (.env)

```env
DB_DATABASE=my_app_db
DB_USERNAME=admin
DB_PASSWORD=your_secure_password
DB_ROOT_PASSWORD=your_root_password
HTTP_PORT=8080
```

### Database Connection in PHP

```php
$host = 'db'; // Docker service name
$db   = $_ENV['DB_DATABASE'] ?? 'my_app_db';
$user = $_ENV['DB_USERNAME'] ?? 'admin';
$pass = $_ENV['DB_PASSWORD'] ?? 'password';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
```

## 🔧 Development

### Adding PHP Files
Place your PHP files in the `src/` directory. They will be automatically available at http://localhost:8080

### Database Management
Access your database using any MySQL client:
- **Host**: localhost
- **Port**: 3306 (default MySQL port)
- **Database**: Value from `DB_DATABASE` in .env
- **Username**: Value from `DB_USERNAME` in .env
- **Password**: Value from `DB_PASSWORD` in .env

### Logs
View container logs:
```bash
# All services
docker-compose logs

# Specific service
docker-compose logs app
docker-compose logs db
docker-compose logs nginx
```

## 📋 Common Commands

```bash
# Start services
docker-compose up -d

# Stop services
docker-compose down

# Rebuild containers
docker-compose up --build

# View running containers
docker-compose ps

# Execute commands in PHP container
docker-compose exec app bash

# Access MySQL CLI
docker-compose exec db mysql -u admin -p my_app_db
```

## 🔒 Security Notes

- Change default passwords in `.env` before production use
- Consider using Docker secrets for sensitive data in production
- The template is optimized for development; additional security measures needed for production

## 🎯 Use Cases

- PHP application development
- Learning PHP with MySQL
- Prototyping web applications
- Small-scale deployments
- Development environment setup

## 📝 Requirements

- Docker
- Docker Compose

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## 📄 License

This project is open source and available under the [MIT License](LICENSE).