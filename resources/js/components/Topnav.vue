<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
     <router-link to="/">
      <a class="navbar-brand">Car Inventory</a>
     </router-link>
     <router-link to="/create-manufacturer">
      <a class="link">Create Manufaturer</a>
     </router-link>
     <router-link to="/create-car-model">
      <a class="link">Create Car Model</a>
     </router-link>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
	.link {
		color: white !important;
		padding: 14px 25px;
		text-align: center; 
		text-decoration: none;
		display: inline-block;
	}

	.navbar-brand {
		color: #fff !important;
		font-weight: bold;
	}
</style>