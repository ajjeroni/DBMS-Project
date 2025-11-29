SELECT 
    s.S_NUMBER,
    s.CLASSROOM,
    s.MEET_DAYS,
    s.BEGIN_TIME,
    s.END_TIME,
    COUNT(e.CWID) AS NumStudents
FROM SECTION AS s
LEFT JOIN ENROLLMENT AS e
    ON s.S_NUMBER = e.S_NUMBER
   AND s.C_NO = e.C_NO
WHERE s.C_NO =   -- course number here
GROUP BY
    s.S_NUMBER,
    s.CLASSROOM,
    s.MEET_DAYS,
    s.BEGIN_TIME,
    s.END_TIME;
