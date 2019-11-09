<html>
<body>
	<div id='app'>
		Select Section:
		<select name="" id="" v-on:change='fetchStudents()' v-model='selected_section'>
		@foreach($sections as $section)
			<option value="{{ $section->id }}">{{ $section->name}}
			</option>
		@endforeach
		</select><br><br>
		
		<p>Paid Students</p>
		<ul>
			<li v-for='student in students'>
				@{{ students.first_name }} @{{ students.last_name }} 
				
			</li>
		</ul>

		<p>Unpaid Students</p>
		<ul>
			<li v-for='student in students'>
				@{{ students.first_name }} @{{ students.last_name }} 
			</li>
		</ul>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
	var vm = new Vue({
		el:'#app',
		data: {
			selected_section: '',
			students: []
		},
		methods: {
			fetchStudents(){
				axios.get('/students?section_id='+this.selected_section)
				 .then(function(response) {
                    console.log(response.data);
                    vm.students = response.data;
				});
			}
		},
		computed: {
			
		}
	})
</script>
</html>