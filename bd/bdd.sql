CREATE OR REPLACE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20),
    role ENUM('citizen', 'admin') DEFAULT 'citizen',
    is_verified BOOLEAN DEFAULT FALSE,
    verification_token VARCHAR(255),
    password_reset_token VARCHAR(255),
    reset_token_expiry DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP
);


CREATE TABLE Reports (
    report_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    type ENUM('road_damage', 'power_outage', 'waste', 'other') NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(11, 8) NOT NULL,
    status ENUM('pending', 'verified', 'in_progress', 'resolved') DEFAULT 'pending',
    urgency_level INT CHECK (urgency_level BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE SET NULL
);


CREATE TABLE ReportImages (
    image_id INT PRIMARY KEY AUTO_INCREMENT,
    report_id INT,
    image_url VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES Reports(report_id) ON DELETE CASCADE
);


CREATE TABLE ReportVotes (
    vote_id INT PRIMARY KEY AUTO_INCREMENT,
    report_id INT,
    user_id INT,
    vote_type ENUM('upvote', 'downvote') NOT NULL,
    voted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES Reports(report_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    UNIQUE KEY unique_vote (report_id, user_id)
);


CREATE TABLE ReportComments (
    comment_id INT PRIMARY KEY AUTO_INCREMENT,
    report_id INT,
    user_id INT,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES Reports(report_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE Interventions (
    intervention_id INT PRIMARY KEY AUTO_INCREMENT,
    report_id INT,
    assigned_to INT,
    status ENUM('planned', 'in_progress', 'completed') DEFAULT 'planned',
    start_date DATE,
    end_date DATE,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (report_id) REFERENCES Reports(report_id),
    FOREIGN KEY (assigned_to) REFERENCES Users(user_id)
);


CREATE TABLE Zones (
    zone_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    region VARCHAR(100),
    polygon_coordinates TEXT, -- GeoJSON ou texte
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE Notifications (
    notification_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    type ENUM('report_update', 'intervention_update', 'system') NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


CREATE TABLE LoginAttempts (
    attempt_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100),
    ip_address VARCHAR(45),
    attempt_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    success BOOLEAN
);


CREATE INDEX idx_reports_location ON Reports(latitude, longitude);
CREATE INDEX idx_reports_status ON Reports(status);
CREATE INDEX idx_reports_type ON Reports(type);
CREATE INDEX idx_users_email ON Users(email);
CREATE INDEX idx_notifications_user ON Notifications(user_id, is_read);
