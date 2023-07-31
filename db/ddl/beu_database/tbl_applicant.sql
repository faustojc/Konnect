CREATE TABLE beu_database.tbl_applicant
(
    id           INT AUTO_INCREMENT
        PRIMARY KEY,
    job_id       INT                              NOT NULL,
    employee_id  INT                              NOT NULL,
    job_title    VARCHAR(255)                     NOT NULL,
    status       VARCHAR(255)                     NOT NULL,
    date_created DATE DEFAULT CURRENT_TIMESTAMP() NOT NULL,
    CONSTRAINT fk_applicant_employee_id
        FOREIGN KEY (employee_id) REFERENCES beu_database.tbl_employee (ID)
            ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_applicant_job_id
        FOREIGN KEY (job_id) REFERENCES beu_database.tbl_jobposting (id)
            ON UPDATE CASCADE ON DELETE CASCADE
)
    CHARSET = latin1;
