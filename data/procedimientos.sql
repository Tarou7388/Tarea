USE superhero;

DROP PROCEDURE spu_resumen_alienacion_productor;

CREATE PROCEDURE SPU_TABLA_PUBLICACION_SUPERHEROES(
IN _IDPUBLISHER INT) BEGIN SELECT 
	SELECT
	    SUP.superhero_name,
	    SUP.full_name,
	    GEN.gender,
	    RAC.race,
	    PUB.publisher_name
	FROM superhero SUP
	    INNER JOIN publisher PUB ON PUB.id = SUP.publisher_id
	    INNER JOIN gender GEN ON GEN.id = SUP.gender_id
	    INNER JOIN race RAC ON RAC.id = SUP.race_id
	WHERE
	    SUP.publisher_id = _idpublisher;
	END;


CREATE PROCEDURE SPU_LISTAR_PRODUCTORES() BEGIN SELECT 
	SELECT * FROM publisher;
	END;


CREATE PROCEDURE SPU_RESUMEN_ALIENACION() BEGIN SELECT 
	SELECT
	    ALI.alignment as 'alienamiento',
	    COUNT(ALI.alignment) as 'total'
	FROM superhero SUP
	    LEFT JOIN alignment ALI ON ALI.id = SUP.alignment_id
	GROUP BY ALI.alignment
	ORDER BY total;
	END;


CREATE PROCEDURE spu_resumen_alienacion_productor(IN PUBLISHER_ID INT) 
BEGIN
  SELECT
	    ALG.alignment AS Alienacion,
	    COUNT(SUP.id) AS Heroes
	FROM superhero SUP
	    LEFT JOIN alignment ALG ON Alg.id = SUP.alignment_id
	WHERE publisher_id = PUBLISHER_ID
	GROUP BY
	    ALG.id,
	    ALG.alignment;
	END;


CALL spu_resumen_alienacion;

CALL spu_resumen_alienacion_productor(3);

CALL spu_listar_productores();

CALL spu_tabla_publicacion_superheroes(1)