-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           PostgreSQL 14.2, compiled by Visual C++ build 1914, 64-bit
-- OS do Servidor:               
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE SEQUENCE IF NOT EXISTS role_id_seq;

-- Copiando estrutura para tabela public.cargos
CREATE TABLE IF NOT EXISTS "cargos" (
	"id" INTEGER NOT NULL DEFAULT nextval('role_id_seq'::regclass),
	"nome" CHAR(255) NOT NULL,
	"id_departamento" INTEGER NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Copiando dados para a tabela public.cargos: 3 rows
/*!40000 ALTER TABLE "cargos" DISABLE KEYS */;
INSERT INTO "cargos" ("nome", "id_departamento") VALUES
	('Desenvolvedor Full Stack                                                                                                                                                                                                                                       ', 1),
	('Analista Financeiro                                                                                                                                                                                                                                            ', 3),
	('Analista de Marketing                                                                                                                                                                                                                                          ', 5);
/*!40000 ALTER TABLE "cargos" ENABLE KEYS */;

CREATE SEQUENCE IF NOT EXISTS cost_center_id_seq;

-- Copiando estrutura para tabela public.centro_custos
CREATE TABLE IF NOT EXISTS "centro_custos" (
	"id" INTEGER NOT NULL DEFAULT nextval('cost_center_id_seq'::regclass),
	"nome" CHAR(255) NOT NULL,
	PRIMARY KEY ("id")
);

-- Copiando dados para a tabela public.centro_custos: 3 rows
/*!40000 ALTER TABLE "centro_custos" DISABLE KEYS */;
INSERT INTO "centro_custos" ("nome") VALUES
	('TI                                                                                                                                                                                                                                                             '),
	('Financeiro                                                                                                                                                                                                                                                     '),
	('Marketing                                                                                                                                                                                                                                                      ');
/*!40000 ALTER TABLE "centro_custos" ENABLE KEYS */;

CREATE SEQUENCE IF NOT EXISTS department_id_seq;

-- Copiando estrutura para tabela public.departamentos
CREATE TABLE IF NOT EXISTS "departamentos" (
	"id" INTEGER NOT NULL DEFAULT nextval('department_id_seq'::regclass),
	"nome" CHAR(255) NOT NULL,
	"id_centro_custo" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Copiando dados para a tabela public.departamentos: 7 rows
/*!40000 ALTER TABLE "departamentos" DISABLE KEYS */;
INSERT INTO "departamentos" ("nome", "id_centro_custo") VALUES
	('Tecnologia - Suporte                                                                                                                                                                                                                                           ', 1),
	('Financeiro - Contábil                                                                                                                                                                                                                                          ', 2),
	('Financeiro - Análise                                                                                                                                                                                                                                           ', 2),
	('Marketing - Análise                                                                                                                                                                                                                                            ', 3),
	('Marketing - Social Media                                                                                                                                                                                                                                       ', 3),
	('Tecnologia - Desenvolvimento                                                                                                                                                                                                                                   ', 1),
	('Marketing - Ads                                                                                                                                                                                                                                                ', 3);
/*!40000 ALTER TABLE "departamentos" ENABLE KEYS */;

CREATE SEQUENCE IF NOT EXISTS user_id_seq;

-- Copiando estrutura para tabela public.usuarios
CREATE TABLE IF NOT EXISTS "usuarios" (
	"nome" CHAR(255) NOT NULL,
	"sobrenome" CHAR(255) NULL DEFAULT NULL,
	"senha" CHAR(255) NOT NULL,
	"id_cargo" SMALLINT NULL DEFAULT NULL,
	"id_centro_custo" SMALLINT NULL DEFAULT NULL,
	"id" INTEGER NOT NULL DEFAULT nextval('user_id_seq'::regclass),
	"email" CHAR(255) NOT NULL DEFAULT '',
	"id_departamento" SMALLINT NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Copiando dados para a tabela public.usuarios: 5 rows
/*!40000 ALTER TABLE "usuarios" DISABLE KEYS */;
INSERT INTO "usuarios" ("nome", "sobrenome", "senha", "id_cargo", "id_centro_custo", "email", "id_departamento") VALUES
	('Mariana                                                                                                                                                                                                                                                        ', 'Costa                                                                                                                                                                                                                                                          ', '$2y$10$9GLYXLX04CnWFakPnr09KORk70wZ2qMAEAPeYAoNoa8oqtTOQpU3S                                                                                                                                                                                                   ', 3, 3, 'marianadacosta2011@hotmail.com                                                                                                                                                                                                                                 ', 6),
	('Gustavo                                                                                                                                                                                                                                                        ', 'Baringer                                                                                                                                                                                                                                                       ', '$2y$10$Wl/4mC1JsbxE7fac13Y.reDxF8FZ2WD11QNdOsU5TelGYJRbzlR8O                                                                                                                                                                                                   ', 1, 1,'gustavoteste@gmail.com                                                                                                                                                                                                                                         ', 1),
	('Little                                                                                                                                                                                                                                                         ', 'John                                                                                                                                                                                                                                                           ', '$2y$10$9GLYXLX04CnWFakPnr09KORk70wZ2qMAEAPeYAoNoa8oqtTOQpU3S                                                                                                                                                                                                   ', 1, 1,'joao.pereira@outlook.com                                                                                                                                                                                                                                       ', 1),
	('John                                                                                                                                                                                                                                                           ', 'Doe                                                                                                                                                                                                                                                            ', '$2y$10$TpKpC9EBHNmIf8N7HsfQouhrVLrq3qyiBkAeKKNM44oP51r7Ajj2q                                                                                                                                                                                                   ', 2, 2, 'johndoe@email.com                                                                                                                                                                                                                                              ', 3),
	('teste                                                                                                                                                                                                                                                          ', 'aaa                                                                                                                                                                                                                                                            ', '$2y$10$6AN0ylEZFW77H0t3OJeJVu5oWnt0cRPbaEUNWq7M.fC3mILAqsT86                                                                                                                                                                                                   ', 1, 3, 'emailteste@gmail.com                                                                                                                                                                                                                                           ', 2);
/*!40000 ALTER TABLE "usuarios" ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
