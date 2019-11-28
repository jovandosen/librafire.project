<?php

namespace LibraFireProject;

use Illuminate\Database\Eloquent\Model;
use LibraFireProject\Connection;

class Offer extends Connection
{
    public function create($userId, $itemId, $offer)
    {
    	$sql = "INSERT INTO offers(userId, itemId, offer, created_at, updated_at) VALUES(?, ?, ?, ?, ?)";

    	$record = $this->connection->prepare($sql);

    	$dateTime = date('Y-m-d H:i:s');

    	$record->bind_param("iiiss", $userId, $itemId, $offer, $dateTime, $dateTime);

    	$result = $record->execute();

    	$record->close();

    	$this->connection->close();

    	if( $result ){
    		return "Your offer was successfull.";
    	} else {
    		return "Error while making offer.";
    	}
    }
}
