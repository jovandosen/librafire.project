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

    public function getOffers($id)
    {
    	$sql = "SELECT users.firstName, users.lastName, offers.offer, offers.created_at, items.name 
    			FROM offers 
    			INNER JOIN users ON users.id=offers.userId
    			INNER JOIN items ON offers.itemId=items.id
    			WHERE itemId=?";

    	$record = $this->connection->prepare($sql);

    	$record->bind_param("i", $id);

    	$record->execute();

    	$results = $record->get_result();

    	$data = [];

    	if( $results->num_rows > 0 ){
    		while( $row = mysqli_fetch_object($results) ){
    			$data[] = $row;
    		}
    	}

    	$record->close();

    	$this->connection->close();

    	return $data;
    }
}
