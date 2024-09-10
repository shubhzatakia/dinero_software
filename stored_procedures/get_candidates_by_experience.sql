DELIMITER $$

CREATE PROCEDURE GetCandidatesByExperience(IN max_experience INT)
BEGIN
    SELECT id, first_name, last_name, dob, email, phone, position_applied, resume_filename, experience_years, submission_date 
    FROM candidates 
    WHERE experience_years <= max_experience
    ORDER BY submission_date DESC;
END $$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE GetAllCandidates()
BEGIN
    SELECT id, first_name, last_name, dob, email, phone, position_applied, resume_filename, experience_years, submission_date 
    FROM candidates
    ORDER BY submission_date DESC;
END $$

DELIMITER ;
