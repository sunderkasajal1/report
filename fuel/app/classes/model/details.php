<?php
namespace Model;

class Details extends \Model {

    public static function get_class($school_id){
        $query = \DB::query("SELECT classid,classname FROM class WHERE schoolid=:schoolid");
        $query->parameters(array(
                'schoolid' => $school_id
                ));
        $result = $query->as_assoc()->execute();
        return $result;

    }
    /*public static function insert_user($id,$name,$email,$gender)
    {
    	$query = \DB::query("INSERT INTO user (id,name,email,gender) VALUES (:id,:name,:email,:gender)
  					ON DUPLICATE KEY UPDATE DateTimeInserted=now()");
    	$query->parameters(array(
    		'id' => $id,
    		'name' => $name,
    		'email' => $email,
    		'gender' => $gender));
    	$result = $query->execute();

    	return $result;

    }*/
    /*public static function is_published($id)
    {
    	$query = \DB::query("SELECT is_published FROM user WHERE id=:id");
    	$query->parameters(array(
    		'id' => $id,
    		));
    	$result = $query->execute()->current();

    	return $result['is_published']?$result['is_published']:false;	
    }
    public static function update_album_id($id,$album_id)
    {
    	$query = \DB::query("UPDATE user SET is_published=:album_id WHERE id=:id");
    	$query->parameters(array(
    		'id' => $id,
    		'album_id' => $album_id
    		));
    	$result = $query->execute();

    	return $result;	
    }*/

}
?>