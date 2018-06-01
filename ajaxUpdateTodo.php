<?php
/**
 * Create Todo
 */
 
include ('Todo.php');

if (isset($_POST['todoId'])) {
	$todoId = str_ireplace("update", "", $_POST['todoId']); //trim off "update" to get the todo id
	$edit = $_POST['edit'];
	$todo = new Todo();
	$todo->UpdateTodo($todoId, $edit);
}

