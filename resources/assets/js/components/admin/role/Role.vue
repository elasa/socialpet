<template>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3>Roles de Usuario desde component</h3>
			<table class="table table-hover table-responsive table-striped">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Creado</th>
						<th>Actualizado</th>
						<th colspan="2">Operaciones</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="role in roles">
						<td>{{ role.name }}</td>
						<td>{{ role.created_at }}</td>
						<td>{{ role.update_at }}</td>						
						<td>
							<a href="#">Editar</a>
						</td>
						<td>
							<a href="#">Eliminar</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>

<script>
	import axios from 'axios'

    export default {
        mounted() {
            console.log('Component role.')
        },
        data() {

        	return {
        		roles: [],
        	}
        },
        created: function(){
        	this.getRoles();
        },
        methods: {
        	getRoles: function(){
        		let url = 'api/roles';
        		axios.get(url).then(response => {
        			this.roles = response.data;
        			console.log(response.data)
        		});
        	}
        }
    }
</script>