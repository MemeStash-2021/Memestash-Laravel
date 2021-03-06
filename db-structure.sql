create database if not exists memestash;

use memestash;
set FOREIGN_KEY_CHECKS = 0;
drop table if exists users;
drop table if exists collections;
drop table if exists cards;
drop table if exists trades;
drop table if exists offers;
drop table if exists chats;
drop table if exists messages;
set FOREIGN_KEY_CHECKS = 1;

create user if not exists laravel_provider identified by '1araS3nd';
grant all privileges on memestash to 'laravel_provider';

create table messages
(
    chat_id   int          not null,
    message   varchar(255) not null,
    timestamp datetime     not null,
    foreign key (chat_id) references chats (id)
);

