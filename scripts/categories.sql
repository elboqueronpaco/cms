--CREACiÓN DE LA TABLA DE LOS USUARIOS
CREATE TABLE categories (
	id SERIAL NOT NULL,
	category VARCHAR(50) NOT NULL,
	admin INT DEFAULT 1,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT categories_id_pk PRIMARY KEY (id),
	CONSTRAINT categories_categories_uk UNIQUE (category),
	CONSTRAINT categories_admin_fk FOREIGN KEY (admin)
		REFERENCES users (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);