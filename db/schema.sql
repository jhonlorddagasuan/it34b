CREATE TABLE IF NOT EXISTS activity_logs (
    activity_log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(255),
    user_email VARCHAR(255),
    activity_log_action VARCHAR(50) NOT NULL,
    activity_log_status ENUM('success', 'failed') DEFAULT 'success',

    -- Client Parameters
    activity_log_ip_address VARCHAR(45),
    activity_log_user_agent VARCHAR(255),

    -- Timestamps
    activity_log_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE IF NOT EXISTS users(
    users_id INT AUTO_INCREMENT PRIMARY KEY,

    user_email VARCHAR(50) UNIQUE NOT NUL,
    user_username VARCHAR(20) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_role ENUM('adimn', 'user') NOT NULL DEFAULT 'user',

    user_created_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP,

    user_updated_at TIMESTAMP
        DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ON UPDATE CURRENT TIMESTAMP
)ENGINE=InnDB
DEFAULT CHARSET=utf8mb4;

INSERT INTO users
(
    user_email,
    user_username,
    user_password,
    user_role,
)VALUES