<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <router-link :to="{name: 'notes.table'}" exact class="nav-link navbar-brand"><strong>NoteApp</strong></router-link>
        <!-- <a class="navbar-brand" href="/"><strong>NoteApp</strong></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <!-- <router-link :to="{name: 'home'}" exact class="nav-link"> Home </router-link> -->
                    <router-link :to="{name: 'notes.table'}" exact class="nav-link"> List Note </router-link>
                </li>
                <li class="nav-item">
                    <!-- <router-link :to="{name: 'pages.about'}" class="nav-link"> About </router-link> -->
                    <router-link :to="{name: 'notes.create'}" exact class="nav-link"> New Note </router-link>
                </li>
                <li class="nav-item">
                    <!-- <router-link :to="{name: 'pages.contact'}" class="nav-link"> Contact </router-link> -->
                    <!-- <router-link :to="{ name: 'notes.edit', params: { noteSlug: 56 }}" class="nav-link"> Edit </router-link> -->
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Note
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <router-link :to="{name: 'notes.create'}"  class="dropdown-item"> New Note </router-link>
                        <router-link :to="{name: 'notes.table'}"  class="dropdown-item"> List Note </router-link>
                    </div>
                </li> -->
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>



    <!-- <div class="container">
        <div>
            <router-link to="/">Home</router-link>
            <router-link to="/about">About</router-link>
            <router-link to="/contact">Contact</router-link>
        </div>
    </div> -->
</template>

<script>
    export default {

    }

</script>
