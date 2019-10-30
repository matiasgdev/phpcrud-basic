/* create a table name */

CREATE DATABASE IF NOT EXISTS "your table name";
USE "your table name";

/* users table */
CREATE TABLE users (
  id             int(255) auto_increment not null,
  name         varchar(100) not null,
  lastname       varchar(100) not null,
  email          varchar(255) not null,
  password       varchar(255) not null,
  register_date date not null,
  CONSTRAINT pk_users PRIMARY KEY(id),
  CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

/* categories table */
CREATE TABLE categories (
  id         int(255) auto_increment not null,
  name     varchar(100) not null,
  CONSTRAINT pk_categories PRIMARY KEY(id)
)ENGINE=InnoDb;

/* posts table */
CREATE TABLE posts (
  id                     int(255) auto_increment not null,
  author_id             int(255) not  null ,
  category_id           int(255) not null,
  title                 varchar(255) not null,
  description            MEDIUMTEXT,
  create_at         date not  null,
  update_at          date,
  CONSTRAINT pk_posts PRIMARY KEY(id),
  CONSTRAINT fk_post_author FOREIGN KEY(author_id) REFERENCES users(id), 
  CONSTRAINT fk_post_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;