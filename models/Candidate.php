<?php

require_once '../config/db.php';

class Candidate {
    private $conn;
    private $table_name = "candidates";

    public $id;
    public $first_name;
    public $last_name;
    public $dob;
    public $email;
    public $phone;
    public $position_applied;
    public $resume_filename;
    public $experience_years;
    public $address;
    public $skills;
    public $training;
    public $refer;

    public function __construct() {
        $database = new DatabaseConfig();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $stmt = $this->conn->prepare(
            "INSERT INTO " . $this->table_name . " (first_name, last_name, email, phone, position_applied, resume_filename, experience_years, dob, address, skills, training, refer) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?)"
        );

        $stmt->bind_param("ssssssisssss", $this->first_name, $this->last_name, $this->email, $this->phone, $this->position_applied, $this->resume_filename, $this->experience_years, $this->dob, $this->address, $this->skills, $this->training, $this->refer);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCandidatesByExperience($max_experience) {
        $stmt = $this->conn->prepare("CALL GetCandidatesByExperience(?)");
        $stmt->bind_param("i", $max_experience);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCandidates() {
        $stmt = $this->conn->prepare("CALL GetAllCandidates()");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

