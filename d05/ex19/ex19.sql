SELECT
  datediff(max(`date`), min(`date`)) AS `uptime`
FROM
  `db_jandre-d`.`member_history`;
