DO $$ 
BEGIN
    -- Suppression de la table projects si elle existe
    IF EXISTS (SELECT 1 FROM pg_tables WHERE tablename = 'projects') THEN
        DROP TABLE projects;
    END IF;

    -- Création de la table projects
    CREATE TABLE projects (
        id SERIAL PRIMARY KEY,
        title varchar(255) NOT NULL,
        description text NOT NULL,
        image varchar(255) DEFAULT NULL,
        lien varchar(255) DEFAULT NULL,
        github varchar(255) DEFAULT NULL,
        project_date date DEFAULT NULL,
        stack varchar(255) DEFAULT NULL,
        carousel_photos jsonb DEFAULT NULL,
        carousel_photos_smartphone jsonb DEFAULT NULL,
        created_at timestamp NOT NULL DEFAULT current_timestamp(),
        instagram varchar(255) DEFAULT NULL,
        cms varchar(255) DEFAULT NULL
    );
END $$;

-- -- Insertion des données dans la table projects
INSERT INTO projects VALUES 
(1, 'Olympic Ticket Hub', '<p><strong>&quot;Olympic Ticket Hub&quot;</strong>...', 'images/athlete-feminine.jpg', 'https://jo-ticketing-site-e53a4a320f9f.herokuapp.com/', 'https://github.com/Ecmosplasmidou/site_jo_finale.git', '2024-10-01', 'Python/Django/JS/Bootstrap', '["images/jo_image_1.png", "images/jo_image_2.png", "images/jo_image_3.png"]','["images/jo_image_smartphone_1.png", "images/jo_image_smartphone_2.png", "images/jo_image_smartphone_3.png"]', '2024-10-20 18:17:15', '', ''),
(2, 'Trendy-Paris', '<p><strong>Dont be original, be unique!</strong></p>', 'images/trendy-paris.png', '', '', '2021-10-13', 'HTML/CSS/JavaScript', '["images/TP.jpg", "images/TP_1.jpg", "images/TP_2.jpg"]', '2024-10-21 09:43:16', 'https://www.instagram.com/trendypofficiel/', 'SHOPIFY'),
(3, 'Ecmosgotchi', '<p><strong>Come to play with teh ecmosgotchi her:</strong></p>', 'images/ecmosgotchi_acceuil.png', 'https://ecmosgotchi-tamagotchi-by-ecmosdev.netlify.app/', '', '2024-03-13', 'HTML/CSS/JavaScript', '["images/ecmosgotchi.png", "images/ecmosgotchi_2.png", "images/ecmosgotchi_3.png"]', '["images/ecmosgotchi_smartphone.png", "images/ecmosgotchi_smartphone_1.png", "images/ecmosgotchi_smartphone_2.png"]','["images/jo_image_smartphone_1.png", "images/jo_image_smartphone_2.png", "images/jo_image_smartphone_3.png"]' , '2024-10-21 11:58:21', '', '');


-- Vérifiez et créez la table users
DO $$ 
BEGIN
    -- Suppression de la table users si elle existe
    IF EXISTS (SELECT 1 FROM pg_tables WHERE tablename = 'users') THEN
        DROP TABLE users;
    END IF;

    -- Création de la table users
    CREATE TABLE users (
        id SERIAL PRIMARY KEY,
        username varchar(255) NOT NULL,
        password varchar(255) NOT NULL,
        created_at timestamp NOT NULL DEFAULT current_timestamp,
        UNIQUE(username)
    );
END $$;

-- -- Insertion des données dans la table users
INSERT INTO users (username, password, created_at) VALUES 
('admin', '$2y$10$6EVcPOcbzdR61Mu.SVvG3umptdl6aMSJ1GKuwkS/ruCPwA5msF0Yu', '2024-10-21 09:23:24');
