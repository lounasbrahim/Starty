<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim Lounas
 */

//The Controller listen
class Users extends  Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    public function register()
    {
        // Verifier si il y'a une method POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Traiter la data reçus par POST
            $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
            $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
            $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
            $confirmPassword = FormSanitizer::sanitizeFormPassword($_POST["confirmPassword"]);

            // Initialiser la data
            $data = [
                "username" => $username,
                "email" => $email,
                "password" => $password,
                "confirmPassword" => $confirmPassword,
                "usernameError" => "",
                "emailError" => "",
                "passwordError" => "",
                "confirmPasswordError" => ""
            ];
            // Valider la data
            // Valider le Username
            if (!FormValidator::validateUsername($data["username"])) {
                $data["usernameError"] = "Votre Username doit avoir entre 2 et 25 caractères";
            }

            // Valider l'email
            if (!FormValidator::validateEmail($data["email"])) {
                $data["emailError"] = "Votre Email est Invalid";
            }

            // Verifier si le nouveau l'email n'est pas pris par un autre user
            if (  $this->userModel->findUserByEmail( $data["email"]) ){
                $data["emailError"] = "Cette Email est déja uitlisée";
            }

            // Valider le mot de passe
            if (!FormValidator::validatePassword($data["password"])) {
                $data["passwordError"] = "Votre Mot de passe doit avoir entre 6 et 25 caractères";
                $data["confirmPasswordError"] = "Votre Mot de passe doit avoir entre 6 et 25 caractères";
            }

            // Valider le confirmPassword
            if (!FormValidator::confirmPasswords($data["password"], $data["confirmPassword"])) {
                $data["confirmPasswordError"] = "Veuillez Entrer un Mot de passe identique";
            }
            // Verifier qu'il y'a pas d'erreur
            if (empty($data["usernameError"]) &&
                empty($data["emailError"]) &&
                empty($data["passwordError"]) &&
                empty($data["confirmPasswordError"])) {
                $this->userModel->insertUserDetails($data["username"], $data["email"], $data["password"]);
                die("Success");
            } else {
                // Sinon Charger la Vue avec les Erreurs
                $this->view("/users/register", $data);
            }

        } else {
            // Initialiser la data
            $data = [
                "username" => "",
                "email" => "",
                "password" => "",
                "confirmPassword" => "",
                "usernameError" => "",
                "emailError" => "",
                "passwordError" => "",
                "confirmPasswordError" => ""
            ];
            // Charger la Vue
            $this->view("users/register", $data);
        }
    }

    public function login()
    {
        // Verifier si il y'a une method POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Traiter la data reçus par POST
            $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
            $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);

            // Initialiser la data
            $data = [
                "email" => $email,
                "password" => $password,
                "emailError" => "",
                "passwordError" => "",
            ];

            // Valider l'email
            if (!FormValidator::validateEmail($data["email"])) {
                $data["emailError"] = "Votre Email est Invalid";
            }

            // Valider le mot de passe
            if (!FormValidator::validatePassword($data["password"])) {
                $data["passwordError"] = "Votre Mot de passe doit avoir entre 6 et 25 caractères";
            }

            // Verifier qu'il y'a pas d'erreur
            if ( empty($data["emailError"]) &&
                empty($data["passwordError"]) ) {
                die("Success");
            } else {
                // Sinon Charger la Vue avec les Erreurs
                $this->view("/users/login", $data);
            }

        } else {
            $data = [
                "email" => "",
                "password" => "",
                "emailError" => "",
                "passwordError" => ""
            ];
            $this->view('users/login', $data);
        }

    }
}

