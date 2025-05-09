CREATE DATABASE IF NOT EXISTS restauracja;
USE restauracja;

CREATE TABLE dania (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(100),
    cena DECIMAL(5,2),
    typ INT
);

CREATE TABLE pracownicy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50),
    nazwisko VARCHAR(50),
    stanowisko INT
);

CREATE TABLE rezerwacje (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stolik INT,
    data DATE,
    liczba_osob INT,
    telefon VARCHAR(15)
);
