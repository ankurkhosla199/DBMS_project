DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `createproject`(IN `name` VARCHAR(1000), IN `des` VARCHAR(1000), IN `main` VARCHAR(1000), IN `co1` VARCHAR(1000), IN `co2` VARCHAR(1000), IN `co3` VARCHAR(1000), IN `co4` VARCHAR(1000), IN `co5` VARCHAR(1000))
BEGIN
declare id int;
declare who int;
select max(project_id) into id from project;
set id = id+1;
insert into project values (id, name , des, main, co1, co2, co3 ,co4, co5);

end$$
DELIMITER ;