CREATE TABLE WA_TEST (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(25) NOT NULL,
    user_surname VARCHAR(25) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_age INT DEFAULT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO wa_test (user_name, user_surname, user_email, user_age) VALUES
("Petr", "Novák", "petr.novak@seznam.cz", 30),
("Franta", "Novák", "franta.novak@gmail.com", 24),
("Roman", "Nový", "rnovy@email.cz", 15),
("Adam", "Starý", "a.stary@yahoo.com", 38)