
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
	data:{
		sumOfSales:''   // init new variable to save some of pricese 
	},
	ready:function(){},
	created(){
	},
	methods:{
		saveData(){
			axios.post('/SaveData', { // send data to serve to save to json file with post method
				'Name':$('form input[type="text"]').val(),
				'Price':$('form input[type="number"]').val()
			})
		  .then(response => {
				$('.alert-danger').fadeOut(5); // hide errors in new request
			console.log(response);
			})
		  .catch(error => {
			$('.alert-danger').fadeIn(5);  // display errors
			$('.alert-danger').html(error); 
			});
			
		},
		
		getData(e){
			
			axios.get('/GetData', { // get data from serve to display in table
			})
		  .then(response => {
				var sumOfSales=0;  //reset sum of sales 
				$('table tbody').html(''); // reset the table body
			$.each(response.data,function(index,value){    // loop for array of{ Name , Price}
				$('table tbody').append('<tr><td>'+value['data.Name']+'</td><td>'+value['data.Price']+'</td></tr>');
				sumOfSales += parseInt(value['data.Price']); //Generate some of all prices
				
			});
				$(".alert-primary").html("Sum Of Sales : "+sumOfSales);
				console.log(response.data);
			})
		  .catch(error => {
			$('.alert-danger').fadeIn(5); // display errors in alert
			$('.alert-danger').html(error);	
			});
			
		}
	},
	
	
});
