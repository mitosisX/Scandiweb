//Modularity functions
function appendDVD(div){
	div.append(`
         <div class="col col-md-3">
           <label class="form-control-label">Size</label>
       </div>
       <div class="col-12 col-md-9">
        <p class="form-control-static">
            <input type="number" id="size" name="text-input" class="form-control" required>
        </p>
       <label>"Please, provide size in MB's"</label>
       </div>`);
}

function appendFurniture(div){
	div.append(`<div class="col col-md-3">
           <label class="form-control-label">Height</label>
       </div>
       <div class="col-12 col-md-9">
        <p class="form-control-static">
            <input type="number" id="height" name="text-input" class="form-control" required>
        </p>
       </div>
       <div class="col col-md-3">
           <label class="form-control-label">Width</label>
       </div>
       <div class="col-12 col-md-9">
        <p class="form-control-static">
            <input type="number" id="width" name="text-input" class="form-control" required>
        </p>
       </div><div class="col col-md-3">
           <label class="form-control-label">Length</label>
       </div>
       <div class="col-12 col-md-9">
        <p class="form-control-static">
            <input type="number" id="length" name="text-input" class="form-control" required>
        </p>

       <label>"Please, provide dimensions in HxWxL format"</label>
   </div>`);
}

function appendBooks(div){
	div.append(`
	     <div class="col col-md-3">
	       <label class="form-control-label">Weight (KG)</label>
	   </div>
	   <div class="col-12 col-md-9">
	    <p class="form-control-static">
	        <input type="number" id="weight" name="text-input" class="form-control" required>
	    </p>
	   <label>"Please, provide Weight"</label>
	   </div>
	   `);
}

let kind = 1;

//some JQuery function
$(document).ready(function(){
	//The div that holds the dyamic properties of products
	dynamic_content = $("#dynamic_property");

	//Book being the first, auto show it
	appendBooks(dynamic_content);

	$("#productType").change(function(){
		product_sel = this.value;

		//Obviously, there are some content; override it
		dynamic_content.html('');

		switch(product_sel){
			case("Book"):
				kind = 1;
				appendBooks(dynamic_content)
				break;
			case("DVD"):
				kind = 2;
				appendDVD(dynamic_content)
				break;
			case("Furniture"):
				kind = 3;
				appendFurniture(dynamic_content)
				break;
		}
	});

	$('#save').on('click', function(){
		let dataValid = false;

		//the dialog would show many times over, limit it once
		let once = true;

        let inputs = {kind, delete:false};

        $('#product_form').find('input').each(function() {
        	let value = $(this).val();

        	if(value === ''){
        		if(once){
	        		alert('Please, submit required data');
	        		once = false;
	        	}
        		return false;
        	}

            inputs[$(this).attr("id")] = value;
            dataValid = true;
        });

		if(dataValid){
	        $.post('../api/core/handle.php', inputs, function(){
	        	returnToHome();
	        });
	    }
    });

    $("#cancel").on('click', function(){
    	returnToHome();
    });

    function returnToHome(){
		window.location.href = "../";
    }
});