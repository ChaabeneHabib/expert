<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3'
import { mdiAccount, mdiAsterisk } from '@mdi/js'
import LayoutGuest from '@/Layouts/LayoutGuest.vue'
import SectionFullScreen from '@/Components/SectionFullScreen.vue'
import CardBox from '@/Components/CardBox.vue'
import FormCheckRadioGroup from '@/Components/FormCheckRadioGroup.vue'
import FormField from '@/Components/FormField.vue'
import FormControl from '@/Components/FormControl.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import BaseButton from '@/Components/BaseButton.vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import FormValidationErrors from '@/Components/FormValidationErrors.vue'
import NotificationBarInCard from '@/Components/NotificationBarInCard.vue'
import BaseLevel from '@/Components/BaseLevel.vue'

const props = defineProps({
  canResetPassword: Boolean,
  status: {
    type: String,
    default: null
  }
})

const form = useForm({
  email: '',
  password: '',
  remember: []
})

const submit = () => {
  form
    .transform(data => ({
      ... data,
      remember: form.remember && form.remember.length ? 'on' : ''
    }))
    .post(route('login'), {
      onFinish: () => form.reset('password'),
    })
}
</script>

<template>
  <!--  <LayoutGuest>
    <Head title="Login" />

    <SectionFullScreen
      v-slot="{ cardClass }"
      bg="purplePink"
    >
      <CardBox
        :class="cardClass"
        form
        @submit.prevent="submit"
      >
        <FormValidationErrors />

        <NotificationBarInCard 
          v-if="status"
          color="info"
        >
          {{ status }}
        </NotificationBarInCard>

        <FormField
          label="Email"
          label-for="email"
          help="Please enter your email"
        >
          <FormControl
            v-model="form.email"
            :icon="mdiAccount"
            id="email"
            autocomplete="email"
            type="email"
            required
          />
        </FormField>

        <FormField
          label="Password"
          label-for="password"
          help="Please enter your password"
        >
          <FormControl
            v-model="form.password"
            :icon="mdiAsterisk"
            type="password"
            id="password"
            autocomplete="current-password"
            required
          />
        </FormField>

        <FormCheckRadioGroup
          v-model="form.remember"
          name="remember"
          :options="{ remember: 'Remember' }"
        />

        <BaseDivider />

        <BaseLevel>
          <BaseButtons>
            <BaseButton
              type="submit"
              color="info"
              label="Login"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            />
            <BaseButton
              v-if="canResetPassword"
              :route-name="route('password.request')"
              color="info"
              outline
              label="Remind"
            />
          </BaseButtons>
          <Link
            :href="route('register')"
          >
            Register
          </Link>
        </BaseLevel>
      </CardBox>
    </SectionFullScreen>
  </LayoutGuest> -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div style="background-color:white"
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div style="border: 0.01px solid wheat; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);" class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../../../../public/assets/images/logos/permit.png" width="150" alt="">
                </a>
                <h5 style="text-align: center; font-weight: bold;">Connection</h5>
                <h6 style="text-align: center;">Bienvenue sur PermitExpert</h6>
                <br><br>
                <!-- Affichage du message de succès ou d'erreur -->
                <div v-if="message" class="alert" :class="{'alert-success': isSuccess, 'alert-danger': !isSuccess}">
                  {{ message }}
                </div>
                <form  form @submit.prevent="submit">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input
                     type="email"
                      class="form-control"
                       id="exampleInputEmail1"
                      aria-describedby="emailHelp" 
                      placeholder="Email"
                      v-model="form.email"
                      :icon="mdiAccount"
                      autocomplete="email"
                     
                      required>
                  </div>

                  <div class="mb-4"> 
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input v-model="form.password" :icon="mdiAsterisk" type="password" id="password"
                      autocomplete="current-password" required class="form-control" placeholder="Mot de passe">
                  </div>

                  <div class="text-center">
                    <button 
                    type="submit"
                     style="background-color: #FA7F35; border-color: #FA7F35; margin-left: 5px;"
                      class="btn btn-danger"
                      color="info"
                      label="Login"
                      :class="{ 'opacity-25': form.processing }"
                      :disabled="form.processing"
                      >Se connecter</button>
                  </div>
                  <br>
                  <div class="d-flex align-items-center justify-content-center">
                    <h1 class="fs-4 mb-0 fw-bold">Vous n'avez pas de compte?</h1>
                    <Link :href="route('register')">
                    Register
                    </Link>
                    <!-- <a style="color: #FA7F35; " href="/register">S'inscrire</a> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
