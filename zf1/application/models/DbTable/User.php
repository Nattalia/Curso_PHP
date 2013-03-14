<?php
class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{
protected $_name = 'users';

public function getUser($id)
{
	$id = (int)$id;
	$row = $this->fetchRow('iduser = ' . $id);
	if (!$row) {
		throw new Exception("Could not find row $id");
	}
	return $row->toArray();
}
public function addUser($data)
{
	/*$data = array(
			'artist' => $artist,
			'title' => $title,
	);*/
	$this->insert($data);
}
public function updateUser($id, $data)
{
	/*$data = array(
			'artist' => $artist,
			'title' => $title,
	);*/
	$this->update($data, 'iduser = '. (int)$id);
}

public function deleteUser($id)
{
	$this->delete('iduser =' . (int)$id);
}
}