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
                <router-link to="/">{{ user.name }}</router-link>
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
    }
</script>