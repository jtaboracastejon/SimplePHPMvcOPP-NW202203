CREATE TABLE nw202203.candidatos (
	id BIGINT(13) auto_increment NOT NULL,
	identidad varchar(13) NOT NULL,
	nombre varchar(100) NOT NULL,
	edad INT NOT NULL,
	created DATETIME NULL,
	updated DATETIME NULL,
	CONSTRAINT candidatos_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;