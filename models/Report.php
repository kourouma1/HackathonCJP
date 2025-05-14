<?php

class Report {
    private $report_id;
    private $user_id;
    private $type;
    private $title;
    private $description;
    private $latitude;
    private $longitude;
    private $status;
    private $urgency_level;
    private $created_at;
    private $updated_at;

    public function __construct($data) {
        $this->report_id = $data['report_id'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->title = $data['title'] ?? null;
        $this->description = $data['description'] ?? null;
        $this->latitude = $data['latitude'] ?? null;
        $this->longitude = $data['longitude'] ?? null;
        $this->status = $data['status'] ?? 'pending';
        $this->urgency_level = $data['urgency_level'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }

    // Getters
    public function getReportId() { return $this->report_id; }
    public function getUserId() { return $this->user_id; }
    public function getType() { return $this->type; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getLatitude() { return $this->latitude; }
    public function getLongitude() { return $this->longitude; }
    public function getStatus() { return $this->status; }
    public function getUrgencyLevel() { return $this->urgency_level; }
    public function getCreatedAt() { return $this->created_at; }
    public function getUpdatedAt() { return $this->updated_at; }

    // Setters
    public function setUserId($user_id) { $this->user_id = $user_id; }
    public function setType($type) { $this->type = $type; }
    public function setTitle($title) { $this->title = $title; }
    public function setDescription($description) { $this->description = $description; }
    public function setLatitude($latitude) { $this->latitude = $latitude; }
    public function setLongitude($longitude) { $this->longitude = $longitude; }
    public function setStatus($status) { $this->status = $status; }
    public function setUrgencyLevel($urgency_level) { $this->urgency_level = $urgency_level; }
    public function setUpdatedAt($updated_at) { $this->updated_at = $updated_at; }

    // Méthodes CRUD
    public function create($pdo) {
        $sql = "INSERT INTO Reports (user_id, type, title, description, latitude, longitude, status, urgency_level) 
                VALUES (:user_id, :type, :title, :description, :latitude, :longitude, :status, :urgency_level)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $this->user_id,
            ':type' => $this->type,
            ':title' => $this->title,
            ':description' => $this->description,
            ':latitude' => $this->latitude,
            ':longitude' => $this->longitude,
            ':status' => $this->status,
            ':urgency_level' => $this->urgency_level
        ]);
        $this->report_id = $pdo->lastInsertId();
    }

    public static function findById($pdo, $report_id) {
        $sql = "SELECT * FROM Reports WHERE report_id = :report_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':report_id' => $report_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new Report($data) : null;
    }

    public function update($pdo) {
        $sql = "UPDATE Reports SET 
                user_id = :user_id,
                type = :type,
                title = :title,
                description = :description,
                latitude = :latitude,
                longitude = :longitude,
                status = :status,
                urgency_level = :urgency_level,
                updated_at = NOW()
                WHERE report_id = :report_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $this->user_id,
            ':type' => $this->type,
            ':title' => $this->title,
            ':description' => $this->description,
            ':latitude' => $this->latitude,
            ':longitude' => $this->longitude,
            ':status' => $this->status,
            ':urgency_level' => $this->urgency_level,
            ':report_id' => $this->report_id
        ]);
    }

    public function delete($pdo) {
        $sql = "DELETE FROM Reports WHERE report_id = :report_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':report_id' => $this->report_id]);
    }
}