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
        created_at timestamp NOT NULL DEFAULT current_timestamp,
        instagram varchar(255) DEFAULT NULL,
        cms varchar(255) DEFAULT NULL
    );
END $$;


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
