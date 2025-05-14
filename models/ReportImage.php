<?php

class ReportImage {
    private $image_id;
    private $report_id;
    private $image_url;
    private $uploaded_at;

    public function __construct($data) {
        $this->image_id = $data['image_id'] ?? null;
        $this->report_id = $data['report_id'] ?? null;
        $this->image_url = $data['image_url'] ?? null;
        $this->uploaded_at = $data['uploaded_at'] ?? null;
    }

    // Getters
    public function getImageId() { return $this->image_id; }
    public function getReportId() { return $this->report_id; }
    public function getImageUrl() { return $this->image_url; }
    public function getUploadedAt() { return $this->uploaded_at; }

    // Setters
    public function setReportId($report_id) { $this->report_id = $report_id; }
    public function setImageUrl($image_url) { $this->image_url = $image_url; }

    // Méthodes CRUD
    public function create($pdo) {
        $sql = "INSERT INTO ReportImages (report_id, image_url) VALUES (:report_id, :image_url)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':report_id' => $this->report_id,
            ':image_url' => $this->image_url
        ]);
        $this->image_id = $pdo->lastInsertId();
    }

    public static function findById($pdo, $image_id) {
        $sql = "SELECT * FROM ReportImages WHERE image_id = :image_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':image_id' => $image_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new ReportImage($data) : null;
    }

    public function update($pdo) {
        $sql = "UPDATE ReportImages SET 
                report_id = :report_id,
                image_url = :image_url
                WHERE image_id = :image_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':report_id' => $this->report_id,
            ':image_url' => $this->image_url,
            ':image_id' => $this->image_id
        ]);
    }

    public function delete($pdo) {
        $sql = "DELETE FROM ReportImages WHERE image_id = :image_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':image_id' => $this->image_id]);
    }
}