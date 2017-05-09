<template lang="html">
    <div class="container">
        <h3>Welcome to Larvel Vue Collage <router-link class="btn btn-success pull-right" to="/collage">Create New</router-link></h3>
        <hr>
        <div class="row">
            <div id="lightgallery">
                <div class="col-lg-2 col-sm-3 col-xs-4"  v-if="images.length" v-for="(image, index) in images">
                    <a :href="'/images/user/'+image.filename">
                        <img :src="'/images/user/'+image.filename" class="thumbnail img-responsive">
                    </a>
                </div>
            </div>
            <div class="col-lg-12"  v-if="!images.length">
                <p>Please create new collage...</p>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">    
    import 'lightgallery.js'
    import 'lg-thumbnail.js'
    import 'lg-zoom.js'

    export default {
        data(){
            return {
                loading: false,
                images: [],
            }
        },
        computed: {
            access_token() {
                return this.$store.getters.access_token;
            }
        },
        methods: {
            fetchData(access_token) {
                const config = {
                    headers: {'Authorization': "Bearer " + access_token}
                };
                axios.get('/api/user/images', config)
                        .then(response => {
                            if (response.status === 200) {
                                this.processData(response.data)
                            }
                        })
                        .catch(error => {
                            console.log(error.response)
                        })
            },

            processData(data) {
                this.images = data;
            }
        },
        mounted() {
            const access_token = localStorage.getItem('token');
            if (access_token) {
                this.fetchData(access_token)
            }

            setTimeout(() => {
                lightGallery(document.getElementById('lightgallery'), {
                    thumbnail:true,
                    animateThumb: false,
                    showThumbByDefault: false,
                    selector: 'a'
                })
            }, 1000)
        }
    }
</script>
