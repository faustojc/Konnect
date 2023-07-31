CREATE TABLE beu_database.tbl_follow
(
    id          INT AUTO_INCREMENT
        PRIMARY KEY,
    employee_id INT NOT NULL,
    employer_id INT NOT NULL,
    CONSTRAINT fk_follow_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_follow_employer_id
        FOREIGN KEY (employer_id) REFERENCES beu_database.tbl_employer (id)
            ON UPDATE CASCADE ON DELETE CASCADE
);
