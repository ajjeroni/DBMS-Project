CREATE TABLE PROFESSOR (
    SSN CHAR(9) PRIMARY KEY,              -- we used CHAR instead of numeric becuase if SSN starts with zero, it is truncated
    FNAME VARCHAR(20) NOT NULL,
    LNAME VARCHAR(20) NOT NULL,
    SEX ENUM('M', 'F') NOT NULL,
    TITLE VARCHAR(30),
    
    -- Telephone componenets
    T_AREACODE CHAR(3) NOT NULL,
    T_NUMBER   CHAR(7) NOT NULL,

    -- Address components
    A_STREET VARCHAR(40) NOT NULL,
    A_CITY   VARCHAR(30) NOT NULL,
    A_STATE  CHAR(2) NOT NULL,            -- we use state abbreviations
    A_ZIP    CHAR(5) NOT NULL,

    SALARY DECIMAL(10,2) NOT NULL         -- numeric salary, supports cents
);
