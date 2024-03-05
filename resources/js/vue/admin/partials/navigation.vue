<template>
    <header>
        <div class="navbar">
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="logo"><a href="/"><img src="https://morph-digital.com/media/2022/10/logo-twolines@2x.png"
                        alt=""></a></div>
            <div class="navbar-right">
                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="Profile Picture">
                <span class="navbar-right-title">Hafiz</span>
            </div>
        </div>
    </header>
</template>

<script>
export default {

}
</script>

<style scoped>
/* navigation bar css */

header {
    display: flex;
    padding: 0 2rem;
    background-color: var(--platinum);
    z-index: 1000;
    width: 100%;
    transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.navbar {
    height: 100px;
    width: 100%;
    display: flex;
    flex-wrap: inherit;
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

.navbar-right {
    display: flex;
    margin-left: auto;
    align-items: center;
    background-color: var(--grey-border);
    border-radius: 30px;
    cursor: pointer;
}

.navbar-right img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin: 5px 5px;
}

.navbar-right span {
    color: var(--black);
    margin: 5px 15px;
    font-size: 1.1rem;
    font-weight: 500;
}

.navbar .links {
    display: flex;
    gap: 2rem;
}

.navbar .links a {
    font-weight: bold;
    font-size: 1.3rem;
    color: var(--white);
    transition: all 0.5s ease-in-out;
}

.navbar .links a:hover {
    color: var(--darkred);
}

.navbar .links a.active {
    color: var(--darkred);
}

.navbar .links a.umno {
    color: var(--red);
}

.navbar .toggle-btn {
    color: var(--white);
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

.main-content {
    margin-left: 200px;
}


/* responsive */

@media (max-width: 992px) {
    .navbar {
        height: 80px;
    }

    .navbar .links {
        display: none;
    }

    .navbar .toggle-btn {
        display: block;
        margin-right: 20px;
    }

    .navbar .logo img {
        height: 2.0rem;
    }

    .navbar-right-title {
        display: none;
    }


    .dropdown-menu {
        display: block;
    }

    .sidebar {
        width: 0;
        top: 80px;
        left: -100%;
        position: fixed;
    }

    .sidebar.show {
        display: block;
        width: 300px;
        left: 0;
    }
}

@media (max-width: 576px) {

    .navbar {
        height: 80px;
    }

    .dropdown-menu.show {
        height: 215px;
    }

    .dropdown-menu li a {
        font-weight: bold;
        font-size: 2.0rem;
    }

}
</style>