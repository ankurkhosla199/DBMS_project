DELIMITER //

CREATE PROCEDURE checkyearend ()

BEGIN
    DECLARE datepart int;
    DECLARE monthpart int;
    DECLARE hourpart int;
    DECLARE minutepart int;
    
    DECLARE today date;
    select CURRENT_TIMESTAMP into today;
    
SELECT EXTRACT(DAY from today) into datepart;
SELECT EXTRACT(MONTH from today) into monthpart;
SELECT EXTRACT(HOUR from today) into hourpart;
SELECT EXTRACT(MINUTE from today) into minutepart;


if (monthpart=01 and datepart =01 and hourpart=0) then
	update  faculty set pending_leaves=10;
end if;

end