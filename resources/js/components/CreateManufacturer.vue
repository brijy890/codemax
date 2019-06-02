<template>
<div class="mt-5">
	<form @submit.prevent="addManufacturer">
		<div class="form-group">
			<label for="email">Manufacturer Name:</label>
			<input type="text" class="form-control" id="manufacturer_name" v-model="manufacturer.manufacturer_name" required>
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
  </div>
</template>

<script>
import router from '../app';
export default {
  data() {
    return {
    	manufacturer: {
    		manufacturer_name: '',
    	},
    };
  },
  methods: {
    addManufacturer() {
      fetch('/api/manufacturer', {
      	method: 'post',
      	body: JSON.stringify(this.manufacturer),
        headers: {
            'content-type': 'application/json'
        }
      })
        .then(res => res.json())
        .then(res => {
        	router.push({ path: '/create-car-model' });
        });
    }
  },
};
</script>