<?php

namespace LibraFireProject;

use Illuminate\Database\Eloquent\Model;
use LibraFireProject\Connection;

class Item extends Connection
{
    public function create($userID, $name, $description, $price, $payment, $delivery, $image)
    {
    	$itemSql = "INSERT INTO items(userID, name, description, price, payment, delivery, image, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

    	$record = $this->connection->prepare($itemSql);

    	$dateTime = date('Y-m-d H:i:s');

    	$record->bind_param("ississsss", $userID, $name, $description, $price, $payment, $delivery, $image, $dateTime, $dateTime);

    	$result = $record->execute();

    	$record->close();

    	$this->connection->close();

    	if( $result ){
    		return "Item created successfully.";
    	} else {
    		return "Error while creating Item.";
    	}
    }
}
