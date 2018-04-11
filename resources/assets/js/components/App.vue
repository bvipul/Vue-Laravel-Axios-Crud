<template>
    <div id="app">
        <div class="heading">
            <h1>Aliens</h1>
        </div>
        <div class="flex-container">
            <alien-component
                v-for="alien in aliens"
                v-bind="alien"
                :key="alien.id"
                @update="update"
                @destroy="destroy"
            ></alien-component>
        </div>
        <div>
            <button class="btn btn-primary" @click="create()">Add</button>
        </div>
    </div>
</template>
<script>

    function Alien({ id, color, name}) {
        this.id = id;
        this.color = color;
        this.name = name;
    }


    import AlienComponent from './AlienComponent.vue';

    export default {
        data() {
            return {
                aliens: [],
                mute: false
            }
        },
        methods: {
            create() {
                this.mute = true;
                window.axios.get('/api/aliens/create').then(({data}) => {
                    console.log(data);
                    this.aliens.push(new Alien(data));
                    this.mute = false;
                });
            },
            index() {
                this.mute = true;
                window.axios.get('/api/aliens').then(({ data }) => {
                    data.forEach(alien => {
                        this.aliens.push(new Alien(alien));
                        this.mute = false;
                    });
                });
            },
            update(id, color) {
                this.mute = true;
                window.axios.put('api/aliens/' + id, { color: color}).then(({data}) => {
                    this.aliens.find(alien => alien.id === id).color = color;
                    this.mute = false;
                });
            },
            destroy(id) {
                this.mute = true;
                window.axios.delete(`api/aliens/${id}`, {}).then(() => {
                    let index = this.aliens.findIndex(alien => alien.id === id)
                    this.aliens.splice(index, 1);
                    this.mute = false;
                });
            }
        },
        components: {
            AlienComponent
        },
        created() {
            this.index();
        },
        watch: {
            mute(val) {
                document.getElementById('mute').className = val ? "on" : "";
            }
        }
    }

</script>