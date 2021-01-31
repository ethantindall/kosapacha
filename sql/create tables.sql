CREATE TABLE products (
	product_id INT NOT NULL AUTO_INCREMENT,
	product_name VARCHAR(40) NOT NULL,
	product_description VARCHAR(255) NOT NULL,
	product_inventory INT NOT NULL,
	product_price FLOAT NOT NULL,
	product_expiration DATE,
    product_image VARCHAR(100),
    PRIMARY KEY (product_id)
);

CREATE TABLE employees (
	employee_id INT NOT NULL AUTO_INCREMENT,
	employee_fname VARCHAR(40) NOT NULL,
	employee_mname VARCHAR(40),
	employee_lname VARCHAR(40) NOT NULL,
	employee_notes VARCHAR(255),
	employee_max_hours INT,
	PRIMARY KEY (employee_id)
);

CREATE TABLE timesheet (
	week_id INT NOT NULL AUTO_INCREMENT,
    week_date DATE NOT NULL,
    employee_id INT NOT NULL,
    weekly_max_hours FLOAT NOT NULL,
    mon_hours FLOAT NOT NULL,
    mon_notes VARCHAR(255),
	tues_hours FLOAT NOT NULL,
    tues_notes VARCHAR(255),
    wed_hours FLOAT NOT NULL,
    wed_notes VARCHAR(255),
    thurs_hours FLOAT NOT NULL,
    thurs_notes VARCHAR(255),
    fri_hours FLOAT NOT NULL,
    fri_notes VARCHAR(255),
    sat_hours FLOAT NOT NULL,
    sat_notes VARCHAR(255),
    sun_hours FLOAT NOT NULL,
    sun_notes VARCHAR(255),
    
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id),
    FOREIGN KEY (weekly_max_hours) REFERENCES employees(employee_max_hours),
    PRIMARY KEY (week_id)
);