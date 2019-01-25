--CREACiÓN DE LA TABLA DE LOS USUARIOS
CREATE TABLE comments(
	id SERIAl NOT NULL,
	comment TEXT NOT NULL,
	author INT NOT NULL,
	post_blog_id INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT comments_id_pk PRIMARY KEY (id),
	CONSTRAINT comments_author_fk FOREIGN KEY (author)
		REFERENCES users (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT comments_blog_post_blog_fk FOREIGN KEY (post_blog_id)
		REFERENCES posts_blogs (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);
	
CREATE TABLE responses_comment (
	id SERIAL NOT NULL,
	response TEXT NOT NULL,
	author INT NOT NULL,
	comment_id INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT responses_comments_id_pk PRIMARY KEY (id),
	CONSTRAINT responses_comments_author_fk FOREIGN KEY (author)
		REFERENCES users (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT responses_comments_comments_fk FOREIGN KEY (comment_id)
		REFERENCES comments (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);

CREATE TABLE responses_responses_comment(
	id SERIAL NOT NULL,
	response TEXT NOT NULL,
	author INT NOT NULL,
	responses_comment_id INT NOT NULL,
	created_at timestamp DEFAULT now() NOT NULL,
	updated_at timestamp,
	CONSTRAINT response_responses_comments_id_pk PRIMARY KEY (id),
	CONSTRAINT response_responses_comments_author_fk FOREIGN KEY (author)
		REFERENCES users (id) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT response_responses_comments_comments_fk FOREIGN KEY (responses_comment_id)
		REFERENCES responses_comment (id) ON UPDATE RESTRICT ON DELETE RESTRICT
);





