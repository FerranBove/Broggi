<template>
  <main>
    <div class="container-fluid">
      <div class="card mt-3 pb-3 border-secondary" style="background-color: #FFC4C2;">
        <div class="card-header bg-secondary text-white">Recursos</div>
        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <button class="btn btn-primary" style="background-color: #8C031C;">Afegir recurs</button>
              <!-- @click="abrirModal('insert')" -->
            </div>
          </div>
          <div class="card-deck" style="background-color: #FFC4C2;">
            <div class="col-md-3 mt-3" v-for="recurs in recursos" :key="recurs.id">
              <div class="card border-primary">
                <div class="card-body">
                  <h5 class="text-bold" v-text="recurs.codi"></h5>

                  <div class="btn-group float-right" role="group" aria-label="Basic example">
                    <button class="btn btn-sm btn-outline-secondary">Editar</button>
                    <!-- @click="abrirModal('update',rol)" -->
                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    <!-- @click="abrirModal('delate',rol)" -->
                    <button class="btn btn-sm btn-outline-info">Usuaris</button>
                    <!--v-on:click="mostrarUsuaris(rol.id)" -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      recursos: null,
      recurs: {
        id: null,
        codi: "",
        tipus_recurs_id: null,
        id_usuari: null
      }
    };
  },
  created() {
    this.mostrarRecursos();
  },
  methods: {
    mostrarRecursos() {
      axios
        .get("/recursos")
        .then(function(response) {
          this.recursos = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
