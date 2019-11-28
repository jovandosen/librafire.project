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

    public function itemList($userID)
    {
    	$itemListSql = "SELECT items.id AS itemID, name, description, price, payment, delivery, firstName, lastName 
    					FROM items 
    					INNER JOIN users ON items.userID=users.id
    					WHERE users.id=?";

    	$records = $this->connection->prepare($itemListSql);
    	
    	$records->bind_param("i", $userID);

    	$records->execute();

    	$results = $records->get_result();

    	$items = [];

    	if( $results->num_rows > 0 ){
    		while( $row = mysqli_fetch_object($results) ){
    			$items[] = $row;
    		}
    	}

    	return $items;				
    }

    public function deleteItem($id)
    {
    	$itemDeleteSql = "DELETE FROM items WHERE id=?";

    	$record = $this->connection->prepare($itemDeleteSql);

    	$record->bind_param("i", $id);

    	$result = $record->execute();

    	if( $result ){
    		return "Item deleted successfully.";
    	} else {
    		return "Error while deleting Item.";
    	}
    }

    public function findItemById($id)
    {
    	$sql = "SELECT * FROM items WHERE id=?";

    	$record = $this->connection->prepare($sql);

    	$record->bind_param("i", $id);

    	$record->execute();

    	$data = $record->get_result();

    	$item = '';

    	if( $data->num_rows === 1 ){
    		while( $row = mysqli_fetch_object($data) ){
    			$item = $row;
    		}
    	}

    	return $item;
    }

    public function updateItem($userID, $name, $description, $price, $payment, $delivery, $image, $id)
    {
    	$updateItemSql = "UPDATE items SET userID=?, name=?, description=?, price=?, payment=?, delivery=?, image=?, updated_at=? WHERE id=?";

    	$record = $this->connection->prepare($updateItemSql);

    	$dateTime = date('Y-m-d H:i:s');

    	$record->bind_param("ississssi", $userID, $name, $description, $price, $payment, $delivery, $image, $dateTime, $id);

    	$result = $record->execute();

    	$record->close();

    	$this->connection->close();

    	if( $result ){
    		return "Item updated successfully.";
    	} else {
    		return "Error while updating Item.";
    	}
    }
}
