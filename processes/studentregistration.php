<?php
require_once 'dbcon.php';
require_once 'studentregistration.php';

class studentRegistration {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function registerStudent($name, $email) {
        try {
            $stmt = $this->db->getPdo()->prepare("INSERT INTO student_details (student_name, student_email) VALUES (:name, :email)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>
