SELECT
  `last_name`,
  `first_name`,
  DATE_FORMAT(`birthdate`, '%Y-%m-%d') as `birthdate`
FROM
  `db_jandre-d`.`user_card`
WHERE
  YEAR(`birthdate`) = 1989
ORDER BY
  `last_name` ASC;
