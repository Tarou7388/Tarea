USE superhero;

DROP PROCEDURE spu_resumen_publicaciones_superheroes;
CREATE PROCEDURE spu_tabla_publicacion_superheroes(IN _idpublisher INT)
BEGIN
  SELECT 
  SUP.superhero_name,
  SUP.full_name,
  GEN.gender,
  RAC.race,
  PUB.publisher_name
  FROM superhero SUP
  INNER JOIN publisher PUB ON PUB.id=SUP.publisher_id
  INNER JOIN gender GEN ON GEN.id=SUP.gender_id
  INNER JOIN race RAC ON RAC.id=SUP.race_id
  WHERE SUP.publisher_id = _idpublisher;
END;

CREATE PROCEDURE spu_listar_productores()
BEGIN
  SELECT *
  FROM publisher;
END;

CREATE PROCEDURE spu_resumen_alienacion()
BEGIN

CALL spu_listar_productores();
CALL spu_tabla_publicacion_superheroes(1)