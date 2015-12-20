
CREATE TABLE messages (
                    id INTEGER PRIMARY KEY, 
                    datereception TEXT, 
                    expeditor TEXT, 
                    subject TEXT,
			corps TEXT);


CREATE TABLE roles (
                    id INTEGER PRIMARY KEY, 
                    name TEXT);


CREATE TABLE utilisateurs (
                    id INTEGER PRIMARY KEY, 
                    login TEXT,
			password TEXT,
			enable INTEGER,
			role INTEGER);

CREATE TABLE messutil (
                    idutilisateur INTEGER,
			idmessage INTEGER);
