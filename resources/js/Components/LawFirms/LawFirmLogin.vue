<template>
  <div
    class="tab-pane"
    :class="{ active: active }"
    id="law_firm-login-pane"
    role="tabpanel"
    aria-labelledby="law_firm-login-tab"
    tabindex="0"
  >
    <form @submit.prevent="submit" class="loginForm">
      <validation-errors class="mb-3" />

      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div v-if="this.errors.email" class="error-validation text-end">
              <span>{{this.errors.email}}</span>
            </div>
            <div class="input-group mb-4">
              <div class="form-floating">
                <input
                  id="email"
                  class="form-control border border-primary" style="border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important;"
                  placeholder="Email Address"
                  type="email"
                  v-model="form.email"
                />
                <label class="text-muted" for="floatingInput">{{ __('Email Address') }}</label>
              </div>
              <span class="input-group-text" id="basic-addon2">
                <i class="bi bi-envelope fs-5"></i>
              </span>
            </div>
            <div v-if="this.errors.password" class="error-validation text-end">
              <span>{{this.errors.password}}</span>
            </div>
            <div class="input-group mb-4">
              <div class="form-floating">
                <!-- <label for="password">{{ __('password') }}</label> -->
                <input
                  id="pass_log_log"
                  class="form-control border border-primary" style="border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important;"
                  type="password"
                  v-model="form.password"
                  name="password"
                  placeholder="Password"
                />
                <label class="text-muted" for="floatingInput">{{ __('Password') }}</label>
              </div>
              <span class="input-group-text" toggle="#password-field">
                <Link
                  class="text-decoration-none me-3"
                  :href="route('forgot_password')"
                >{{ __('forgot password') }}?</Link>
                <i class="bi bi-key field_icon toggle-password-log input-icon fs-5"></i>
              </span>
            </div>
            <!-- <div class="mb-3">
                                          <div class="d-flex justify-content-start">
                                            <Link :href="route('forgot_password')" class="">{{ __('forgot password')}}?</Link>
                                          </div>
            </div>-->
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-md-4">
            <button
              class="submit btn btn-primary"
              :class="{ 'text-white-50': form.processing }"
              :disabled="form.processing"
            >
              <div v-show="form.processing" class="spinner-border spinner-border-sm">
                <span class="visually-hidden">{{ __('loading') }}...</span>
              </div>
              {{ __('login') }}
            </button>
          </div>
          <div class="col-md-8 text-end">
            <p class="mb-0">
              {{ __('dont have a account') }}?
              <Link
                :href="route('register',{tab:'law_firm'})"
                class="link ms-2 text-capitalize"
              >{{ __('register') }}</Link>
            </p>
          </div>
        </div>
      </div>
    </form>
    <hr />
    <div class="col-md-12">
      <div class>
        <p>{{ __('social logins') }}</p>
        <a
          :href="route('social_redirect', { provider: 'google', login_as: this.form.login_as })"
          class="customSignIn customGPlusSignIn text-capitalize"
        >
          <span class="icon"></span>
          <span class="buttonText">{{ __('google') }}</span>
        </a>

        <a
          :href="route('social_redirect', { provider: 'facebook', login_as: this.form.login_as })"
          class="customSignIn customFbSignIn text-capitalize"
        >
          <span class="icon"></span>
          <span class="buttonText">{{ __('facebook') }}</span>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import Button from "@/Components/Button.vue";
import Input from "@/Components/Input.vue";
import Checkbox from "@/Components/Checkbox.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Button,
    Input,
    Checkbox,
    Label,
    ValidationErrors,
    Link
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    active: Boolean
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
        login_as: "law_firm"
      }),
      errors: {
        email: null,
        password: null
      }
    };
  },

  methods: {
    submit() {
        this.emptyErrors();
      if (this.form.email && this.form.password) {
        this.form
          .transform(data => ({
            ...data,
            remember: this.form.remember ? "on" : ""
          }))
          .post(this.route("submit.login"), {
            onFinish: () => this.form.reset("password")
          });
      }

      if (!this.form.email) {
        this.errors.email = "Email is required.";
      }
      if (!this.form.password) {
        this.errors.password = "Password is required.";
      }

    },
    emptyErrors(){
        this.errors.email = null;
        this.errors.password = null;
    }
  }
});
</script>
