--CREACiÓN DE LA TABLA DE LOS ROLES
CREATE TABLE roles (
	id SERIAL NOT NULL,
	rol VARCHAR(50) NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT roles_id_pk PRIMARY KEY (id),
	CONSTRAINT roles_rol_uk UNIQUE (rol)
);