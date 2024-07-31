-- Création de la base de données
CREATE DATABASE IF NOT EXISTS mon_site_db;

-- Utilisation de la base de données
USE mon_site_db;

-- Table pour les utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les produits
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les commandes
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT NOT NULL,
    status ENUM('pending', 'completed', 'canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
);

-- Table pour les réservations
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    reservation_date DATE,
    status ENUM('pending', 'confirmed', 'canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE SET NULL
);

-- Insertion de données initiales (exemple)
INSERT INTO users (username, password) VALUES
('admin', PASSWORD('adminpass'));

INSERT INTO products (name, description) VALUES
('Produit Exemple', 'Description de produit exemple.');

-- Exemple d'insertion dans la table des commandes (ne pas oublier de remplacer les ID par ceux existants)
-- INSERT INTO orders (user_id, product_id, quantity, status) VALUES
-- (1, 1, 2, 'pending');

-- Exemple d'insertion dans la table des réservations (ne pas oublier de remplacer les ID par ceux existants)
-- INSERT INTO reservations (user_id, product_id, reservation_date, status) VALUES
-- (1, 1, '2024-08-01', 'confirmed');
