let global_this;

let properties = {
	data(){
		global_this = this;

		return {
			hold_products: [],
			products:["Book", "DVD", "Furniture"],
			sel:"",
			to_delete:[],
			senti:6
		}
	},
	computed:{
		//Might happen that the data is unsorted, this sorts it
		sorthold_products(){
			return this.hold_products.sort((a,b)=>{
				return a.id - b.id;
			});
		}
	},
	methods:{
		clicked(id){
			index = this.to_delete.indexOf(id);

			//Checks whether item to delete isn't already in the pending list
			if(this.to_delete.indexOf(id) !== -1) this.to_delete.splice(index, 1);
			else this.to_delete.push(id);

			console.log(id);

		},
		delete_products(){
			//Initiate deletion
			this.to_delete.map((item, ind)=>{
			    this.hold_products.map((x, index)=>{
			    	id = x.ID;
			        if(id === item){
			            this.hold_products.splice(index, 1);

			            $.post('api/core/handle.php', {id, delete:true}, function(){});
			        }
			    });
			});

			this.to_delete=[] //just empty it, obviously all elements have been used
		},
		capitalize(text){
			return text.charAt(0).toUpperCase() + text.slice(1)
		},
		addProduct(obj){
			this.hold_products.push(obj)
		}
	},
	mounted(){
		$.get('api/core/handle.php', function(data) {
			let array = JSON.parse(data);
			for(obj of array){
				let item = obj[0];

				//For some reasons the ID has string value. Convert it to int
				id = parseInt(item['ID']);
				item.ID = id;

				global_this.addProduct(item);
			}
	    });

	}
}

var app = Vue.createApp(properties);

app.mount("#app");