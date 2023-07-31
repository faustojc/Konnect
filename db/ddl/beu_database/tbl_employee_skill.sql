CREATE TABLE beu_database.tbl_employee_skill
(
    id          INT AUTO_INCREMENT
        PRIMARY KEY,
    employee_id INT          NOT NULL,
    skill       VARCHAR(255) NOT NULL,
    proficiency VARCHAR(255) NOT NULL,
    years_exp   INT(100)     NOT NULL,
    CONSTRAINT fk_employee_skill_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
