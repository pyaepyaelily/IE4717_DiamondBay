CREATE TABLE online_deals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
     price DECIMAL(10, 2),
    description TEXT,
    image VARCHAR(255)
);
