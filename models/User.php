<?php

class User {
    private $user_id;
    private $full_name;
    private $email;
    private $password_hash;
    private $phone_number;
    private $role;
    private $is_verified;
    private $verification_token;
    private $password_reset_token;
    private $reset_token_expiry;
    private $created_at;
    private $last_login;

    // Constructeur
    public function __construct($data = []) {
        $this->user_id = $data['user_id'] ?? null;
        $this->full_name = $data['full_name'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password_hash = $data['password_hash'] ?? '';
        $this->phone_number = $data['phone_number'] ?? null;
        $this->role = $data['role'] ?? 'citizen';
        $this->is_verified = $data['is_verified'] ?? false;
        $this->verification_token = $data['verification_token'] ?? null;
        $this->password_reset_token = $data['password_reset_token'] ?? null;
        $this->reset_token_expiry = $data['reset_token_expiry'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->last_login = $data['last_login'] ?? null;
    }

    // Getters
    public function getUserId() { return $this->user_id; }
    public function getFullName() { return $this->full_name; }
    public function getEmail() { return $this->email; }
    public function getPhoneNumber() { return $this->phone_number; }
    public function getRole() { return $this->role; }
    public function getIsVerified() { return $this->is_verified; }
    public function getVerificationToken() { return $this->verification_token; }
    public function getPasswordResetToken() { return $this->password_reset_token; }
    public function getResetTokenExpiry() { return $this->reset_token_expiry; }
    public function getCreatedAt() { return $this->created_at; }
    public function getLastLogin() { return $this->last_login; }

    // Setters
    public function setFullName($full_name) { $this->full_name = $full_name; }
    public function setEmail($email) { $this->email = $email; }
    public function setPasswordHash($password_hash) { $this->password_hash = $password_hash; }
    public function setPhoneNumber($phone_number) { $this->phone_number = $phone_number; }
    public function setRole($role) { $this->role = $role; }
    public function setIsVerified($is_verified) { $this->is_verified = $is_verified; }
    public function setVerificationToken($token) { $this->verification_token = $token; }
    public function setPasswordResetToken($token) { $this->password_reset_token = $token; }
    public function setResetTokenExpiry($expiry) { $this->reset_token_expiry = $expiry; }
    public function setLastLogin($last_login) { $this->last_login = $last_login; }

    // Méthodes de validation
    public function isValidEmail() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isValidPhoneNumber() {
        return empty($this->phone_number) || preg_match('/^[0-9+\-\s()]{6,20}$/', $this->phone_number);
    }

    // Méthode pour convertir l'objet en tableau
    public function toArray() {
        return [
            'user_id' => $this->user_id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'role' => $this->role,
            'is_verified' => $this->is_verified,
            'verification_token' => $this->verification_token,
            'password_reset_token' => $this->password_reset_token,
            'reset_token_expiry' => $this->reset_token_expiry,
            'created_at' => $this->created_at,
            'last_login' => $this->last_login
        ];
    }

    // Méthode d'insertion (création de compte)
    public function create($pdo) {
        try {
            $query = "INSERT INTO Users (full_name, email, password_hash, phone_number, role, verification_token) 
                      VALUES (:full_name, :email, :password_hash, :phone_number, :role, :verification_token)";
            
            $stmt = $pdo->prepare($query);
            
            $stmt->execute([
                'full_name' => $this->full_name,
                'email' => $this->email,
                'password_hash' => $this->password_hash,
                'phone_number' => $this->phone_number,
                'role' => $this->role,
                'verification_token' => bin2hex(random_bytes(32))
            ]);
            
            $this->user_id = $pdo->lastInsertId();
            return true;
        } catch (PDOException $e) {
            // En cas d'erreur, on retourne false
            return false;
        }
    }

    // Méthode de connexion
    /**
     * Vérifie si les informations de connexion sont valides
     * @param PDO $pdo Instance de connexion à la base de données
     * @param string $email Email de l'utilisateur
     * @param string $password Mot de passe en clair
     * @return array Tableau contenant le statut et le message
     */
    public static function verifyLoginCredentials($pdo, $email, $password) {
        try {
            // Vérification du format de l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return [
                    'status' => false,
                    'message' => "Format d'email invalide"
                ];
            }

            // Recherche de l'utilisateur par email
            $query = "SELECT * FROM Users WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->execute(['email' => $email]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user) {
                return [
                    'status' => false,
                    'message' => "Aucun compte trouvé avec cet email"
                ];
            }

            // Vérification du mot de passe
            if (!password_verify($password, $user['password_hash'])) {
                return [
                    'status' => false,
                    'message' => "Mot de passe incorrect"
                ];
            }

            // Vérification si le compte est vérifié
            if (!$user['is_verified']) {
                session_start();
                // session pour contenir l'email de lutilisateur
                $_SESSION['email'] = $email;
                header('Location: ../../pages/renvoiEmail.php');
                exit();
                return [
                    'status' => false,
                    'message' => "Votre compte n'est pas encore vérifié. Veuillez vérifier votre email"
                ];
            }

            // Mise à jour de la dernière connexion
            $updateQuery = "UPDATE Users SET last_login = CURRENT_TIMESTAMP WHERE user_id = :user_id";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute(['user_id' => $user['user_id']]);

            // Création d'une instance User
            $userInstance = new User($user);

            return [
                'status' => true,
                'message' => "Connexion réussie",
                'user' => $userInstance
            ];

        } catch (PDOException $e) {
            return [
                'status' => false,
                'message' => "Erreur lors de la vérification des identifiants"
            ];
        }
    }
}
?>