-- Course 100: Introduction to Programming
INSERT INTO SECTION
VALUES
(
    1,                 -- S_NUMBER
    100,               -- C_NO
    'CS101',           -- CLASSROOM
    30,                -- NUMBER_OF_SEATS
    'M,W,F',           -- MEET_DAYS
    '09:00:00',        -- BEGIN_TIME
    '09:50:00',        -- END_TIME
    '012345678'        -- TAUGHT_BY (Turing)
);

INSERT INTO SECTION
VALUES
(
    2,
    100,
    'CS102',
    28,
    'T,Th',
    '13:00:00',
    '14:15:00',
    '001223344'        -- Ada Lovelace
);

-- Course 210: Data Structures and Algorithms
INSERT INTO SECTION
VALUES
(
    1,
    210,
    'CS201',
    35,
    'M,W',
    '10:00:00',
    '11:15:00',
    '987654321'        -- Grace Hopper
);

INSERT INTO SECTION
VALUES
(
    2,
    210,
    'CS202',
    32,
    'T,Th',
    '15:00:00',
    '16:15:00',
    '012345678'        -- Turing
);

-- Course 305: Software Engineering Principles
INSERT INTO SECTION
VALUES
(
    1,
    305,
    'ENG120',
    40,
    'W,F',
    '11:30:00',
    '12:45:00',
    '987654321'        -- Hopper
);

-- Course 360: Web Application Development
INSERT INTO SECTION
VALUES
(
    1,
    360,
    'ENG210',
    25,
    'M,Th',
    '14:00:00',
    '15:15:00',
    '001223344'        -- Ada Lovelace
);
