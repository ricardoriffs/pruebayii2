CREATE  TABLE IF NOT EXISTS `album` (
  `id` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `descripcion` TEXT NULL DEFAULT NULL ,
  `ano` TINYINT(4) NULL DEFAULT NULL ,
  `estado` VARCHAR(45) NULL DEFAULT NULL ,
  `usuario_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_album_usuario1` (`usuario_id` ASC) ,
  CONSTRAINT `fk_album_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE  TABLE IF NOT EXISTS `seccion` (
  `id` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `orden` TINYINT(2) NULL DEFAULT NULL ,
  `num_hojas` INT(11) NULL DEFAULT NULL ,
  `album_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_seccion_album` (`album_id` ASC) ,
  CONSTRAINT `fk_seccion_album`
    FOREIGN KEY (`album_id` )
    REFERENCES `album` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;

CREATE  TABLE IF NOT EXISTS `usuario` (
  `id` INT(11) NOT NULL ,
  `usuario` VARCHAR(45) NULL DEFAULT NULL ,
  `clave` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_swedish_ci;