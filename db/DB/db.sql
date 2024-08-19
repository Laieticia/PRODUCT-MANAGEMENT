CREATE DATABASE if NOT EXISTS product_db;
use product_db;
CREATE TABLE category (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Libelle VARCHAR(255),
    Description VARCHAR(255) 
);
CREATE TABLE Product (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Price INT,
    Quantity INT,
    Image VARCHAR(255),
     CategoryId INT,
    FOREIGN KEY (CategoryId) REFERENCES category(Id)
);
CREATE TABLE Users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Surname VARCHAR(255),
    Telephone INT,
    login INT,
    Password VARCHAR(255),
    Email VARCHAR(255),
    Role VARCHAR(255),
);