      function loadTodo() {
        $("#loading").show();
        $("#todo").hide();
        $.ajax({
            type: "POST",
            url: "ajaxList.php",
            success: function (data) {
                $("#loading").hide();
                $("#todo").html(data);
                $("#todo").show();
            }
        });
    }
	
    function createTodo() {
		var newItem = $("#newItem").val();
		var formData = 'newItem=' + newItem;
        $.ajax({
            type: "POST",
            url: "ajaxCreateTodo.php",
			data: formData,
            success: function (data) {
				loadTodo();
            }
        });
    }
	