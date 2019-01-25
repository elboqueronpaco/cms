
CREATE TABLE users (
	id SERIAL NOT NULL,
	name VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	username VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(256)NOT NULL,
	avatar VARCHAR(256) NOT NULL,
	rol_id INT DEFAULT 3,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT users_id_pk PRIMARY KEY (id),
	CONSTRAINT users_username_uk UNIQUE (username),
	CONSTRAINT users_email UNIQUE (email),
	CONSTRAINT users_rol_id_fk FOREIGN KEY (rol_id)
		REFERENCES roles (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);