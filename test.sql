create table users
(
    id       int(11) not null auto_increment,
    Name     varchar(100),
    UserName varchar(100),
    Password varchar(100),
    Email    varchar(100),
    Phone    varchar(100),
    Gender   varchar(100),
    DOB      varchar(100),
    Address  varchar(100),

    Photo    varchar(100),
    primary key (id)
);


