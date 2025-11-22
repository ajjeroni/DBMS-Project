CREATE TABLE PROFESSOR(
	SSN numeric(9) primary key,
    FNAME varchar(20),
    LNAME varchar(20),
    SEX enum('M','F'),
    TITLE varchar(20),
    T_AREACODE numeric(3),
    T_NUMBER numeric(7),
    A_STREET varchar(20),
    A_CITY varchar(20),
    A_STATE varchar(13),
    A_ZIP char(5),
    SALARY numeric(6)
);
