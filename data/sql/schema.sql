CREATE TABLE autor_noticia (noticia_id BIGINT, autor_id BIGINT, PRIMARY KEY(noticia_id, autor_id)) ENGINE = INNODB;
CREATE TABLE comentario (id BIGINT AUTO_INCREMENT, texto VARCHAR(140) NOT NULL, fecha DATE NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE comentario_noticia (comentario_id BIGINT, noticia_id BIGINT, PRIMARY KEY(comentario_id, noticia_id)) ENGINE = INNODB;
CREATE TABLE comentario_usuario (comentario_id BIGINT, usuario_id BIGINT, PRIMARY KEY(comentario_id, usuario_id)) ENGINE = INNODB;
CREATE TABLE noticia (id BIGINT AUTO_INCREMENT, titulo VARCHAR(150) NOT NULL, subtitulo VARCHAR(250) NOT NULL, texto TEXT NOT NULL, fecha DATE NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE seccion (id BIGINT AUTO_INCREMENT, tipo VARCHAR(15) NOT NULL, seccion VARCHAR(20) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE seccion_noticia (seccion_id BIGINT, importancia BIGINT, noticia_id BIGINT, PRIMARY KEY(seccion_id, noticia_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE autor_noticia ADD CONSTRAINT autor_noticia_noticia_id_noticia_id FOREIGN KEY (noticia_id) REFERENCES noticia(id);
ALTER TABLE autor_noticia ADD CONSTRAINT autor_noticia_autor_id_sf_guard_user_id FOREIGN KEY (autor_id) REFERENCES sf_guard_user(id);
ALTER TABLE comentario_noticia ADD CONSTRAINT comentario_noticia_noticia_id_noticia_id FOREIGN KEY (noticia_id) REFERENCES noticia(id);
ALTER TABLE comentario_noticia ADD CONSTRAINT comentario_noticia_comentario_id_comentario_id FOREIGN KEY (comentario_id) REFERENCES comentario(id);
ALTER TABLE comentario_usuario ADD CONSTRAINT comentario_usuario_usuario_id_sf_guard_user_id FOREIGN KEY (usuario_id) REFERENCES sf_guard_user(id);
ALTER TABLE comentario_usuario ADD CONSTRAINT comentario_usuario_comentario_id_comentario_id FOREIGN KEY (comentario_id) REFERENCES comentario(id);
ALTER TABLE seccion_noticia ADD CONSTRAINT seccion_noticia_seccion_id_seccion_id FOREIGN KEY (seccion_id) REFERENCES seccion(id);
ALTER TABLE seccion_noticia ADD CONSTRAINT seccion_noticia_noticia_id_noticia_id FOREIGN KEY (noticia_id) REFERENCES noticia(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
