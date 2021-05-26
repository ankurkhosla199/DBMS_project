DELIMITER //

CREATE PROCEDURE submitbutton (
	faculty_id_login varchar(100),leave_start_date date, no_of_leaves int(100),comment_fac VARCHAR(1000)
)

BEGIN

    DECLARE directed INT(10) DEFAULT 0;
    declare forward_to INT default 0;
    declare fac_position int default 0;
	declare leave_id_login int default 0;
    declare comment_id_login int default 0;
    
    DECLARE today date;
    select CURDATE() into today;

    
 	select position into fac_position from faculty where faculty_id = faculty_id_login;
    
    select max(leave_id) into leave_id_login from leaves_in_process ;
    set leave_id_login = leave_id_login + 1;
    
    select max(comment_id) into comment_id_login  from leave_comment ;
   set comment_id_login =comment_id_login +1;
    

    IF fac_position = 2 THEN
   		set forward_to = 0;
	ELSEIF fac_position = 1  THEN
   		set forward_to = 0;
    ELSEIF fac_position = 3  THEN
   		set forward_to = 2;
	END IF;
    
    
	INSERT INTO leaves_in_process values (leave_id_login, faculty_id_login, today, 0, forward_to, leave_start_date, no_of_leaves) ;
    UPDATE faculty set pending_leaves=pending_leaves-no_of_leaves where faculty_id = faculty_id_login;
    Insert into leave_comment values (comment_id_login, leave_id_login, faculty_id_login, fac_position, comment_fac, forward_to, today);
    
    
    IF fac_position = 0 THEN 
    	INSERT INTO leave_data values (leave_id_login, faculty_id_login, 2, today, today, leave_start_date, no_of_leaves);
    	UPDATE leaves_in_process set leaves_in_process.status=2 where leave_id = leave_id_login;
    END IF;
    
END
