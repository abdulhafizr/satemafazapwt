CREATE TABLE `tb_menu_utama` (
	`id_menu_utama` INT NOT NULL AUTO_INCREMENT,
	`foto` TEXT,
	`judul` varchar(255),
	`deskripsi` TEXT,
	PRIMARY KEY (`id_menu_utama`)
);

CREATE TABLE `tb_soft_opening` (
	`id_soft_opening` INT NOT NULL AUTO_INCREMENT,
	`foto` TEXT,
	`judul` varchar(255),
	`deskripsi` TEXT,
	PRIMARY KEY (`id_soft_opening`)
);

CREATE TABLE `tb_testimonial` (
	`id_testimonial` INT NOT NULL AUTO_INCREMENT,
	`foto` TEXT,
	PRIMARY KEY (`id_testimonial`)
);

CREATE TABLE `tb_user` (
	`id_user` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`nama` varchar(255) NOT NULL,
	`photo` TEXT(255) NOT NULL,
	PRIMARY KEY (`id_user`)
);





