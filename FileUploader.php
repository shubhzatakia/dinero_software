<?php
class FileUploader {
    private $file;
    private $upload_dir;
    private $allowed_types = ['pdf'];
    private $max_size = 2097152; // 2MB
    private $filename;

    public function __construct($file, $upload_dir = 'uploads/') {
        $this->file = $file;
        $this->upload_dir = $upload_dir ? $upload_dir : __DIR__ . '/uploads/';
    }

    public function validate() {
        $file_ext = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        $file_size = $this->file['size'];

        if (!in_array($file_ext, $this->allowed_types)) {
            throw new Exception("Only PDF files are allowed.");
        }

        if ($file_size > $this->max_size) {
            throw new Exception("File size must be less than 2MB.");
        }

        return true;
    }

    public function uploads() {
        $this->filename = uniqid() . '.' . strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
        $file_path = $this->upload_dir . $this->filename;

         // Ensure the upload directory exists
        if (!is_dir($this->upload_dir)) {
            mkdir($this->upload_dir, 0755, true);
        }
    
        // Check for file upload errors
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File upload error: " . $this->file['error']);
        }
    
        // Move the uploaded file
        if (move_uploaded_file($this->file['tmp_name'], $file_path)) {
            return $this->filename;
        } else {
            throw new Exception("Failed to upload file.");
        }
    }
    

    public function getFilename() {
        return $this->filename;
    }
}
