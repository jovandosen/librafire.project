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
}
