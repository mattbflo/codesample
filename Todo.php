<?php
/**
 *	Todo class
 *
 * This is the primary class for the Todo application. It contains all the CRUD methods.
 */

 include_once('db.php');
 
class Todo {
	
	public function __construct() {
		
	}

	
	/**
	* ListTodo
	*/
	
	public function ListTodo() {
		global $pdo;
		$sql = $pdo->query("SELECT * FROM todo WHERE status='1' ORDER BY sort_order");
		$list = $sql->fetchAll();
		
		return $list;
	}
	
	/**
	* CreateTodo
	*
	* Used to create a new todo item. Status is set to '1' to indicate "not completed" and sort order is set to the number of items plus 1
	*/
	
	public function CreateTodo($todo) {
		global $pdo;
		
		$todo = trim($todo);
		
		$sort_order = $this->ResortTodo();
		$sort_order++;
		
		$sql = $pdo->prepare("INSERT INTO todo (todo, status, sort_order, date_added) VALUES (:todo, :status, :sort_order, :date_added)");
		$sql->execute(array(
			"todo" => $todo, 
			"status" => 1,
			"sort_order" => $sort_order,
			"date_added" => date("Y-m-d H:i:s")
		));
	}
	
	/**
	* Edit Todo
	*/
	public function UpdateTodo($id, $edit) {
		global $pdo;
		$sql = $pdo->prepare("UPDATE todo SET todo=:todo WHERE id=:id");
		$sql->execute(array(
			"todo" => $edit,
			"id" => $id
		));
	}
	
	/**
	* Complete Todo
	*/
	public function CompleteTodo($id) {
		global $pdo;
		$sql = $pdo->prepare("UPDATE todo SET status=:status WHERE id=:id");
		$sql->execute(array(
			"status" => 2,
			"id" => $id
		));
	}
	
	/**
	* Delete Todo
	*/
	
	public function DeleteTodo($id) {
		global $pdo;
		$sql = $pdo->prepare("DELETE FROM todo  WHERE id=:id");
		$sql->execute(array(
			"id" => $id
		));
	}
	
	/**
	* Resort Todo
	*
	* Loop through all the todos and fix the sort_order. Returns total Todos with status equal to 1
	*/
	public function ResortTodo() {
		global $pdo;
		$so = 0;
		$sql = $pdo->query("SELECT id FROM todo WHERE status='1'");
		$result = $sql->fetchAll();
		foreach ($result as $todo) {
			$so++;
			$update = $pdo->prepare("UPDATE todo SET sort_order=:sort_order WHERE id=:id");
			$update->execute(array(
				"sort_order" => $so,
				"id" => $id
			));
		}
		
		return $so;
	}
	
}