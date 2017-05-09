<template lang="html">
    <div class="col-lg-2 col-sm-3 col-xs-4">
        <a href="#">
            <img data-lightbox="roadtrip" :src="'/images/user/'+image.filename" class="thumbnail img-responsive">
        </a>
    </div>
</template>

<script type="text/babel">

    require(['lightgallery.js'], function() {
        require(["./lg-zoom.js", "./lg-thumbnail.js"], function(){
            lightGallery(document.getElementById('lightgallery'));
        });
    });

    export default {
        props: {
            image: {
                required: true,
            }
        },
        data(){
            return {
                //
            }
        },
    }
</script>