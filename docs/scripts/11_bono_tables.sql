
-- -----------------------------------------------------
-- Table `books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(45) NOT NULL,
  `book_date` DATE NOT NULL,
  `book_author` VARCHAR(255) NOT NULL,
  `book_type` CHAR(3) NULL,
  `book_barcode` VARCHAR(45) NULL,
  `book_status` CHAR(3) NOT NULL,
  PRIMARY KEY (`book_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cars`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cars` (
  `cars_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `car_model` CHAR(3) NOT NULL,
  `car_owner` VARCHAR(255) NULL,
  `car_plaque` VARCHAR(45) NULL,
  `car_year` INT(4) NULL,
  `car_color` VARCHAR(45) NULL,
  `car_motor` VARCHAR(45) NULL,
  `car_status` CHAR(3) NULL,
  PRIMARY KEY (`cars_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` BIGINT(13) NOT NULL AUTO_INCREMENT,
  `student_name` VARCHAR(255) NULL,
  `student_birthdate` DATE NULL,
  `student_gender` CHAR(3) NULL,
  `student_email` VARCHAR(128) NULL,
  `student_phone` VARCHAR(45) NULL,
  `student_status` CHAR(3) NULL,
  PRIMARY KEY (`student_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `microcontrollers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `microcontrollers` (
  `mc_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mc_name` VARCHAR(128) NULL,
  `mc_hertz` DECIMAL(8,2) NULL,
  `mc_ports` INT(4) NULL,
  `mc_brand` VARCHAR(45) NULL,
  `mc_status` CHAR(3) NULL,
  `mc_type` CHAR(3) NULL,
  PRIMARY KEY (`mc_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softwares`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softwares` (
  `sw_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sw_name` VARCHAR(128) NULL,
  `sw_os` VARCHAR(45) NULL,
  `sw_type` CHAR(3) NULL,
  `sw_brand` VARCHAR(45) NULL,
  `sw_version` DECIMAL(8,2) NULL,
  `sw_status` CHAR(3) NULL,
  PRIMARY KEY (`sw_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cinemas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cinemas` (
  `cinema_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cinema_name` VARCHAR(45) NULL,
  `cinema_brand` VARCHAR(45) NULL,
  `cinema_seats` INT(4) NULL,
  `cinema_type` CHAR(3) NULL,
  `cinema_status` CHAR(3) NULL,
  PRIMARY KEY (`cinema_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `coworkingplaces`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `coworkingplaces` (
  `cwp_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cwp_name` VARCHAR(128) NULL,
  `cwp_email` VARCHAR(255) NULL,
  `cwp_phone` VARCHAR(45) NULL,
  `cwp_type` CHAR(3) NULL,
  `cwp_status` CHAR(3) NULL,
  PRIMARY KEY (`cwp_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hospitals`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hospitals` (
  `hsp_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hsp_name` VARCHAR(128) NULL,
  `hsp_type` CHAR(3) NULL,
  `hsp_brand` VARCHAR(45) NULL,
  `hsp_url` VARCHAR(255) NULL,
  `hsp_status` CHAR(3) NULL,
  PRIMARY KEY (`hsp_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urbanfoods`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `urbanfoods` (
  `urbfood_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `urbfood_name` VARCHAR(128) NULL,
  `urbfood_type` CHAR(3) NULL,
  `urbfood_brand` VARCHAR(45) NULL,
  `urbfood_url` VARCHAR(255) NULL,
  `urbfood_status` CHAR(3) NULL,
  PRIMARY KEY (`urbfood_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `musictracks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `musictracks` (
  `mst_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mst_name` VARCHAR(128) NULL,
  `mst_album` VARCHAR(45) NULL,
  `mst_type` CHAR(3) NULL,
  `mst_author` VARCHAR(128) NULL,
  `mst_status` CHAR(3) NULL,
  PRIMARY KEY (`mst_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dresses` (
  `dress_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dress_name` VARCHAR(45) NULL,
  `dress_style` CHAR(3) NULL,
  `dress_pieces` INT(2) NULL,
  `dress_color` VARCHAR(45) NULL,
  `dress_status` CHAR(3) NULL,
  PRIMARY KEY (`dress_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_name` VARCHAR(128) NULL,
  `movie_type` CHAR(3) NULL,
  `movie_mainlead` VARCHAR(128) NULL,
  `movie_producer` VARCHAR(128) NULL,
  `movie_status` CHAR(3) NULL,
  PRIMARY KEY (`movie_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eyeglasses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eyeglasses` (
  `egl_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `egl_name` VARCHAR(128) NULL,
  `egl_type` CHAR(3) NULL,
  `egl_designer` VARCHAR(45) NULL,
  `egl_color` VARCHAR(45) NULL,
  `egl_status` CHAR(3) NULL,
  PRIMARY KEY (`egl_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `game_name` VARCHAR(128) NULL,
  `game_type` CHAR(3) NULL,
  `game_brand` VARCHAR(45) NULL,
  `game_console` VARCHAR(45) NULL,
  `game_status` CHAR(3) NULL,
  PRIMARY KEY (`game_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sports` (
  `sport_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sport_name` VARCHAR(128) NULL,
  `sport_type` CHAR(3) NULL,
  `sport_ranking` INT NULL,
  `sport_commet` VARCHAR(512) NULL,
  `sport_status` CHAR(3) NULL,
  PRIMARY KEY (`sport_id`))
ENGINE = InnoDB;