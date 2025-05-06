CREATE
DATABASE IF NOT EXISTS php;

CREATE TABLE user
(
    id       INT AUTO_INCREMENT PRIMARY KEY,
    email    VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE user_info
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    first_name   VARCHAR(255),
    last_name    VARCHAR(255),
    phone_number VARCHAR(20),
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
);

CREATE TABLE products
(
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255)   NOT NULL,
    price       DECIMAL(10, 2) NOT NULL,
    description TEXT
);

CREATE TABLE products_charsets
(
    id              INT AUTO_INCREMENT PRIMARY KEY,
    product_id      INT NOT NULL,
    attribute_name  VARCHAR(255),
    attribute_value VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);

CREATE TABLE order
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT NOT NULL,
    order_date   DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE
);

CREATE TABLE order_items
(
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    order_id            INT            NOT NULL,
    product_id          INT            NOT NULL,
    quantity            INT            NOT NULL,
    price_at_order_time DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES order (id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);

CREATE TABLE basket
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT NOT NULL,
    product_id INT NOT NULL,
    quantity   INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);

CREATE TABLE favorites
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);