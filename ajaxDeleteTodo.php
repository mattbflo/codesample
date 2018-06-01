<?php
/**
 * Delete Todo
 */
 
include ('Todo.php');

if (isset($_POST['todoId'])) {
	$todoId = str_ireplace("todo", "", $_POST['todoId']); //trim off "todo" to get the todo id
	$todo = new Todo();
	$todo->DeleteTodo($todoId);
}

