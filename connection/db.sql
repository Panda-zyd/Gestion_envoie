CREATE TRIGGER check_duplicate_name_email BEFORE INSERT ON `agent`
    FOR EACH ROW
BEGIN
    IF EXISTS(SELECT * from `agent` where `agent`.`code_agent`!=NEW.code_agent) then
        IF EXISTS(SELECT * from `agent` where `agent`.`email` = NEW.email OR agent.name = NEW.name) THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Entry alredy exist';
        END IF;
    END IF;
END
