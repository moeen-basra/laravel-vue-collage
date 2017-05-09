<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" @submit.prevent="validateBeforeSubmit">
                            <div :class="{'form-group': true, 'has-error': errors.has('email') }">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control"
                                           name="email"
                                           v-model="user.email"
                                           v-validate="'required|email'"
                                           data-vv-delay="1000"
                                           required autofocus>
                                    <span class="help-block" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                                </div>
                            </div>

                            <div :class="{'form-group': true, 'has-error': errors.has('password') }">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password"
                                           type="password"
                                           class="form-control"
                                           name="password"
                                           v-model="user.password"
                                           v-validate="'required|min:3'"
                                           data-vv-delay="1000"
                                           required>
                                    <span class="help-block" v-show="errors.has('password')">{{ errors.first('password') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" v-model="user.remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
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
    export default {
        data(){
            return {
                user: {
                    email: '',
                    password: '',
                    remember: false
                }
            }
        },
        methods: {
            validateBeforeSubmit() {
                this.$validator.validateAll().then(() => {
                    // eslint-disable-next-line
                    this.submit();
                }).catch(() => {
                    // eslint-disable-next-line
                    console.log('Correct them errors!');
                });
            },

            submit() {
                const { user } = this;

                axios.post('/api/auth/login', user)
                        .then(response => {
                            const { status, data } = response;
                            if (status === 201) {
                                this.processData(data);
                                window.location.href = '/'
                            }
                        })
                        .catch((error) => {
                            const { status, data } = error.response;
                            if (status === 401 || status === 429) {
                                _.forOwn(data, (value, key) => {
                                    this.errors.add(key, value);
                                });
                            } else if (status === 422) {
                                _.forOwn(data, (value, key) => {
                                    this.errors.add(key, _.head(value));
                                });
                            }
                        })
            },

            processData({ access_token }) {
                this.updateLocalStorateToken(access_token);
            },

            updateLocalStorateToken(token) {
                localStorage.clear();
                localStorage.setItem('token', token)
            }
        }
    }
</script>