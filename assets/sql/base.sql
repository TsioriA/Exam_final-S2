CREATE DATABASE Site;
USE Site;

-- Table membre
CREATE TABLE membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    date_naissance DATE,
    genre ENUM('Homme', 'Femme', 'Autre'),
    email VARCHAR(150),
    ville VARCHAR(100),
    mdp VARCHAR(255),
    image_profil VARCHAR(255)
);

-- Table categorie_objet
CREATE TABLE categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(100)
);

-- Table objet
CREATE TABLE objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(100),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);

-- Table images_objet
CREATE TABLE images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    nom_image VARCHAR(255),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
);

-- Table emprunt
CREATE TABLE emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre)
);







INSERT INTO membre (nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES
('Alice', '1990-05-12', 'Femme', 'alice@example.com', 'Paris', 'mdp1', 'alice.jpg'),
('Bob', '1988-09-23', 'Homme', 'bob@example.com', 'Lyon', 'mdp2', 'bob.jpg'),
('Charlie', '1995-02-15', 'Homme', 'charlie@example.com', 'Marseille', 'mdp3', 'charlie.jpg'),
('Diana', '2000-12-30', 'Femme', 'diana@example.com', 'Toulouse', 'mdp4', 'diana.jpg');


INSERT INTO categorie_objet (nom_categorie) VALUES
('Esthétique'),
('Bricolage'),
('Mécanique'),
('Cuisine');



INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Tondeuse à barbe', 1, 1),
('Pinceau maquillage', 1, 1),
('Perceuse', 2, 1),
('Marteau', 2, 1),
('Clé à molette', 3, 1),
('Tournevis', 2, 1),
('Robot de cuisine', 4, 1),
('Blender', 4, 1),
('Grille-pain', 4, 1);


INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Aspirateur', 1, 2),
('Fer à lisser', 1, 2),
('Pistolet à colle', 2, 2),
('Visseuse', 2, 2),
('Cric hydraulique', 3, 2),
('Clé dynamométrique', 3, 2),
('Four micro-ondes', 4, 2),
('Batteur électrique', 4, 2),
('Machine à café', 4, 2),
('Casserole', 4, 2);


INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Brosse cheveux', 1, 3),
('Lime à ongles', 1, 3),
('Scie circulaire', 2, 3),
('Tournevis électrique', 2, 3),
('Clé plate', 3, 3),
('Compresseur', 3, 3),
('Grill électrique', 4, 3),
('Friteuse', 4, 3),
('Plaque induction', 4, 3),
('Mixeur', 4, 3);


INSERT INTO objet (nom_objet, id_categorie, id_membre) VALUES
('Épilateur', 1, 4),
('Fer à repasser', 1, 4),
('Niveau à bulle', 2, 4),
('Cutter', 2, 4),
('Chalumeau', 3, 4),
('Pompe à huile', 3, 4),
('Autocuiseur', 4, 4),
('Râpe à fromage', 4, 4),
('Cuiseur vapeur', 4, 4),
('Plancha', 4, 4);


INSERT INTO emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-06-01', '2025-06-10'),
(5, 3, '2025-06-02', '2025-06-12'),
(10, 4, '2025-06-03', '2025-06-13'),
(12, 1, '2025-06-04', '2025-06-14'),
(15, 3, '2025-06-05', '2025-06-15'),
(20, 1, '2025-06-06', '2025-06-16'),
(25, 2, '2025-06-07', '2025-06-17'),
(30, 4, '2025-06-08', '2025-06-18'),
(35, 1, '2025-06-09', '2025-06-19'),
(40, 3, '2025-06-10', '2025-06-20');


