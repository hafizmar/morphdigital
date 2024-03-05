<template>
    <div class="sidebar">
        <label class="sidebar-label">Menu</label>
        <ul>
            <li>
                <router-link to="dashboard" :class="this.$router.currentRoute.value.fullPath == '/dashboard' ? 'active' : ''"
                    @click="setActiveMenuItem(0)"><font-awesome-icon icon="house" /> Home</router-link>
            </li>
            <li>
                <router-link to="tasks" :class="this.$router.currentRoute.value.fullPath == '/tasks' ? 'active' : ''"
                    @click="setActiveMenuItem(1)"><font-awesome-icon icon="list-check" /> Task List</router-link>
            </li>
            <li>
                <router-link to="users" :class="this.$router.currentRoute.value.fullPath == '/users' ? 'active' : ''"
                    @click="setActiveMenuItem(2)"><font-awesome-icon icon="user-tie" /> User List</router-link>
            </li>
            <li>
                <router-link to="" @click="logout()"><span
                        class="text-danger"><font-awesome-icon icon="power-off" /></span> Logout</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            activeMenuItem: null
        }
    },
    methods: {
        setActiveMenuItem(index) {
            this.activeMenuItem = index;
        },
        logout() {
            axios.get('api/logout').then(response => {
                if (response.data.status) {
                    this.alert(response.data.message, "Successful!", "success");

                    setTimeout(() => {
                        this.$router.push('/');
                        this.$store.commit('clearToken');
                    }, 1500);
                } else {
                    this.alert(response.data.message, "Failed!", "danger");
                }
            }).catch(error => {
                console.log(error);
            });

        }
    },
    mounted() {
        this.setActiveMenuItem(0);
    },
}
</script>

<style scoped>
/* sidebar */

.sidebar {
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    width: 300px;
    height: 100vh;
    background-color: var(--platinum);
    border-top: 0.5px solid var(--white);
    z-index: 999;
    cursor: pointer;
    transition: width 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275), top 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li a {
    display: block;
    color: var(--black);
    text-decoration: none;
    padding: 8px 16px;
    transition: background-color 0.25s ease-in-out;
}

.sidebar ul li a:hover {
    /* color: var(--white); */
    background-color: var(--grey-border);
    border-right: 2px solid var(--dark-blue-very-light);
}

.sidebar ul li a.active {
    /* color: var(--white); */
    background-color: var(--grey-border);
    border-right: 2px solid var(--dark-blue-very-light);
}

.sidebar ul li a>i {
    padding: 10px;
}

/* .sidebar ul li a>i:nth-child(2) {
    position: relative;
    float: right;
} */

.sidebar-label {
    display: block;
    color: var(--black-hover);
    font-size: small;
    font-weight: bold;
    text-transform: uppercase;
    padding-top: 30px;
    padding-bottom: 0;
    padding-left: 23px;
}

.sidebar-umno img {
    height: 28px;
    width: auto;
    margin: 0 5px;
}

.sidebar-umno a {
    display: flex !important;
    color: red;
    align-items: center;
}

.sidebar-submenu {
    /* display: none; */
    height: 0;
    position: relative;
    top: 0;
    background-color: var(--dark-blue-very-very-light) !important;
    transition: all 0.1s ease-in-out;
}

/* .sidebar-submenu.show {
    display: block;
    height: 130px;
} */

.sidebar-submenu.show li a {
    display: block !important;
}

.sidebar-submenu li a {
    display: none !important;
    padding: 10px 16px !important;
    padding-left: 3.2rem !important;
}

.sidebar-submenu li a:hover {
    transition: all 0.1s ease-in-out;
    padding-left: 3.5rem !important;
}

.toggle-submenu-icon {
    position: relative;
    float: right;
    padding: 8px;
    /* cursor: pointer; */
}

.toggle-submenu-icon i {
    transition: transform 0.2s ease-in-out;
}
</style>