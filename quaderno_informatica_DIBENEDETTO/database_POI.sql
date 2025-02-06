-- Creazione della tabella biglietti per la verifica della password
CREATE TABLE biglietti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nonce VARCHAR(255) NOT NULL UNIQUE
);

-- Inserimento di password di esempio
INSERT INTO biglietti (nonce) VALUES 
('password123'), 
('secureKey456');

-- Creazione della tabella POI (Punti di Interesse)
CREATE TABLE poi (
    id_poi INT AUTO_INCREMENT PRIMARY KEY,
    descrizione TEXT NOT NULL,
    latitudine DOUBLE NOT NULL,
    longitudine DOUBLE NOT NULL,
    raggio_tolleranza DOUBLE NOT NULL
);

-- Inserimento di dati di esempio per i POI
INSERT INTO poi (descrizione, latitudine, longitudine, raggio_tolleranza)
VALUES 
('Colosseo', 41.890251, 12.492373, 0.5),
('Torre Eiffel', 48.858844, 2.294351, 0.5),
('Statua della Libertà', 40.689247, -74.044502, 0.5);

-- Creazione della tabella immagini per collegare i POI a immagini e video
CREATE TABLE immagini (
    id_immagine INT AUTO_INCREMENT PRIMARY KEY,
    id_poi INT NOT NULL,
    link_video_b VARCHAR(255),
    link_immagine VARCHAR(255),
    tipo_B CHAR(1) NOT NULL DEFAULT 'S',
    FOREIGN KEY (id_poi) REFERENCES poi(id_poi) ON DELETE CASCADE
);

-- Inserimento di immagini e video di esempio
INSERT INTO immagini (id_poi, link_video_b, link_immagine)
VALUES 
(1, 'video_colosseo.mp4', 'colosseo.jpg'),
(2, 'video_torre_eiffel.mp4', 'torre_eiffel.jpg'),
(3, 'video_statua_liberta.mp4', 'statua_liberta.jpg');

-- Creazione della tabella descrizioni_img per le didascalie multilingua
CREATE TABLE descrizioni_img (
    id_descrizione INT AUTO_INCREMENT PRIMARY KEY,
    id_poi INT NOT NULL,
    id_immagine INT NOT NULL,
    didascalia TEXT NOT NULL,
    lingua ENUM('ITA', 'ENG') NOT NULL,
    FOREIGN KEY (id_poi) REFERENCES poi(id_poi) ON DELETE CASCADE,
    FOREIGN KEY (id_immagine) REFERENCES immagini(id_immagine) ON DELETE CASCADE
);

-- Inserimento di didascalie in italiano e inglese
INSERT INTO descrizioni_img (id_poi, id_immagine, didascalia, lingua)
VALUES 
(1, 1, 'Il Colosseo, icona di Roma.', 'ITA'),
(1, 1, 'The Colosseum, icon of Rome.', 'ENG'),
(2, 2, 'La Torre Eiffel, simbolo di Parigi.', 'ITA'),
(2, 2, 'The Eiffel Tower, symbol of Paris.', 'ENG'),
(3, 3, 'La Statua della Libertà, simbolo di New York.', 'ITA'),
(3, 3, 'The Statue of Liberty, symbol of New York.', 'ENG');