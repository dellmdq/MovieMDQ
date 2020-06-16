create database sushimdq;

use sushimdq;

create table  if not exists users (
    id_user int auto_increment,
    user_name varchar (50),
    user_lastName varchar (50),
    user_mail varchar (50) unique,
    user_pass varchar (20),
    constraint Pk_users primary key (id_user)
    )engine =innodb;

select * from users;


insert into users (id_user, user_name, user_lastName, user_mail,user_pass) value (1,"Erik","Dell","erikdell@gmail.com","1234");