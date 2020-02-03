SELECT
  `last_name`,
  `first_name`
FROM
  `db_jandre-d`.`user_card`
WHERE
  `last_name` like '%_-_%'
  OR `first_name` like '%_-_%'
ORDER BY
  `last_name` ASC,
  `first_name` ASC;
