CREATE DATABASE cannela;
USE cannela;
CREATE TABLE profiledata(mail varchar(100) NOT NULL primary key, psw varchar(20) NOT NULL,  rol varchar(20), nom varchar(50), ln varchar(50), phone varchar(10));
CREATE TABLE pubs(nimg int auto_increment NOT NULL primary key, pmail varchar(100),img blob);
CREATE TABLE orders(norder int auto_increment NOT NULL primary key, omail varchar(100), state varchar(30), msg varchar(500), bill int);
CREATE TABLE menu(prod varchar(50) NOT NULL, price int);
CREATE TABLE menuxorders(norder int NOT NULL, product varchar(50) NOT NULL);
CREATE TABLE catering(nsolic int auto_increment NOT NULL primary key, cmail varchar(100) NOT NULL, npack int NOT NULL, 
dtime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, state varchar(30) NOT NULL DEFAULT "En Proceso");

ALTER TABLE profiledata add constraint pk_profile primary key (mail);
ALTER TABLE menu add constraint pk_menu primary key(prod);
ALTER TABLE menuxorders add constraint pk_mxo primary key (norder, product);

ALTER TABLE pubs add constraint fk_pmail foreign key (pmail) references profiledata(mail) on update cascade;
ALTER TABLE orders add constraint fk_omail foreign key (omail) references profiledata(mail) on update cascade;
ALTER TABLE menuxorders add constraint fk_norder foreign key (norder) references orders(norder);
ALTER TABLE menuxorders add constraint fk_prod foreign key (product) references menu(prod) on update cascade;
ALTER TABLE catering add constraint fk_cmail foreign key (cmail) references profiledata(mail) on update cascade;

#menu data#
INSERT INTO menu VALUES ('capuccino', 35), ('expreso', 30), ('cupcake',20), ('frapuccino',45),
('tiramisu',60), ('frappe', 45),('late', 45), ('maletada', 50); 

#admin data#
INSERT INTO profiledata VALUES('mokef2000@gmail.com', 'cannelaAdmin', 'admin', 'Fabiola', 'Martinez', '5565046478');

#queries#
SELECT * FROM menu;
SELECT * FROM menu WHERE prod='frappe';
SELECT * FROM profiledata;

#faults#
