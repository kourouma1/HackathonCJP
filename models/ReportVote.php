<?php

class ReportVote {
    private $vote_id;
    private $report_id;
    private $user_id;
    private $vote_type;
    private $voted_at;

    public function __construct($data) {
        $this->vote_id = $data['vote_id'] ?? null;
        $this->report_id = $data['report_id'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
        $this->vote_type = $data['vote_type'] ?? null;
        $this->voted_at = $data['voted_at'] ?? null;
    }

    // Getters
    public function getVoteId() { return $this->vote_id; }
    public function getReportId() { return $this->report_id; }
    public function getUserId() { return $this->user_id; }
    public function getVoteType() { return $this->vote_type; }
    public function getVotedAt() { return $this->voted_at; }

    // Setters
    public function setReportId($report_id) { $this->report_id = $report_id; }
    public function setUserId($user_id) { $this->user_id = $user_id; }
    public function setVoteType($vote_type) { $this->vote_type = $vote_type; }

    // Méthodes CRUD
    public function create($pdo) {
        $sql = "INSERT INTO ReportVotes (report_id, user_id, vote_type) 
                VALUES (:report_id, :user_id, :vote_type)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':report_id' => $this->report_id,
            ':user_id' => $this->user_id,
            ':vote_type' => $this->vote_type
        ]);
        $this->vote_id = $pdo->lastInsertId();
    }

    public static function findById($pdo, $vote_id) {
        $sql = "SELECT * FROM ReportVotes WHERE vote_id = :vote_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':vote_id' => $vote_id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new ReportVote($data) : null;
    }

    public function update($pdo) {
        $sql = "UPDATE ReportVotes SET 
                report_id = :report_id,
                user_id = :user_id,
                vote_type = :vote_type
                WHERE vote_id = :vote_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':report_id' => $this->report_id,
            ':user_id' => $this->user_id,
            ':vote_type' => $this->vote_type,
            ':vote_id' => $this->vote_id
        ]);
    }

    public function delete($pdo) {
        $sql = "DELETE FROM ReportVotes WHERE vote_id = :vote_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':vote_id' => $this->vote_id]);
    }
}