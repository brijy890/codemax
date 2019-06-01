<template>
	<form @submit.prevent="addCarModel">
		<div class="form-group">
	      <label for="sel1">Select Manufacturer:</label>
	      <select class="form-control" id="manufacturers" @change="onChange($event)" v-model="manufacturer_id">
	        <option v-for="manufacturer in carModel.manufacturers" v-bind:value="manufacturer.id">{{ manufacturer.manufacturer_name }}</option>
	      </select>
  		</div>
		<div class="form-group">
			<label for="model_name">Model Name:</label>
			<input type="text" class="form-control" id="model_name" v-model="carModel.model_name"> 
		</div>
		<div class="form-group">
			<label for="model_name">Total:</label>
			<input type="number" class="form-control" id="total" v-model="carModel.total"> 
		</div>
		<button type="submit" class="btn btn-success">Submit</button>
	</form>
</template>

<script>
export default {
  data() {
    return {
    	carModel: {
    		model_name: '',
    		manufacturers: null,
    		manufacturer_id: '',
    		total: 0
    	},
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    addCarModel() {
      fetch('/api/car-model', {
      	method: 'post',
      	body: JSON.stringify(this.carModel),
        headers: {
            'content-type': 'application/json'
        }
      })
        .then(res => res.json())
        .then(res => {
        	console.log(res);
        });
    },
    fetchData() {
      fetch('/api/manufacturer')
      .then(res => res.json())
      .then(res => {
        this.carModel.manufacturers = res.data;
      })
      .catch(err => console.log(err));
    },
onChange(event) {
	this.carModel.manufacturer_id = event.target.value;
}
  },
};
</script>