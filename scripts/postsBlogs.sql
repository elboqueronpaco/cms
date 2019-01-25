--CREACiÓN DE LA TABLA DE LOS USUARIOS
CREATE TABLE images(
	id SERIAl NOT NULL,
	image VARCHAR(256) NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT images_id_pk PRIMARY KEY (id)
);
	
CREATE TABLE posts_blogs (
	id SERIAL NOT NULL,
	title VARCHAR(256) NOT NULL,
	description TEXT NOT NULL,
	content TEXT NOT NULL,
	cover_page VARCHAR(256) NOT NUll,
	author INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT posts_blogs_id_pk PRIMARY KEY (id),
	CONSTRAINT posts_blogs_author_fk FOREIGN KEY (author)
		REFERENCES users (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE image_post_blog(
	id SERIAL NOT NULL,
	image_id INT NOT NULL,
	post_blog_id INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT image_post_blog_id_pk PRIMARY KEY (id),
	CONSTRAINT image_post_blog_post_blog_fk FOREIGN KEY (post_blog_id)
		REFERENCES posts_blogs (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT imabe_post_blog_image_id_fk FOREIGN KEY (image_id)
		REFERENCES images (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);
CREATE TABLE category_post_blog(
	id SERIAL NOT NULL,
	category_id INT NOT NULL,
	post_blog_id INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT category_post_blog_id_pk PRIMARY KEY (id),
	CONSTRAINT category_post_blog_post_blog_fk FOREIGN KEY (post_blog_id)
		REFERENCES posts_blogs (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT category_post_blog_image_id_fk FOREIGN KEY (category_id)
		REFERENCES categories (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);




