SELECT
  `title`,
  `summary`
FROM
  `db_jandre-d`.`film`
WHERE
  `summary` like '%42%'
  OR `title` like '%42%'
ORDER BY
  `duration` ASC;
