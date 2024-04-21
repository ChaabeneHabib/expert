<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiAccountKey,
  mdiPlus,
  mdiSquareEditOutline,
  mdiTrashCan,
  mdiAlertBoxOutline,
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import BaseButton from "@/Components/BaseButton.vue"
import CardBox from "@/Components/CardBox.vue"
import BaseButtons from "@/Components/BaseButtons.vue"
import NotificationBar from "@/Components/NotificationBar.vue"
import Pagination from "@/Components/Admin/Pagination.vue"
import Sort from "@/Components/Admin/Sort.vue"

const props = defineProps({
  autoEcole: {
    type: Object,
    default: () => ({}),
  },
  filters: {
    type: Object,
    default: () => ({}),
  }
})

const form = useForm({
  search: props.filters.search,
})

const formDelete = useForm({})

function destroy(id) {
  if (confirm("Are you sure you want to delete?")) {
    formDelete.delete(route("studuims.destroy", id))
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <div class="container">
      <br /><br />
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 style="text-align: center; font-weight: bold">
                Liste des auto-écoles
              </h4>
              <div class="content">
                <div class="pb-5">
                  <div class="row g-5">
                    <div class="col">
                      <div class="row mt-4">
                        <div class="col-lg-4 order-lg-last">
                          <input type="text" class="form-control" v-model="searchQuery" placeholder="Rechercher..." />
                        </div>
                        <div class="col-lg-4 text-right">
                          <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" style="
                              color: white;
                              background-color: #1F4069;
                              border-color: #1F4069;
                            " class="btn btn-primary m-1">
                            Ajouter auto-école
                          </button>
                        </div>
                      </div>
                      <br />
  
                      <table class="table table-borded">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">auto école</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">nom d'admin</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(auto, key) in autoEcole" :key="auto.id">
                            <th scope="row">{{ key + 1 }}</th>
                            <td>{{ auto.auto_ecole.nom }}</td>
                            <td>{{ auto.auto_ecole.adresse }}</td>
                            <td>{{ auto.prenom }} {{ auto.name }} </td>
                            <td>{{ auto.numTel }}</td>
                            <td>{{ auto.email }}</td>
                            <td>
                              <a href="" style="
                                  background-color: #9dcd5a;
                                  border-color: #9dcd5a;
                                  margin-right: 5px;
                                " class="btn btn-success">Modifier
                              </a>
                              <a href="" style="
                                  background-color: orangered;
                                  border-color: orangered;
                                  margin-left: 5px;
                                " class="btn btn-danger">Supprimer
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal Ajouter auto ecole -->
    <button type="button"></button>
  
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mx-auto" id="exampleModalLabel" style="font-weight: bold; margin-top: 30px">
              Ajouter auto-école
            </h5>
            <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
              <span class="fas fa-times fs--1"></span>
            </button>
          </div>
          <br />
          <div class="modal-body">
            <form action="" method="post">
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlInput1">Nom d'auto école:</label>
                <input name="nom auto ecole" class="form-control" id="exampleFormControlInput1" type="text"
                  placeholder="Nom d'auto école" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleTextarea">Adresse:</label>
                <input name="adresse" class="form-control" id="exampleTextarea" placeholder="Adresse" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleTextarea">Nom d'admin:</label>
                <input name="nom admin" class="form-control" id="exampleTextarea" placeholder="Nom d'admin" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="telephone">Numéro de téléphone:</label>
                <input name="telephone" type="tel" class="form-control" id="telephone"
                  placeholder="Numéro de téléphone" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="email">E-mail:</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="E-mail" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" type="button" style="background-color: #9dcd5a; border-color: #9dcd5a">
              Ajouter
            </button>
            <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal"
              style="background-color: #fa7f35; border-color: #fa7f35">
              Annuler
            </button>
          </div>
        </div>
      </div>
    </div>
  </LayoutAuthenticated>
</template>
