SELECT
  `floor_number` as `floor`, SUM(`nb_seats`) as `seats`
FROM
  `db_jandre-d`.`cinema`
GROUP BY `floor_number` ORDER BY `seats` DESC;
