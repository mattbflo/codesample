<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Todo List</title>
  <script 
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script type="text/javascript" src="todo.js"></script>
 </head>
 <body>
  <h1>My Todo List!</h1>
  
  <div id="addTodo">Add new item<br><input name="newItem" id="newItem">&nbsp;<button class="addTodo">Add</button></div>
  <div id="loading">Loading todo list...</div>
  <div id="todo"></div>
  
  <script>
  
	$("body").on("click", ".addTodo", function () {
        createTodo();
		var newItem = $("#newItem").val('');
    });
	
	
    $("body").on("click", ".update", function (e) {
        e.preventDefault();
        var todoId = $(this).attr("id"); //update#
		var edit = $("#todo"+todoId).val();
		var formData = 'todoId=' + todoId + '&edit=' + edit;
        $.ajax({
            type: "POST",
            url: "ajaxUpdateTodo.php",
			data: formData,
            success: function (data) {
				loadTodo();
            }
        });
    });
	
    $("body").on("click", ".remove", function (e) {
        e.preventDefault();
        var todoId = $(this).attr("id");
		var formData = 'todoId=' + todoId;
        $.ajax({
            type: "POST",
            url: "ajaxDeleteTodo.php",
			data: formData,
            success: function (data) {
				loadTodo();
            }
        });
    });
  
    $(document).ready(function() {
        loadTodo();
    });
 </script>
 </body>
</html>
