<template>
    <div>
        <div class="row">
            <div class="col-xs-12 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end"><font-awesome-icon icon="tasks" size="2x"></font-awesome-icon></div>
                        <h3 class="card-title">Task List</h3>
                        <p class="card-text">{{ tasks }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end"><font-awesome-icon icon="gears" size="2x"></font-awesome-icon></div>
                        <h3 class="card-title">User List</h3>
                        <p class="card-text">{{ users }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end"><font-awesome-icon icon="gears" size="2x"></font-awesome-icon></div>
                        <h3 class="card-title">System Error</h3>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end"><font-awesome-icon icon="gears" size="2x"></font-awesome-icon></div>
                        <h3 class="card-title">Logged In</h3>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['tasks', 'users'],
    created() {
    }
}
</script>

<style scoped>
.card-text {
    font-size: 2rem;
}
</style>