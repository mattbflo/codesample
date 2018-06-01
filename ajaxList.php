<?php
include ('Todo.php');

$todo = new Todo();
$todoItems = $todo->ListTodo();

echo "<ol>";
foreach ($todoItems as $todoItem) {
	echo '<li>';
	echo '<input name="todoupdate' . $todoItem['id'] . '" id="todoupdate' . $todoItem['id'] . '" value="';
	echo $todoItem['todo'];
	echo '">';
	echo "&nbsp;";
	echo '<button class="update" id="update' . $todoItem['id'] . '">edit</button>';
	echo "&nbsp;";
	echo '<a href="#" class="remove" id="todo'. $todoItem['id'] .'">remove</a>';
	echo "</li>";
}
echo "</ol>";

