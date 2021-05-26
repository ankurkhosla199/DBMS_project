DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `approve_dean`(id int, decision int)
BEGIN

if decision = 2 then 
update project_data set status = 2 where project_id=id and status = 0;
else update project_data set status = 1 where project_id=id and status = 0;
end if;

end$$
DELIMITER ;