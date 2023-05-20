DROP DATABASE IF EXISTS shopers;
CREATE DATABASE shopers;
DROP TABLE IF EXISTS categorie;
CREATE TABLE categorie(
    id_categorie int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    libelle varchar(35) NOT NULL,
    description varchar(150) NOT NULL,
    icon varchar(200) NOT NULL,
    date_creation date NOT NULL
)ENGINE = INNODB;
DROP TABLE IF EXISTS produit;
CREATE TABLE produit (
    id_produit int(6) NOT NULL PRIMARY KEY,
    libelle varchar(35) NOT NULL,
    prix decimal(20,2) NOT NULL,
    qte int(5) NOT NULL,
    discount int(3) NOT NULL,
    date_creation date NOT NULL,
    image varchar(200) NOT NULL,
    id_categorie int(4) NOT NULL AUTO_INCREMENT,
    FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE = INNODB;
DROP Table if EXISTS admin ;
CREATE TABLE admin (
    id_admin int(6) NOT NULL PRIMARY KEY,
    login varchar(30) NOT NULL,
    password varchar(60) NOT NULL,
    date_creation date NOT NULL
)ENGINE = INNODB;
INSERT INTO ADMIN VALUES ('1111','root','e10adc3949ba59abbe56e057f20f883e','23-05-13');