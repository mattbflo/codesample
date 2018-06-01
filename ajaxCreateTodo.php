<?php
/**
 * Create Todo
 */
 
include ('Todo.php');

if (isset($_POST['newItem'])) {
	$newItem = $_POST['newItem'];
	$todo = new Todo();
	$todo->CreateTodo($newItem);
}

