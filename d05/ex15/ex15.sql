SELECT
  REVERSE(SUBSTRING(`phone_number`, 2)) as `rebmunenohp`
FROM
  `db_jandre-d`.`distrib`
WHERE
  `phone_number` like '05%';
