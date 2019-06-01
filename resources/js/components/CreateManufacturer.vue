<template>
<div class="mt-5">
	<form @submit.prevent="addManufacturer">
		<div class="form-group">
			<label for="email">Manufacturer Name:</label>
			<input type="manufacturer_name" class="form-control" id="manufacturer_name" v-model="manufacturer.manufacturer_name">
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
  </div>
</template>

<script>
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
        	console.log(res);
        });
    }
  },
};
</script>