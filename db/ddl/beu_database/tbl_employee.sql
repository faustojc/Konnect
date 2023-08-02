CREATE TABLE beu_database.tbl_employee
(
    ID             INT AUTO_INCREMENT
        PRIMARY KEY,
    user_id        INT                                  NOT NULL,
    Date_created   DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    Fname          VARCHAR(255)                         NOT NULL,
    Lname          VARCHAR(255)                         NOT NULL,
    Mname          VARCHAR(255)                         NOT NULL,
    Bday           DATE                                 NOT NULL,
    Gender         VARCHAR(255)                         NOT NULL,
    Cstat          VARCHAR(255)                         NOT NULL,
    Religion       VARCHAR(255)                         NOT NULL,
    Cnum           VARCHAR(255)                         NOT NULL,
    Email          VARCHAR(255)                         NOT NULL,
    Region         INT                                  NOT NULL,
    Province       INT                                  NOT NULL,
    City           VARCHAR(255)                         NOT NULL,
    Barangay       VARCHAR(255)                         NOT NULL,
    Address        VARCHAR(255)                         NOT NULL,
    Title          VARCHAR(255)                         NOT NULL,
    SSS            VARCHAR(255)                         NOT NULL,
    Tin            VARCHAR(255)                         NOT NULL,
    Phil_health    VARCHAR(255)                         NOT NULL,
    Pag_ibig       VARCHAR(255)                         NOT NULL,
    Introduction   TEXT                                 NOT NULL,
    Employee_image TINYTEXT                             NULL
)
    CHARSET = latin1;
