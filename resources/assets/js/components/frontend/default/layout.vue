<template lang="html">
    <div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <router-link to="/" class="navbar-brand">Laravel</router-link>
                </div>
                <authorised-header v-if="user"/>
                <default-header v-else/>
            </div>
        </nav>

        <router-view></router-view>
    </div>
</template>
<script type="text/babel">

    import DefaultHeader from './general/default_header.vue'
    import AuthorisedHeader from './general/authorised_header.vue'

    export default {
        data(){
            return {}
        },
        components: {
            'default-header': DefaultHeader,
            'authorised-header': AuthorisedHeader,
        },
        computed: {
            user() {
                const user = this.$store.getters.user;

                if (_.isEmpty(user))
                    return null;
                return user;
            }
        },
    }
</script>