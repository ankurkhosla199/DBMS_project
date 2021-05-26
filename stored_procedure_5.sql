DELIMITER //

CREATE PROCEDURE autodelete(
	
)

BEGIN

DECLARE today date;
declare leave_id_button int;
declare  faculty_id_button varchar(100) default 0;
DECLARE applied_on_button date;
DECLARE start_on_button date;
declare number_leave_button int;
DECLARE finished INTEGER DEFAULT 0;
 declare status_button int;



DEClARE curEmail 
		CURSOR FOR 
			SELECT leave_id FROM leaves_in_process where leave_start_date=CURDATE() ;
             DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET finished = 1;
select CURDATE() into today;
      
   
     
	OPEN curEmail;

	getEmail: LOOP
		FETCH curEmail INTO leave_id_button;
        IF finished = 1 THEN
			LEAVE getEmail;
            end if;
       
        select leave_id into leave_id_button from leaves_in_process where   leave_id=leave_id_button;
        select faculty_id into faculty_id_button from leaves_in_process  where leave_id=leave_id_button;
        select applied_on into applied_on_button from leaves_in_process   where leave_id=leave_id_button ;
        select number_of_leaves into number_leave_button from leaves_in_process   where leave_id=leave_id_button;
         select status into status_button from leaves_in_process where   leave_id=leave_id_button;
        
        if (status_button =1 or status_button=0) then 
        insert into leave_data values (leave_id_button,faculty_id_button,9,applied_on_button,today,today,number_leave_button);
        update leaves_in_process set status= 5  where leave_id=leave_id_button;
         update faculty set pending_leaves=pending_leaves+number_leave_button where  faculty_id=faculty_id_button;
      end if;
	

	END LOOP getEmail;
	CLOSE curEmail;



END