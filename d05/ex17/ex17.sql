SELECT
  COUNT(*) as `nb_susc`,
  FLOOR(SUM(`price`) / COUNT(*)) as `av_susc`,
  SUM(MOD(`duration_sub`, 42)) as `ft`
FROM
  `db_jandre-d`.`subscription`
