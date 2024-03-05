<template>
    <header>
        <div class="navbar">
            <div class="logo"><a href="/"><img src="https://morph-digital.com/media/2022/10/logo-twolines@2x.png" alt=""></a></div>
            <ul class="links">
                <li><a href="#" @click="home()" :class="this.$router.currentRoute.value.fullPath == '/' ? 'active' : ''" >HOME</a></li>
                <li><a href="#" @click="login()" :class="this.$router.currentRoute.value.fullPath == '/login' ? 'active' : ''" class="">LOGIN</a></li>
            </ul>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="navbar-correction"></div>
</template>

<script>
export default {
    methods: {
        home() {
            $('#carouselHome').addClass('show');
            $('#loginForm').removeClass('show');
            setTimeout(() => {
                this.$router.push('/'); 
            }, 300);
        },
        login() {
            $('#loginForm').addClass('show');
            $('#carouselHome').removeClass('show');
            setTimeout(() => {
                this.$router.push('/login'); 
            }, 300)
        }
    }
}
</script>

<style scoped>
/* navigation bar css */

.navbar-correction {
    background-color: var(--platinum);
    height: 100px;
}

header {
    /* display:flex; */
    position: fixed;
    padding: 0 2rem;
    background-color: var(--platinum);
    z-index: 1000;
    width: 100%;
    transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

ul {
    margin-bottom: 0;
}


.navbar {
    height: 100px;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.navbar .logo a {
    font-size: 1.5rem;
    font-weight: bold;
}

.navbar .logo img {
    padding-top: 5px;
    height: 3.0rem;
    transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.navbar .links {
    display: flex;
    gap: 2rem;
}

.navbar .links a {
    font-weight: bold;
    font-size: 1.3rem;
    color: var(--grey);
    transition: all 0.5s ease-in-out;
}

.navbar .links a:hover {
    color: var(--dark-blue-very-light-hover);
}

.navbar .links a.active {
    color: var(--dark-blue-very-light-hover);
}

.navbar .links a.umno {
    color: var(--red);
}

.navbar .toggle-btn {
    color: var(--black);
    font-size: 1.5rem;
    cursor: pointer;
    display: none;
}

/* dropdown menu */

.dropdown-menu {
    display: none;
    position: absolute;
    /* right: 2rem; */
    left: 0;
    top: 60px;
    height: 0;
    width: 100%;
    background: var(--black-opacity);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    overflow: hidden;
    transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.dropdown-menu a {
    transition: all 0.5s ease-in-out;
    color: var(--white);
}

.dropdown-menu a:hover {
    color: var(--darkred);
}

.dropdown-menu a.active {
    color: var(--darkred);
}

.dropdown-menu.show {
    height: 240px;
}

.dropdown-menu li {
    padding: 0.7rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dropdown-menu li a {
    font-weight: bold;
    font-size: 2.3rem;
}


/* responsive */

@media (max-width: 992px) {
    .navbar, .navbar-correction {
        height: 60px;
    }

    .navbar .links {
        display: none;
    }

    .navbar .toggle-btn {
        display: block;
    }

    .navbar .logo img {
        height: 2.0rem;
    }

    .dropdown-menu {
        display: block;
    }
}

@media (max-width: 576px) {

    .navbar, .navbar-correction {
        height: 60px;
    }

    .dropdown-menu.show {
        height: 215px;
    }

    .dropdown-menu li a {
        font-weight: bold;
        font-size: 2.0rem;
    }

}</style>