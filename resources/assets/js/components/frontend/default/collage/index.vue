<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Filters
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>
                                    <input type="file" id="files3" name="files3[]" multiple=""
                                           class="form-control dont-disable">
                                <div id="progress_bar">
                                    <div class="percent">0%</div>
                                </div>
                                </p>
                                <p>
                                    <label><span>Grayscale:</span>
                                        <input type="checkbox" id="grayscale" @click="applyGrayScale" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Invert:</span>
                                        <input type="checkbox" id="invert" @click="applyInvert" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Sepia:</span>
                                        <input type="checkbox" id="sepia" @click="applySepia" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Sepia2:</span>
                                        <input type="checkbox" id="sepia2" @click="applySepia2" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Remove white:</span>
                                        <input type="checkbox" id="remove-white" @click="applyRemoveWhite" disabled>
                                    </label>
                                    <br>
                                    <label>Threshold:
                                        <input type="range" @change="removeWhiteThreshold" id="remove-white-threshold"
                                               value="60" min="0" max="255"
                                               disabled>
                                    </label>
                                    <br>
                                    <label>Distance:
                                        <input type="range" @change="removeWhiteDistance" id="remove-white-distance"
                                               value="10" min="0" max="255"
                                               disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Brightness:</span>
                                        <input type="checkbox" id="brightness" @click="applyBrightness" disabled>
                                    </label>
                                    <br>
                                    <label>Value:
                                        <input type="range" @change="changeBrightnessValue" id="brightness-value"
                                               value="100" min="0" max="255"
                                               disabled>
                                    </label>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p>
                                    <label><span>Noise:</span>
                                        <input type="checkbox" id="noise" @click="applyNoise" disabled>
                                    </label>
                                    <br>
                                    <label>Value:
                                        <input type="range" id="noise-value" @change="applyNoiseValue" value="100"
                                               min="0" max="1000" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>GradientTransparency:</span>
                                        <input type="checkbox" @click="applyGradientTransparency"
                                               id="gradient-transparency" disabled>
                                    </label>
                                    <br>
                                    <label>Value:
                                        <input type="range" @change="changeGradientTransparency"
                                               id="gradient-transparency-value" value="100" min="0"
                                               max="255"
                                               disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Pixelate</span>
                                        <input type="checkbox" @click="applyPixelete" id="pixelate" disabled>
                                    </label>
                                    <br>
                                    <label>Value:
                                        <input type="range" @change="changePixelete" id="pixelate-value" value="4"
                                               min="2" max="20" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Blur:</span>
                                        <input type="checkbox" @click="applyBlur" id="blur" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Sharpen:</span>
                                        <input type="checkbox" @click="applySharpen" id="sharpen" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Emboss:</span>
                                        <input type="checkbox" @click="applyEmboss" id="emboss" disabled>
                                    </label>
                                </p>
                                <p>
                                    <label><span>Tint:</span>
                                        <input type="checkbox" @click="applyTint" id="tint" disabled>
                                    </label>
                                    <br>
                                    <label>Color:
                                        <input type="color" @change="applyTintColor" id="tint-color" value="">
                                    </label>
                                    <br>
                                    <label>Opacity:
                                        <input type="range" @change="changeTintOpacity" id="tint-opacity" min="0"
                                               max="1" value="1" step="0.1">
                                    </label>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>
                                    <input type="button" @click="bringToFront" id="bring-to-front"
                                           class="btn btn-default btn-sm"
                                           value="Bring to Front" disabled>
                                    <input type="button" @click="bringForward" id="bring-forward"
                                           class="btn btn-default btn-sm"
                                           value="Bring Forward" disabled>
                                </p>
                                <p>
                                    <input type="button"
                                           @click="sendToBack"
                                           class="btn btn-default btn-sm"
                                           value="Send To Back" disabled>
                                    <input type="button" @click="sendBackward" class="btn btn-default btn-sm"
                                           value="Send Backward" disabled>

                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p>
                                    <label>
                                        <input type="button" @click="removeObject" class="btn btn-default btn-sm"
                                               value="Delete" disabled>
                                    </label>
                                </p>

                                <p>
                                    <label>
                                        <input type="button" @click="saveAsPNG"
                                               class="btn btn-default btn-sm saveFile dont-disable"
                                               value="Save As PNG">
                                    </label>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <canvas id="c" width="600" height="600"></canvas>
                <br>
                <div class="frames">
                    <img src="/assets/base/images/frame-1.jpg" alt=""
                         data-src="/assets/base/images/frame-1.jpg"
                         class="frame thumbnail img-responsive">
                    <img src="/assets/base/images/frame-2.png" alt=""
                         data-src="/assets/base/images/frame-2.png"
                         class="frame thumbnail img-responsive">
                    <img src="/assets/base/images/frame-3.png" alt=""
                         data-src="/assets/base/images/frame-3.png"
                         class="frame thumbnail img-responsive">
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .frame {
        width: 150px;
        display: inline-block;
        margin: 15px;
        cursor: pointer;
    }

    .canvas-container {
        border: 2px solid #bdbdbd;
        box-shadow: 0 10px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
    }
</style>
<script type="text/babel">
    import fabric from 'fabric';
    export default {
        data(){
            return {
                canvas: null,
                imageFilters: null,
                progress: null
            }
        },
        mounted(){
            this.canvas = new fabric.fabric.Canvas('c');
            this.imageFilters = fabric.fabric.Image.filters;
            this.progress = document.querySelector('.percent');
            this.enableCanvasEvents();
            this.enableFileUploadEvents();
        },
        computed: {
            access_token() {
                return this.$store.getters.access_token;
            }
        },
        methods: {
            enableCanvasEvents(){
                let that = this;
                this.canvas.on({
                    'object:selected': function () {
                        fabric.fabric.util.toArray(document.getElementsByTagName('input'))
                                .forEach(function (el) {
                                    el.disabled = false;
                                });

                        let filters = ['grayscale', 'invert', 'remove-white', 'sepia', 'sepia2',
                            'brightness', 'noise', 'gradient-transparency', 'pixelate',
                            'blur', 'sharpen', 'emboss', 'tint'
                        ];

                        for (let i = 0; i < filters.length; i++) {
                            that.get(filters[i]).checked = !!that.canvas.getActiveObject().filters[i];
                        }
                    },
                    'selection:cleared': function () {
                        fabric.fabric.util.toArray(document.getElementsByTagName('input'))
                                .forEach(function (el) {
                                    if (!el.className.includes('dont-disable')) {
                                        el.disabled = true;
                                    }
                                })
                    }
                });

                fabric.fabric.util.toArray(document.getElementsByClassName('frame'))
                        .forEach(function (el) {
                            el.onclick = that.setFrameAtCanvas;
                        });
            },
            enableFileUploadEvents(){
                let that = this;
                that.get('files3').addEventListener('change', that.handleFileSelect, false);
            },
            get(id){
                return document.getElementById(id);
            },
            setFrameAtCanvas(e){
                let that = this;
                fabric.fabric.Image.fromURL(e.target.getAttribute('data-src'), that.imageLoaderCallback);
            },
            imageLoaderCallback(img){
                let oImg = img.set({
                    left: 10,
                    top: 10,
                    angle: 0
                })
                        .scaleToWidth(this.canvas.width)
                        .scaleToHeight(this.canvas.height);
                this.canvas.add(oImg).renderAll();
                this.canvas.setActiveObject(oImg);

                this.resetFileElement();
            },
            resetFileElement(){
                document.getElementById("files3").value = "";
            },
            handleFileSelect(e){
                let that = this;
                let files = e.target.files; // FileList object

                // Reset progress indicator on new file selection.
                that.progress.style.width = '0%';
                that.progress.textContent = '0%';

                // Loop through the FileList and render image files as thumbnails.
                for (let i = 0, f; f = files[i]; i++) {

                    // Only process image files.
                    if (!f.type.match('image.*')) {
                        continue;
                    }

                    let reader = new FileReader();
                    reader.onerror = that.errorHandler;
                    reader.onprogress = that.updateProgress;
                    reader.onabort = function (e) {
                        alert('File read cancelled');
                    };
                    reader.onloadstart = function (e) {
                        that.get('progress_bar').className = 'loading';
                    };

                    // Closure to capture the file information.
                    reader.onload = (function (theFile) {

                        // Ensure that the progress bar displays 100% at the end.
                        that.progress.style.width = '100%';
                        that.progress.textContent = '100%';
                        setTimeout("document.getElementById('progress_bar').className='';", 2000);

                        return function (e) {
                            // Render thumbnail.
                            let file = e.target.result; // the actually file

                            //get file and load it to canvas...
                            fabric.fabric.Image.fromURL(file, that.imageLoaderCallback);
                        };
                    })(f);

                    // Read in the image file as a data URL.
                    reader.readAsDataURL(f);
                }
            },
            errorHandler(e){
                switch (e.target.error.code) {
                    case e.target.error.NOT_FOUND_ERR:
                        alert('File Not Found!');
                        break;
                    case e.target.error.NOT_READABLE_ERR:
                        alert('File is not readable');
                        break;
                    case e.target.error.ABORT_ERR:
                        break; // noop
                    default:
                        alert('An error occurred reading this file.');
                }
            },
            updateProgress(e){
                if (e.lengthComputable) {
                    let percentLoaded = Math.round((e.loaded / e.total) * 100);
                    // Increase the progress bar length.
                    if (percentLoaded < 100) {
                        this.progress.style.width = percentLoaded + '%';
                        this.progress.textContent = percentLoaded + '%';
                    }
                }
            },
            applyFilter(index, filter){
                let obj = this.canvas.getActiveObject();
                obj.filters[index] = filter;
                obj.applyFilters(this.canvas.renderAll.bind(this.canvas));
            },
            applyFilterValue(index, prop, value){
                let obj = this.canvas.getActiveObject();
                if (obj.filters[index]) {
                    obj.filters[index][prop] = value;
                    obj.applyFilters(this.canvas.renderAll.bind(this.canvas));
                }
            },
            applyGrayScale(e){
                let that = this;
                that.applyFilter(0, e.target.checked && new that.imageFilters.Grayscale());
            },
            applyInvert(e){
                let that = this;
                that.applyFilter(1, e.target.checked && new that.imageFilters.Invert());
            },
            applySepia(e){
                let that = this;
                that.applyFilter(3, e.target.checked && new that.imageFilters.Sepia());
            },
            applySepia2(e){
                let that = this;
                that.applyFilter(4, e.target.checked && new that.imageFilters.Sepia());
            },
            applyRemoveWhite(e){
                let that = this;
                that.applyFilter(2, e.target.checked && new that.imageFilters.RemoveWhite({
                            threshold: that.get('remove-white-threshold').value,
                            distance: that.get('remove-white-distance').value
                        }));
            },
            removeWhiteThreshold(e){
                let that = this;
                that.applyFilterValue(2, 'threshold', e.target.value);
            },
            removeWhiteDistance(e){
                let that = this;
                that.applyFilterValue(2, 'distance', e.target.value);
            },
            applyBrightness(e){
                let that = this;
                that.applyFilter(5, e.target.checked && new that.imageFilters.Brightness({
                            brightness: parseInt(that.get('brightness-value').value, 10)
                        }));
            },
            changeBrightnessValue(e){
                let that = this;
                that.applyFilterValue(5, 'brightness', parseInt(e.target.value, 10));
            },
            applyNoise(e){
                let that = this;

                that.applyFilter(6, e.target.checked && new that.imageFilters.Noise({
                            noise: parseInt(that.get('noise-value').value, 10)
                        }))
            },
            applyNoiseValue(e){
                let that = this;
                that.applyFilterValue(6, 'noise', parseInt(e.target.value, 10));
            },
            applyGradientTransparency(e){
                let that = this;
                that.applyFilter(7, e.target.checked && new that.imageFilters.GradientTransparency({
                            threshold: parseInt(that.get('gradient-transparency-value').value, 10)
                        }))
            },
            changeGradientTransparency(e){
                let that = this;
                that.applyFilterValue(7, 'threshold', parseInt(e.target.value, 10));
            },
            applyPixelete(e){
                let that = this;
                that.applyFilter(8, e.target.checked && new this.imageFilters.Pixelate({
                            blocksize: parseInt(that.get('pixelate-value').value, 10)
                        }))
            },
            changePixelete(e){
                let that = this;
                that.applyFilterValue(8, 'blocksize', parseInt(e.target.value, 10));
            },
            applyBlur(e){
                let that = this;
                that.applyFilter(9, e.target.checked && new that.imageFilters.Convolute({
                            matrix: [1 / 9, 1 / 9, 1 / 9,
                                1 / 9, 1 / 9, 1 / 9,
                                1 / 9, 1 / 9, 1 / 9
                            ]
                        }));
            },
            applySharpen(e){
                let that = this;
                that.applyFilter(10, e.target.checked && new that.imageFilters.Convolute({
                            matrix: [0, -1, 0, -1, 5, -1,
                                0, -1, 0
                            ]
                        }));
            },
            applyEmboss(e){
                let that = this;
                that.applyFilter(11, e.target.checked && new that.imageFilters.Convolute({
                            matrix: [1, 1, 1,
                                1, 0.7, -1, -1, -1, -1
                            ]
                        }));
            },
            applyTint(e){
                let that = this;
                that.applyFilter(12, e.target.checked && new that.imageFilters.Tint({
                            color: that.get('tint-color').value,
                            opacity: parseFloat(that.get('tint-opacity').value)
                        }))
            },
            applyTintColor(e){
                let that = this;
                that.applyFilterValue(12, 'color', e.target.value);
            },
            changeTintOpacity(e){
                let that = this;
                that.applyFilterValue(12, 'opacity', parseFloat(e.target.value));
            },
            bringToFront(e){
                let obj = this.canvas.getActiveObject();
                if (!!obj) {
                    this.canvas.bringToFront(obj);
                }
            },
            bringForward(e){
                let obj = this.canvas.getActiveObject();
                if (!!obj) {
                    this.canvas.bringForward(obj);
                }
            },
            sendToBack(e){
                let obj = this.canvas.getActiveObject();
                if (!!obj) {
                    this.canvas.sendToBack(obj);
                }
            },
            sendBackward(e){
                let obj = this.canvas.getActiveObject();
                if (!!obj) {
                    this.canvas.sendBackwards(obj);
                }
            },
            removeObject(e){
                let obj = this.canvas.getActiveObject();
                if (!!obj) {
                    this.canvas.remove(obj);
                }
            },
            hideBackground(){

            },
            showBackground(){

            },
            saveAsPNG(e){
                let that = this;
                that.canvas.deactivateAll();
                let image = that.canvas.toDataURL('png');

                const config = {
                    headers: {'Authorization': "Bearer " + this.access_token}
                };

                axios.post('/api/user/image', {image}, config)
                        .then(response => {
                            alert('file saved!');
                        })
                        .catch(error => {

                        });
            }
        }
    }
</script>