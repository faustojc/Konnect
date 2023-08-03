CREATE TABLE beu_database.tbl_resume
(
    id            INT AUTO_INCREMENT
        PRIMARY KEY,
    employee_id   INT                    NOT NULL,
    file_name     VARCHAR(255)           NOT NULL,
    file_size     FLOAT                  NOT NULL,
    date_uploaded DATE DEFAULT CURDATE() NOT NULL,
    CONSTRAINT fk_resume_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
)
    CHARSET = latin1;
