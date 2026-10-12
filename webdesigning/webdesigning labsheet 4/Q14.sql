
CREATE USER IF NOT EXISTS 'labuser'@'localhost'
IDENTIFIED BY 'LabUser@123';

GRANT SELECT, INSERT
ON college_db.students
TO 'labuser'@'localhost';

SHOW GRANTS FOR 'labuser'@'localhost';
s