 <template>
    <AppLayout>
        
    <div>
        <h1>{{ user.name }}</h1>
        <p>Email: {{ user.email }}</p>
        <p>Location: {{ user.location }}</p>
        <p>Joined: {{ user.joined }}</p>
    </div>
    <Link :href="route('logout')" class="btn btn-primary d-block py-2">>Logout</Link>
          
          <button @click="destroy(user.id)" type="submit" class="btn btn-danger d-block py-2 width-216"
                            aria-label="Delete Account Button">
                            <i class="bi bi-trash-fill me-2"></i> Delete Account
                        </button>
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
/* Add your custom styles here */
</style> 
