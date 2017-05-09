<template lang="html">
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <li>
                <router-link to="/" >{{ user.name }}</router-link>
            </li>
            <li>
                <a href="#" @click.prevent="logout">Logout</a>
            </li>
        </ul>
    </div>
</template>

<script type="text/babel">
    export default {
        name: 'authorised-header',
        props: {
          user: {
            required: true,
          },
        },
        data(){
            return {
                //
            }
        },
        methods: {
          logout() {
              localStorage.clear()
              window.location.href = "/login"
          },
        },
    }
</script>