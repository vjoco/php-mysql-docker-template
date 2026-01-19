-- Create database and user with proper permissions
CREATE DATABASE IF NOT EXISTS webapp;
CREATE USER IF NOT EXISTS 'webuser'@'%' IDENTIFIED BY 'webpassword';
GRANT ALL PRIVILEGES ON webapp.* TO 'webuser'@'%';
FLUSH PRIVILEGES;