DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `approve_pi`(id int, decision int)
BEGIN

if decision = 2 then 
update project_data set status =2 where project_id=id and status = 0;
else update project_data set directed_to =0 where project_id=id and status = 0;
end if;

end$$
DELIMITER ;