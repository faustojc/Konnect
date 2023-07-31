CREATE TABLE beu_database.tbl_employee_educ
(
    ID          INT AUTO_INCREMENT
        PRIMARY KEY,
    Employee_id INT           NOT NULL,
    Level       VARCHAR(255)  NOT NULL,
    Institution VARCHAR(255)  NOT NULL,
    Title       VARCHAR(255)  NOT NULL,
    Description VARCHAR(1000) NOT NULL,
    Start_date  DATE          NOT NULL,
    End_date    DATE          NOT NULL,
    Hours       INT           NOT NULL,
    CONSTRAINT fk_Employee_ID
        FOREIGN KEY (Employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
