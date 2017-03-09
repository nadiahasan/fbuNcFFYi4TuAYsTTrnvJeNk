create DATABASE IF NOT EXISTS RateMyCourse;
USE RateMyCourse;
CREATE TABLE if NOT EXISTS COMMENT(

  COMMENT_ID DECIMAL(10) NOT NULL PRIMARY KEY,
  COMMENT_CATEGORY DECIMAL(1) NOT NULL,
  USER_ID DECIMAL(10) NOT NULL,
  COMMENT_BODY VARCHAR(10000) NOT NULL,
  COMMENT_DATE DATE NOT NULL,
  COMMENT_RATING DECIMAL(1) NULL

  );


CREATE TABLE if NOT EXISTS COURSE(

  COURSE_ID CHAR(10) NOT NULL PRIMARY KEY,
  COURSE_NAME VARCHAR(50) NOT NULL,
  COURSE_COLLEGE VARCHAR(50),
  COURSE_PREREQUISITE_ID CHAR(10),
  COURSE_DESCRIPTION VARCHAR(2000)

  );

CREATE TABLE if NOT EXISTS COURSE_RATINGS(

  RATING_ID DECIMAL(10) NOT NULL PRIMARY KEY,
  LEVEL_OF_DIFFICULTY DECIMAL (1) NOT NULL,
  RECOMMENDED DECIMAL(1)

);


CREATE TABLE if NOT EXISTS USERS(

  USER_ID DECIMAL(10) NOT NULL PRIMARY KEY,
  USER_PASSWORD VARCHAR(20) NOT NULL,
  USERNAME VARCHAR(30) NOT NULL,
  FIRST_NAME VARCHAR(30) NOT NULL,
  LAST_NAME VARCHAR(30) NOT NULL,
  PRIVILEGE_LEVEL SMALLINT NOT NULL

  );



CREATE TABLE if NOT EXISTS REPORTS(

  REPORT_ID DECIMAL(10) NOT NULL PRIMARY KEY,
  USERNAME VARCHAR(30) NOT NULL REFERENCES USERS (USERNAME)  ,
  USER_ID DECIMAL(10) NOT NULL REFERENCES USERS (USER_ID),
  REPORT_DATE DATE NOT NULL,
  REPORT_MESSAGE VARCHAR(10000) NOT NULL,
  REPORTED_COMMENT_ID DECIMAL(10) NOT NULL REFERENCES COMMENT (COMMENT_ID)

  );
