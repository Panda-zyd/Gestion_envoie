BEGIN
    DECLARE new_code_package VARCHAR(13);
    DECLARE last_code_package varchar(13);
SELECT COUNT(*) INTO last_code_package FROM `package`;
IF NEW.type = "colis" THEN
    IF NEW.code_package is null THEN
        SET new_code_package = CONCAT("CL", LPAD(last_code_package, 9-length(last_code_package), '0'), "MA");
    else
        set new_code_package = CONCAT("CL", LPAD(NEW.code_package, 9, '0'), "MA");
ELSEIF NEW.type = "courier" THEN
    IF NEW.code_package is null then
        SET new_code_package = CONCAT("CR", LPAD(last_code_package, 9-length(last_code_package), '0'), "MA");
    else
        set new_code_package = CONCAT("CR", LPAD(NEW.code_package, 9, '0'), "MA")
ELSE
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Invalid package type";
END IF;
    SET NEW.code_package = new_code_package;
END
