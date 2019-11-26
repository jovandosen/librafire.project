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
}
