<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">Add New Todo <span class="pull-right"><a href="<?php echo base_url(); ?>">Todo List</a></span></h3></h2>
        <div class="message"></div>
        <form method="post" action="" class="form-horizontal" name="addTodo">
            <input type="hidden" name="data_action" value="add_todo" />
            <div class="form-group">
                <label class="control-label col-sm-3">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Short Desc</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="short_desc"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Long Desc</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="long_desc"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

<script>
$(document).on("submit", "form[name='addTodo']", function(e){
	e.preventDefault();
	var data=$(this).serialize();
	$.ajax({
		method: "POST",
		url : "<?=base_url()?>api/action",
		data: data,
		dataType:'json',
		success: function(data){
			console.log(data);
			if(data.is_error == "yes") {
				$('.message').addClass("alert alert-danger");
				$('.message').html("Something went wrong. Please try again later.");
			} else {
				console.log(data.data);
				$('.message').addClass("alert alert-success");
				$('.message').html("Record added successfully.");
			}
		},
		error: function() {
			alert("Some Error occured. Please try again after some time."); 
		}
	});
	return false;
});
</script>