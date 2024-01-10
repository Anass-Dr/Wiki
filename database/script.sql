CREATE DATABASE IF NOT EXISTS Wiki;
USE Wiki;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Author') NOT NULL,
    INDEX idx_email (email)
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE wikis (
    wiki_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    image VARCHAR(50),
    user_id INT DEFAULT 0,
    category_id INT DEFAULT 0,
    CONSTRAINT wikis_user_id 
        FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT wikis_category_id 
        FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(50)
);

CREATE TABLE wikis_tags (
    tag_id INT,
    wiki_id INT,
    PRIMARY KEY (tag_id, wiki_id),
    CONSTRAINT tags_wikis_tag_id 
        FOREIGN KEY (tag_id) REFERENCES tags(tag_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT tags_wikis_wiki_id 
        FOREIGN KEY (wiki_id) REFERENCES wikis(wiki_id) ON DELETE CASCADE ON UPDATE CASCADE
);
