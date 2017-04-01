DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertAlumno` (IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_genero` VARCHAR(50), IN `_edad` VARCHAR(50), IN `_curp` VARCHAR(50), IN `_matricula` VARCHAR(50), IN `_turno` VARCHAR(50), IN `_idGrupos` INT, IN `_idGeneraciones` INT)  BEGIN
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
    START TRANSACTION;
    BEGIN
      INSERT INTO informacion
      (nombre,apellido,genero,edad,curp,fecha_ingreso,foto) VALUES (_nombre,_apellido,_genero,_edad,_curp,now(),'foto');
     
     INSERT INTO alumnos
     (estado,matricula,turno,idInformacionFK,idGrupos,idGeneraciones) VALUES ('Activo',_matricula,_turno,(SELECT MAX(idInformacion) FROM informacion ), _idGrupos,_idGeneraciones);
      IF `_rollback` THEN
        ROLLBACK;
        SELECT 'ERROR' AS 'MESSAGE';
      ELSE
        COMMIT;
        SELECT 'OK' AS 'MESSAGE';
      END IF;
  END;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateAlumno` (IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(50), IN `_genero` VARCHAR(50), IN `_edad` VARCHAR(50), IN `_curp` VARCHAR(50), IN `_foto` VARCHAR(50), IN `_estado` VARCHAR(50), IN `_matricula` VARCHAR(50), IN `_turno` VARCHAR(50), IN `_dGrupos` INT, IN `_idGeneraciones` INT, IN `_idInformacion` INT)  BEGIN
    DECLARE `_rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
    START TRANSACTION;
    BEGIN
      UPDATE informacion SET nombre=_nombre,apellido=_apellido,genero=_genero,edad=_edad,curp=_curp,foto=_foto WHERE idInformacion=_idInformacion;

      UPDATE alumnos SET estado=_estado,matricula=_matricula,turno=_turno,idGrupos=_dGrupos,idGeneraciones=_idGeneraciones WHERE idInformacionFK=_idInformacion;
      IF `_rollback` THEN
        ROLLBACK;
        SELECT 'ERROR' AS 'MESSAGE';
      ELSE
        COMMIT;
        SELECT 'OK' AS 'MESSAGE';
      END IF;
  END ;
END$$

DELIMITER ;