<?php
require_once 'databaseconnection.php';
session_start();

class Database {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function executeQuery($query, $params) {
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }
}

class User extends Database {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function register($userData) {
        if ($userData['password'] !== $userData['confirmpassword']) {
            $_SESSION['error_message'] = "The passwords do not match";
            $this->storeFormDataInSession($userData);
            return false;
        }

        $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
        $userData['password'] = $hashedPassword;
        unset($userData['confirmpassword']); // Remove unnecessary field

        $query = "INSERT INTO user_info 
            (username, fullname, email, contact_number, socials, dob, city, province, postal_code, street_address, description, password)
            VALUES 
            (:username, :fullname, :email, :contact_number, :socials, :dob, :city, :province, :postal_code, :street_address, :description, :password)";

        if ($this->database->executeQuery($query, $userData)) {
            $this->clearSessionData();
            return true;
        } else {
            $_SESSION['error_message'] = "An error occurred while saving the data.";
            return false;
        }
    }

    private function storeFormDataInSession($data) {
        foreach ($data as $key => $value) {
            if ($key !== 'password' && $key !== 'confirmpassword') {
                $_SESSION[$key] = $value;
            }
        }
    }

    private function clearSessionData() {
        foreach ($_SESSION as $key => $value) {
            unset($_SESSION[$key]);
        }
    }
}

    // Main Controller
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database($pdo);
    $user = new User($db);

    $userData = [
        'username' => $_POST["username"],
        'fullname' => $_POST["fullname"],
        'email' => $_POST["email"],
        'contact_number' => $_POST["contact_number"],
        'socials' => $_POST["socials"],
        'dob' => $_POST["dob"],
        'city' => $_POST["city"],
        'province' => $_POST["province"],
        'postal_code' => $_POST["postal_code"],
        'street_address' => $_POST["street_address"],
        'description' => $_POST["description"],
        'password' => $_POST["password"],
        'confirmpassword' => $_POST["confirmpassword"],
    ];

    if ($user->register($userData)) {
        header("Location: log_in.html");
        exit();
    } else {
        header("Location: sign_up.php");
        exit();
    }
}
?>
