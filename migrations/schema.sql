CREATE TABLE IF NOT EXISTS beneficiaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    family_registration_no VARCHAR(50),
    nationality VARCHAR(50),
    tc_id VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    birth_date DATE,
    birth_place VARCHAR(100),
    marital_status VARCHAR(50),
    gender VARCHAR(10),
    children_count INT,
    working_count INT,
    salary DECIMAL(10,2),
    other_income DECIMAL(10,2),
    rent DECIMAL(10,2),
    remaining_amount DECIMAL(10,2),
    deleted_at TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS contacts (
    beneficiary_id INT,
    gsm1 VARCHAR(20),
    gsm2 VARCHAR(20),
    owner_gsm VARCHAR(100),
    PRIMARY KEY (beneficiary_id),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS address (
    beneficiary_id INT,
    province VARCHAR(100),
    district VARCHAR(100),
    street VARCHAR(100),
    neighborhood VARCHAR(100),
    building_no VARCHAR(50),
    apartment_no VARCHAR(50),
    full_address TEXT,
    reference VARCHAR(100),
    reference_status VARCHAR(50),
    inspected_by VARCHAR(100),
    PRIMARY KEY (beneficiary_id),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bank_accounts (
    beneficiary_id INT,
    account_holder VARCHAR(100),
    bank_name VARCHAR(100),
    iban VARCHAR(34),
    PRIMARY KEY (beneficiary_id),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS spouse (
    beneficiary_id INT PRIMARY KEY,
    nationality VARCHAR(50),
    tc_id VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    birth_date DATE,
    birth_place VARCHAR(100),
    employment_status VARCHAR(100),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS household_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    beneficiary_id INT,
    tc_id VARCHAR(50),
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    birth_date DATE,
    age INT,
    gender VARCHAR(10),
    relationship VARCHAR(100),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS attachments (
    beneficiary_id INT PRIMARY KEY,
    id_card_front_path VARCHAR(255),
    id_card_back_path VARCHAR(255),
    FOREIGN KEY (beneficiary_id) REFERENCES beneficiaries(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
