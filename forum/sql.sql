CREATE TABLE comment(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    date datetime not null,
    message TEXT not null,
    reply TEXT
);


CREATE TABLE user(
	id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	uid varchar(128) not null,
	pwd varchar(128) not null
);


CREATE TABLE replyTable(
   id int(20) NOT null PRIMARY KEY,
   replyMessage text not null
);

CREATE TABLE reply (
  reply text not null
);