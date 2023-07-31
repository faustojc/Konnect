CREATE TABLE beu_database.tbl_training
(
    ID                   INT AUTO_INCREMENT
        PRIMARY KEY,
    Employee_id          INT           NOT NULL,
    title                VARCHAR(255)  NOT NULL,
    training_description VARCHAR(1000) NOT NULL,
    venue                VARCHAR(255)  NOT NULL,
    city                 VARCHAR(255)  NOT NULL,
    s_date               DATE          NOT NULL,
    e_date               DATE          NOT NULL,
    hours                INT(255)      NOT NULL,
    CONSTRAINT fk_training_employee_id
        FOREIGN KEY (Employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
