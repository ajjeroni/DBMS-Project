SELECT 
    c.C_NUMBER,
    c.C_NAME,
    e.GRADE
FROM ENROLLMENT AS e
JOIN COURSE AS c
    ON e.C_NO = c.C_NUMBER
WHERE e.CWID = ''; -- student cwid
