CREATE TABLE environnement (id INT AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(100) NOT NULL);
INSERT INTO environnement VALUES(29,'La porte de Brandebourg');
INSERT INTO environnement VALUES(30,'La seine');
INSERT INTO environnement VALUES(31,'Monument de la renaissance africaine');
INSERT INTO environnement VALUES(32,'Statut de la Liberté');
INSERT INTO environnement VALUES(33,'La grande roue du Vieux-Port de Montréal');
INSERT INTO environnement VALUES(34,'Ruines du Forum Romain');
INSERT INTO environnement VALUES(35,'Urbain futuriste et technologique');
CREATE TABLE user (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(180) NOT NULL, roles TEXT NOT NULL
        , password VARCHAR(255) NOT NULL);
INSERT INTO user VALUES(5,'admin','["ROLE_ADMIN"]','$2y$04$xz5y5Gw.Z1C8btrhRxb/.OwhfFxccsUZuDJ30aZVIwZGdVnejENe2');
CREATE TABLE visite (id INT AUTO_INCREMENT PRIMARY KEY, ville VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, datecreation DATE DEFAULT NULL, note INT DEFAULT NULL, avis TEXT DEFAULT NULL, tempmin INT DEFAULT NULL, tempmax INT DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INT DEFAULT NULL, updated_at DATETIME DEFAULT NULL
        );
INSERT INTO visite VALUES(30,'paris','France','2025-10-20',17,NULL,8,22,'Paris.png',NULL,NULL);
INSERT INTO visite VALUES(31,'Tokyo','Japon','2025-10-20',19,NULL,5,28,'Tokyo.png',NULL,NULL);
INSERT INTO visite VALUES(32,'New York','États-Unis','2025-10-20',15,NULL,-3,30,'New york.png',NULL,NULL);
INSERT INTO visite VALUES(33,'Rome','Italie','2025-10-20',14,NULL,10,25,'Rome.png',NULL,NULL);
INSERT INTO visite VALUES(34,'Berlin','Allemagne','2025-10-20',12,NULL,6,20,'Berlin.png',NULL,NULL);
INSERT INTO visite VALUES(35,'Dakar','Sénégal','2025-10-20',18,NULL,18,34,'Dakar.png',NULL,NULL);
INSERT INTO visite VALUES(36,'Montréal','Canada','2025-10-20',13,NULL,-10,25,'Montréal.png',NULL,NULL);
CREATE TABLE visite_environnement (visite_id INT NOT NULL, environnement_id INT NOT NULL, PRIMARY KEY(visite_id, environnement_id), CONSTRAINT FK_6690F746C1C5DC59 FOREIGN KEY (visite_id) REFERENCES visite (id) ON DELETE CASCADE, CONSTRAINT FK_6690F746BAFB82A1 FOREIGN KEY (environnement_id) REFERENCES environnement (id) ON DELETE CASCADE);
INSERT INTO visite_environnement VALUES(30,32);
INSERT INTO visite_environnement VALUES(30,35);
INSERT INTO visite_environnement VALUES(31,35);
INSERT INTO visite_environnement VALUES(32,32);
INSERT INTO visite_environnement VALUES(33,34);
INSERT INTO visite_environnement VALUES(34,29);
INSERT INTO visite_environnement VALUES(35,31);
INSERT INTO visite_environnement VALUES(36,33);
CREATE TABLE messenger_messages (id INT AUTO_INCREMENT PRIMARY KEY, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL
        , available_at DATETIME NOT NULL
        , delivered_at DATETIME DEFAULT NULL
        );
CREATE TABLE doctrine_migration_versions (version VARCHAR(191) NOT NULL, executed_at DATETIME DEFAULT NULL, execution_time INT DEFAULT NULL, PRIMARY KEY(version));
CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (username);
CREATE INDEX IDX_6690F746C1C5DC59 ON visite_environnement (visite_id);
CREATE INDEX IDX_6690F746BAFB82A1 ON visite_environnement (environnement_id);
CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name);
CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at);
CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at);
