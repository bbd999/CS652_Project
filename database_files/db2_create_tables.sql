CREATE TABLE ATVSTUD
(
ATVSTUD_ID	VARCHAR(10) NOT NULL,
ATVSTUD_FIRSTNAME	VARCHAR(30),
ATVSTUD_LASTNAME	VARCHAR(30),
ATVSTUD_USERNAME	VARCHAR(30),
ATVSTUD_PASSWORD	VARCHAR(30),
PRIMARY KEY (ATVSTUD_ID)
);

CREATE TABLE ATVBLDG
(
ATVBLDG_CODE VARCHAR(3) NOT NULL,
ATVBLDG_NAME VARCHAR(50) NOT NULL,
ATVBLDG_DESC VARCHAR(100),
PRIMARY KEY (ATVBLDG_CODE)
);

CREATE TABLE ATLROOM
(
ATLROOM_CODE	VARCHAR(6) NOT NULL,
ATLROOM_BLDG_CODE	VARCHAR(3) NOT NULL,
ATLROOM_DESC	VARCHAR	100	0	YES_TEXT
);

CREATE TABLE ATVDEVC
(
ATVDEVC_CODE        VARCHAR(20)	NOT NULL,
ATVDEVC_DESC        VARCHAR(100),
ATVDEVC_ROOM_CODE	  VARCHAR(6),
ATVDEVC_BLDG_CODE	  VARCHAR(3),
PRIMARY KEY (ATVDEVC_CODE)
);

CREATE TABLE ATVSCHD
(
ATVSCHD_CODE	CHARACTER(1) NOT NULL,
ATVSCHD_DESC	VARCHAR(30) NOT NULL,
PRIMARY KEY (ATVSCHD_CODE)
);

CREATE TABLE ATVCRSE
(
ATVCRSE_CODE	VARCHAR(6) NOT NULL,
ATVCRSE_NAME	VARCHAR(30),
ATVCRSE_DESC	VARCHAR(100),
ATVCRSE_START_DATE	DATE,
ATVCRSE_END_DATE	DATE,
PRIMARY KEY (ATVCRSE_CODE)
);

CREATE TABLE ATLREGS
(
ATLREGS_STUD_ID	VARCHAR(10) NOT NULL,
ATLREGS_CRSE_CODE	VARCHAR(6) NOT NULL,
PRIMARY KEY (ATLREGS_STUD_ID,ATLREGS_CRSE_CODE)
);


CREATE TABLE ATLSCHD
(
ATLSCHD_CODE	CHARACTER(1) NOT NULL,
ATLSCHD_CRSE_CODE	VARCHAR(6) NOT NULL,
ATLSCHD_START_TIME	TIME,
ATLSCHD_END_TIME	TIME,
ATLSCHD_ROOM_CODE	VARCHAR(6),
ATLSCHD_BLDG_CODE	VARCHAR(3),
PRIMARY KEY (ATLSCHD_CODE, ATLSCHD_CRSE_CODE)
);

CREATE TABLE ATRATTD
(
ATRATTD_STUD_CODE VARCHAR(10) NOT NULL,
ATRATTD_CRSE_CODE VARCHAR(10) NOT NULL,
ATRATTD_DATE DATE NOT NULL,
ATRATTD_TIME TIME,
PRIMARY KEY (ATRATTD_STUD_CODE,ATRATTD_CRSE_CODE,ATRATTD_DATE)
);
