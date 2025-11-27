SELECT 
    GRADE,
    COUNT(*) AS NumStudents
FROM 
    ENROLLMENT
WHERE 
    C_NO = #       -- course number
    AND S_NUMBER = #  -- section number
GROUP BY 
    GRADE
ORDER BY 
    GRADE;
