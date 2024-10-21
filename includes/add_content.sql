CREATE TABLE IF EXISTS projects (
  id SERIAL PRIMARY KEY,
  title varchar(255) NOT NULL,
  description text NOT NULL,
  image varchar(255) DEFAULT NULL,
  lien varchar(255) DEFAULT NULL,
  github varchar(255) DEFAULT NULL,
  project_date date DEFAULT NULL,
  stack varchar(255) DEFAULT NULL,
  carousel_photos jsonb DEFAULT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp,
  instagram varchar(255) DEFAULT NULL,
  cms varchar(255) DEFAULT NULL
);

CREATE TABLE IF EXISTS users (
  id SERIAL PRIMARY KEY,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp,
  UNIQUE(username)
);
