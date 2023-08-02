CREATE TABLE beu_database.tbl_education
(
    id          INT AUTO_INCREMENT
        PRIMARY KEY,
    employee_id INT           NOT NULL,
    level       VARCHAR(255)  NOT NULL,
    institution VARCHAR(255)  NOT NULL,
    title       VARCHAR(255)  NOT NULL,
    description VARCHAR(1000) NOT NULL,
    start_date  DATE          NOT NULL,
    end_date    DATE          NULL,
    CONSTRAINT fk_Employee_ID
        FOREIGN KEY (Employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
