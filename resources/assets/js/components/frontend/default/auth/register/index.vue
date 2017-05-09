<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" @submit.prevent="validateBeforeSubmit">

                            <div class="form-group" :class="{'has-error': errors.has('name') }">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control"
                                           name="name"
                                           v-model="user.name"
                                           v-validate="'required'"
                                           data-vv-delay="1000"
                                           required autofocus>


                                    <span class="help-block" v-show="errors.has('name')">
                                        <strong>{{ errors.first('name') }}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error': errors.has('email') }">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control"
                                           v-model="user.email"
                                           v-validate="'required|email'"
                                           data-vv-delay="1000"
                                           name="email" required>


                                    <span class="help-block" v-show="errors.has('email')">
                                        <strong>{{ errors.first('email') }}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group" :class="{'has-error': errors.has('password') }">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password"
                                           type="password"
                                           class="form-control"
                                           name="password"
                                           v-model="user.password"
                                           v-validate="'required|min:6'"
                                           data-vv-delay="1000"
                                           required>


                                    <span class="help-block" v-show="errors.has('password')">
                                        <strong>{{ errors.first('password') }}</strong>
                                    </span>

                                </div>
                            </div>

                            <div class="form-group"
                                 :class="{'has-error': errors.has('password_confirmation') }">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm"
                                           type="password"
                                           class="form-control"
                                           name="password_confirmation"
                                           v-model="user.password_confirmation"
                                           v-validate="'confirmed:password'"
                                           data-vv-as="Confirm Password"
                                           data-vv-delay="1000"
                                           required>

                                    <span class="help-block" v-show="errors.has('password_confirmation')">
                                        <strong>{{ errors.first('password_confirmation') }}</strong>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script type="text/babel">
    import Vue from 'vue';
    import VeeValidate from 'vee-validate';
    Vue.use(VeeValidate);

    export default {
        data(){
            return {
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },
        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll()
                        .then(() => {
                            // eslint-disable-next-line
                            this.submit();
                        })
                        .catch(() => {
                            // eslint-disable-next-line
                            console.log('Correct them errors!');
                        });
            },

            submit(){
                const { user } = this;

                axios.post('/api/auth/register', user)
                        .then(response => {

                            if (response.status === 201) {
                                window.location.href = "/";
                            }

                        })
                        .catch(error => {

                            if (error.response.status === 422) {
                                _.forOwn(error.response.data, (value, key) => {
                                    this.errors.add(key, _.head(value));
                                });
                            }
                        })

            }
        }
    }
</script>