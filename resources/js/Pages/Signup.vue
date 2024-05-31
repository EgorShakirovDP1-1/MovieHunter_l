<template>
  <AppLayout>
      <div
          id="section"
          class="row justify-content-center text-center mx-auto"
      >
          <div class="col-12 col-sm-8 col-md-6">
              <form @submit.prevent="form.post('register')">
                  <h1>Register</h1>
                  <div class="form-group mt-3">
                      <label for="name" class="text-dark">Name:</label><br />
                      <input
                          v-model="form.name"
                          type="text"
                          name="name"
                          id="name"
                          class="form-control border-primary"
                      />
                      <div v-if="errors.name" class="d-block mt-2">
                          <span class="fs-5 text-danger">
                              {{ errors.name }}
                          </span>
                      </div>
                  </div>
                  <div class="form-group mt-3">
                      <label for="phone_number" class="text-dark"
                          >Phone Number:</label
                      ><br />
                      <input
                          v-model="form.phone_number"
                          type="text"
                          name="phone_number"
                          id="phone_number"
                          class="form-control border-primary"
                      />
                      <div v-if="errors.phone_number" class="d-block mt-2">
                          <span class="fs-5 text-danger">
                              {{ errors.phone_number }}
                          </span>
                      </div>
                  </div>
                  <div class="form-group mt-3">
                      <label for="email" class="text-dark">Email:</label
                      ><br />
                      <input
                          v-model="form.email"
                          type="email"
                          name="email"
                          id="email"
                          class="form-control"
                      />
                      <div v-if="errors.email" class="d-block mt-2">
                          <span class="fs-5 text-danger">
                              {{ errors.email }}
                          </span>
                      </div>
                  </div>
                  <div class="form-group mt-3">
                      <label for="password" class="text-dark">Password:</label
                      ><br />
                      <input
                          v-model="form.password"
                          type="password"
                          name="password"
                          id="password"
                          class="form-control"
                      />
                      <div v-if="errors.password" class="d-block mt-2">
                          <span class="fs-5 text-danger">
                              {{ errors.password }}
                          </span>
                      </div>
                  </div>
                  <div class="form-group mt-3">
                      <label for="confirm-password" class="text-dark"
                          >Confirm Password:</label
                      ><br />
                      <input
                          v-model="form.password_confirmation"
                          type="password"
                          name="password_confirmation"
                          class="form-control"
                      />
                      <div
                          v-if="errors.password_confirmation"
                          class="d-block mt-2"
                      >
                          <span class="fs-5 text-danger">
                              {{ errors.password_confirmation }}
                          </span>
                      </div>
                  </div>
                  <div
                      class="d-flex justify-content-end align-items-center my-3">

                      <div class="form-group ms-3">
                          <button
                              type="submit"
                              :disabled="form.processing"
                              class="btn btn-warning text-primary py-2 px-3"
                          >
                              Register!
                          </button>
                      </div>
                  </div>
                  
                 

              </form>
              <div class="text-right">
                          <a :href="route('login')" class="text-dark lead"
                              >Login here</a
                          >
                      </div>
              <Link :href="route('logout')" class="btn btn-primary d-block py-2">>Logout</Link>
          </div>
          <button @click="destroy(user.id)" type="submit" class="btn btn-danger d-block py-2 width-216"
                            aria-label="Delete Account Button">
                            <i class="bi bi-trash-fill me-2"></i> Delete Account
                        </button>
      </div>
  </AppLayout>
</template>

<script>
    import AppLayout from "../Layout/App.vue";
    import { Link, useForm } from "@inertiajs/vue3";
    import { Inertia } from '@inertiajs/inertia'
    export default {
    components: {
        AppLayout,
        Link,
    },
    props: {
        errors: Object,
        user: {
            type: Object,
            required: true,
            
        }
    },
  setup() {
      const form = useForm({
          name: "",
          phone_number: "",
          email: "",
          password: "",
          password_confirmation: "",
      });

      const destroy = (id) => {
          if (confirm("Are you sure?")) {
              Inertia.delete(route("delete", id));
          }
      };

      return { form, destroy };
  },
  methods: {
    logout() {
      Inertia.post("/logout")
        .then(() => {
          Inertia.visit('/login');
        });
    },
  },
};
</script>

<style scoped>
  #section {
      margin-top: 140px;
      margin-bottom: 180px;
  }
</style>
