/* Create the Employees database table */
CREATE TABLE employees (
    id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    hire_date VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);

/* INSERT people into the DATABASE */
INSERT INTO employees
    (id, first_name, last_name, hire_date)
VALUES
    (0, "Emad", "Nasarali", "2016-04-05"),
    (1, "Pritesh", "Patel", "2017-03-03"),
    (2, "Marcos", "Bittencourt", "2015-04-20"),
    (3, "Jenelle", "C", "2017-11-01"),
    (4, "William", "Pearson", "2014-09-15");
