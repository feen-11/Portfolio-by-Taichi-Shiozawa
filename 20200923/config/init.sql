create database crud_php
grant all on crud_php.* to dbuser@localhost identified by '1114';

create table posts (
  id int not null auto_increment primary key,
  body varchar(140),
  created datetime,
  updated datetime,
  userId int 
);

create table users (
  userId int not null auto_increment primary key,
  email varchar(255),
  name varchar(255),
  password varchar(255),
  created datetime,
  updated datetime
);

-- create table images (
--   imageId int not null auto_increment primary key,
--   image_name varchar(255),
--   image_type varchar(255),
--   image_content mediumblob,
--   image_size int,
--   userId int 
-- );