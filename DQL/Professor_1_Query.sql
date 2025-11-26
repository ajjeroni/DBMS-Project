SELECT 
    c.C_NAME AS Title,
    s.CLASSROOM,
    s.MEET_DAYS,
    s.BEGIN_TIME,
    s.END_TIME
FROM PROFESSOR p
JOIN SECTION s
    ON p.SSN = s.TAUGHT_BY
JOIN COURSE c
    ON s.C_NO = c.C_NUMBER
WHERE p.SSN = ''; -- professor ssn  
