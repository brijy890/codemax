<template>
<table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="manufacturer in manufacturers">
        <td>{{ manufacturer.manufacturer_name }}</td>
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
      fetch('/api/manufacturer')
      .then(res => res.json())
      .then(res => {
        this.manufacturers = res.data;
      })
      .catch(err => console.log(err));
    }
  }
}
</script>