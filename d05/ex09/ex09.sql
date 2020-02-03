SELECT
  COUNT(*) as `nb_short-films`
FROM
  `db_jandre-d`.`film`
WHERE
  `duration` <= 42;
