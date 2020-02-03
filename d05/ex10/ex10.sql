SELECT
  `a`.`title` as `Title`,
  `a`.`summary` as `Summary`,
  `a`.`prod_year`
FROM
  `db_jandre-d`.`film` `a`,
  `db_jandre-d`.`genre` `b`
WHERE
  `a`.`id_genre` = `b`.`id_genre`
  AND `b`.`name` = "erotic"
ORDER BY
  `a`.`prod_year` DESC;
