DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `apply`(IN `loginfac` VARCHAR(1000), IN `id` INT, IN `manpower` INT, IN `equipment` INT, IN `travel` INT, IN `month` INT, IN `jrf` INT, IN `srf` INT)
BEGIN

declare who int default 0;

insert into budget values(id, manpower, equipment, travel, month, jrf,srf);


if ((select main_pi from project where project_id=id)=loginfac) THEN
set who = 0;
else set who = 1;
end if;


insert into project_data values(id,who,0);
END$$
DELIMITER ;