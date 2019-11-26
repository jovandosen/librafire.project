<?php

namespace LibraFireProject;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LibraFireProject\Connection;

class User extends Connection
{
    public function register($firstName, $lastName, $email, $password)
    {
        $registerSql = "INSERT INTO users(firstName, lastName, email, password, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?)";

        $record = $this->connection->prepare($registerSql);

        $dateTime = date('Y-m-d H:i:s');

        $password = password_hash($password, PASSWORD_DEFAULT);

        $record->bind_param("ssssss", $firstName, $lastName, $email, $password, $dateTime, $dateTime);

        $record->execute();

        $user = $this->getUserByEmail($email);

        return $user;
    }

    public function getAllEmails()
    {
        $emailSql = "SELECT email FROM users";

        $records = $this->connection->query($emailSql);

        $emails = [];

        if( $records->num_rows > 0 ){
            while( $row = mysqli_fetch_object($records) ){
                $emails[] = $row->email;
            }
        }

        $emails = json_encode($emails);

        $records->close();

        $this->connection->close();

        echo $emails;
    }

    public function getUserByEmail($email)
    {
        $userSql = "SELECT * FROM users WHERE email=?";

        $record = $this->connection->prepare($userSql);

        $record->bind_param("s", $email);

        $record->execute();

        $userDetails = $record->get_result();

        $user = '';

        if( $userDetails->num_rows === 1 ){
            while( $row = mysqli_fetch_object($userDetails) ){
                $user = $row;
            }
        }

        return $user;
    }

    public function login($email, $password)
    {
        $loginSql = "SELECT * FROM users WHERE email=?";

        $record = $this->connection->prepare($loginSql);

        $record->bind_param("s", $email);

        $record->execute();

        $result = $record->get_result();

        $user = '';

        if( $result->num_rows === 1 ){
            while( $row = mysqli_fetch_object($result) ){
                $user = $row;
            }
        } else {
            return array('email', 'Email address is not correct or does not exist.');
        }

        if( $user ){

            if( password_verify($password, $user->password) ){
                return $user;
            } else {
                return array('password', 'Password is not correct.');
            }

        }

    }    
}
