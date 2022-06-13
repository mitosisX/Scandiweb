let to_delete = [];

$(document).ready(function(){
	$(".delete-checkbox").click(function(){
		//Each checkbox has an id attached to it
		let id = parseInt($(this).data("id"));
		let parent_element = $(this).parent().parent();

		if(to_delete.length > 0){
			to_delete.map((obj,iter)=>{

				let obj_id = obj['id'];

				if(id == obj_id) to_delete.splice(iter, 1);
				else to_delete.push({id, 'elem':parent_element});
			});
		}else{
			to_delete.push({id, 'elem':parent_element});
		}
	});

	$("#mass-delete").click(function(){
		for(let obj of to_delete){
			let id = obj['id'];
			let parent = obj['elem'];
			
			$.post('api/core/handle.php', {id, delete:true}, function(){});

			parent.remove();
		}
		to_delete=[]
	});
});