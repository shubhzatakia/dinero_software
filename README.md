## dinero_software

PHP Version 8

## Steps to setup project

1. Clone the Repository
   ```
   git clone https://github.com/shubhzatakia/dinero_software.git

   ```

2. Create a database on your local edit db.php file
 ```
    <?php
class DatabaseConfig {
    private $host = "localhost";
    private $username = "root";
    private $password = ""; 
    private $dbname = "career_module";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
    
}
   ```


3. Create this table
   ```
   CREATE TABLE candidates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    last_name VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    email VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    phone VARCHAR(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    position_applied VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    resume_filename VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    experience_years INT DEFAULT 0,
    dob DATE,
    address VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    skills VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    training VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    refer VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NUL
);
   ```

4. Create Stored Procedures

```

DELIMITER $$

CREATE PROCEDURE GetCandidatesByExperience(IN max_experience INT)
BEGIN
    SELECT id, first_name, last_name, dob, address, email, phone, position_applied, resume_filename, experience_years, skills, training, refer ,submission_date 
    FROM candidates 
    WHERE experience_years <= max_experience
    ORDER BY submission_date DESC;
END $$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE GetAllCandidates()
BEGIN
    SELECT id, first_name, last_name, dob, address, email, phone, position_applied, resume_filename, experience_years, skills, training, refer, submission_date 
    FROM candidates
    ORDER BY submission_date DESC;
END $$

DELIMITER ;

```

5. Insert data in you db or using the form from frontend
