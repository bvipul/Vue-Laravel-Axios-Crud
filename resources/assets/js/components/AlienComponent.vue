<template>
    <div class="alien col-md-4">
        <div class="col-1">
            <img :src="image"/>
        </div>
        <div class="col-2 form-group">
            <h3>{{ name | properCase }}</h3>
            <select class="form-control" @change="update">
                <option
                v-for="col in [ 'red', 'green' ]"
                :value="col"
                :key="col"
                :selected="col === color ? 'selected' : ''"
                >{{ col | properCase }}
                </option>
            </select>
            <button class="btn btn-danger form-control" @click="destroy">Delete</button>
        </div>
    </div>
</template>

<script>
  export default {
    computed: {
      image() {
        return `/images/${this.color}.png`;
      }
    },
    methods: {
      update(val) {
        this.$emit('update', this.id, val.target.selectedOptions[0].value);
      },
      destroy() {
        this.$emit('destroy', this.id);
      }
    },
    props: ['id', 'color', 'name'],
    filters: {
      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>
    .alien {
        display: flex;
        margin: 1em 1em 1em 0;
        border: 1px solid #d1d1d1;
        padding: 1em;
        max-width: 350px;
        background-color: white;
    }
    .alien select {
        width: 100px;
    }
    .alien button.btn-danger {
        width: 100px;
        margin-top: 10px;
    }
    .alien img {
        height: 200px;
    }
    .col-2 {
        margin-left: 11em;
    }
    .col-2 > h3 {
        margin: 0.5em 0;
    }
</style>