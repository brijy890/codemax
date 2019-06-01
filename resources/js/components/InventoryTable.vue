<template>
<table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Count</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="manufacturer in manufacturers">
        <td>{{ manufacturer.manufacturer_name }}</td>
        <td>{{ manufacturer.model_name }}</td>
        <td>{{ manufacturer.remaing_count }}</td>
        <td><button class="btn btn-default" @click="soldCar(manufacturer.id)" :disabled="manufacturer.remaing_count <= 0">Sold</button></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      manufacturers: null,
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      fetch('/api/car-model')
      .then(res => res.json())
      .then(res => {
        this.manufacturers = res.data;
      })
      .catch(err => console.log(err));
    },
    soldCar(id) {
      fetch('/api/car-model/'+id, {
        method: 'put',
        headers: {
            'content-type': 'application/json'
        }
      })
        .then(res => res.json())
        .then(res => {
          console.log(res);
        });
    }
  }
}
</script>