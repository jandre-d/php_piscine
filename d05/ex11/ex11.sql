SELECT
  UPPER(`usr`.`last_name`) as `NAME`,
  `usr`.`first_name`,
  `sub`.`price`
FROM
  `db_jandre-d`.`user_card` `usr`,
  `db_jandre-d`.`member` `mem`,
  `db_jandre-d`.`subscription` `sub`
WHERE
  `sub`.`price` > 42
  AND `mem`.`id_sub` = `sub`.`id_sub`
  AND `mem`.`id_user_card` = `usr`.`id_user`
ORDER BY
  `usr`.`last_name` ASC,
  `usr`.`first_name` ASC;
