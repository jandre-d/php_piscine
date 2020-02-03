SELECT
  `title`,
  `summary`
FROM
  `db_jandre-d`.`film`
WHERE
  `summary` like '%vincent%'
ORDER BY
  `id_film` ASC;
