SELECT
  count(*) as 'movies'
FROM
  `db_jandre-d`.`member_history`
WHERE
  (
    `date` between '2006-10-30'
    and '2007-07-27'
  )
  OR (
    DAYOFMONTH(`date`) = 24
    AND MONTH(`date`) = 12
  );
