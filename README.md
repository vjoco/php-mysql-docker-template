# Docker LAMP Stack

A lightweight Docker Compose setup with Apache2, PHP 8.2, and MariaDB optimized for low RAM consumption.

## Quick Start

1. **Clone and start:**
   ```bash
   docker-compose up -d
   ```

2. **Access the application:**
   - Web: http://localhost:8080
   - Database: localhost:3306

## Memory Optimizations

### MariaDB Low-Memory Settings:
- InnoDB buffer pool: 64MB
- Max connections: 20
- Query cache: 16MB
- Temp tables: 32MB

### Expected RAM Usage:
- MariaDB: ~80-120MB
- Apache+PHP: ~50-80MB
- Total: ~130-200MB

## Configuration

### Database Credentials:
- Root password: `rootpassword`
- Database: `webapp`
- User: `webuser`
- Password: `webpassword`

### Customization:
- PHP code: `./php/www/`
- Apache config: `./apache/000-default.conf`
- MariaDB config: `./mariadb/conf.d/low-memory.cnf`

## Commands

```bash
# Start services
docker-compose up -d

# View logs
docker-compose logs -f

# Stop services
docker-compose down

# Rebuild after changes
docker-compose up -d --build
```