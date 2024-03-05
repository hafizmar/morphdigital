<template>
    <div class="content">
        <dashboard-counter :tasks="data.tasks" :users="data.users" />
    </div>
</template>

<script>
import dashboardCounter from "../partials/dashboard_counter.vue"

export default {
    data: () =>{
        return {
            data: {
                tasks: 0,
                users: 0,
            }
        }
    },
    components: {
        dashboardCounter,
    },
    methods: {
        async getDashboard() {
            await axios.get('api/home').then(response => {
                this.data.tasks = response.data.tasks;
                this.data.users = response.data.users;
            }).catch(error => {
                console.log(error);
            })
        }
    },
    mounted() {
        this.getDashboard();
    }
}
</script>

<style lang="css">
@import "../../../../css/admin/app.css";
</style>