<template>
    <div v-if="isLoggedIn">
        <alert />
        <navigation-admin />
        <div class="page-content">
            <sidebar />
            <div class="content-wrapper">
                <div class="content-inner">
                    <router-view />
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <alert />
        <navigation-landing />
        <router-view />
    </div>
</template>

<script>
import navigationAdmin from "../admin/partials/navigation.vue"
import navigationLanding from "../partials/navigation.vue"
import sidebar from "../admin/partials/sidebar.vue"
import alert from "../admin/partials/alert.vue"
import landingPage from "../pages/index.vue"

export default {
    data : () => {
        return {
            user: [],
        }
    },
    components: {
        navigationAdmin,
        navigationLanding,
        sidebar,
        alert,
        landingPage
    },
    computed: {
        isLoggedIn() {
            return this.$store.getters.isAuthenticated;
        }
    }
}
</script>

<style lang="css">
@import "../../../css/admin/app.css";
</style>