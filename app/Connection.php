<?php

namespace LibraFireProject;

class Connection
{
	public $connection;

	private $host;
	private $username;
	private $password;
	private $db; 

	public function __construct()
	{
		$this->host = config('database.connections.mysql.host');
		$this->username = config('database.connections.mysql.username');
		$this->password = config('database.connections.mysql.password');
		$this->db = config('database.connections.mysql.database');

		$conn = new \mysqli($this->host, $this->username, $this->password, $this->db);

		if( $conn->connect_error ){
			die('Error while connecting: ' . $conn->connect_error);
		}

		$this->connection = $conn;
	}
}