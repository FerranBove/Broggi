<template>
  <b-container fluid>
    <!-- Filtres -->
    <b-row>
      <b-col lg="6" class="my-1">
        <b-form-group
          label="Ordenar"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="sortBySelect"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
              <template v-slot:first>
                <option value>-- none --</option>
              </template>
            </b-form-select>
            <b-form-select v-model="sortDesc" size="sm" :disabled="!sortBy" class="w-25">
              <option :value="false">Asc</option>
              <option :value="true">Desc</option>
            </b-form-select>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Initial sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="initialSortSelect"
          class="mb-0"
        >
          <b-form-select
            v-model="sortDirection"
            id="initialSortSelect"
            size="sm"
            :options="['asc', 'desc', 'last']"
          ></b-form-select>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filtrar"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="filterInput"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              id="filterInput"
              placeholder="Type to Search"
            ></b-form-input>
            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter On"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          description="Leave all unchecked to filter on all data"
          class="mb-0"
        >
          <b-form-checkbox-group v-model="filterOn" class="mt-1">
            <b-form-checkbox value="id">ID</b-form-checkbox>
            <b-form-checkbox value="num_incidencia">Num.</b-form-checkbox>
            <b-form-checkbox value="data">Data</b-form-checkbox>
            <b-form-checkbox value="adreca">Adreça</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>

      <b-col sm="5" md="6" class="my-1">
        <b-form-group
          label="Per page"
          label-cols-sm="6"
          label-cols-md="4"
          label-cols-lg="3"
          label-align-sm="right"
          label-size="sm"
          label-for="perPageSelect"
          class="mb-0"
        >
          <b-form-select v-model="perPage" id="perPageSelect" size="sm" :options="pageOptions"></b-form-select>
        </b-form-group>
      </b-col>

      <b-col sm="7" md="6" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          align="fill"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <!-- Elements de la taula -->
    <b-table
      show-empty
      small
      stacked="md"
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filterIncludedFields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      @filtered="onFiltered"
    >
      <template v-slot:cell(name)="row">{{ row.value.first }} {{ row.value.last }}</template>

      <template v-slot:cell(actions)="row">
        <b-button v-b-modal.modal-prevent-closing @click="passarObjecte(row.item)">Editar</b-button>
      </template>

      <template v-slot:row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

    <template v-slot:cell(actions)="row">
      <div>
        <div class="mt-3">
          Submitted Names:
        </div>

        <b-modal
          id="modal-prevent-closing"
          ref="modal"
          title="Dades"
        >
          <form ref="form">
            <b-form-group
              label="Name"
              label-for="name-input"
            >
              <b-form-input
                id="name-input"
                v-model="row.item.num_incidencia"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              label="Telefon"
              label-for="telefon-input"
            >
              <b-form-input
                id="telefon-input"
                v-model="row.item.telefon"
              ></b-form-input>
            </b-form-group>
          </form>
        </b-modal>
      </div>
    </template>

   <template>
      <div>
        <b-button v-b-modal.modal-prevent-closing>Open Modal</b-button>

        <b-modal
          id="modal-prevent-closing"
          ref="modal"
          title="Dades"
        >
          <form ref="form">
            <b-form-group
              :state="nameState"
              label="Hora mobilització"
              label-for="descripcio-input"
            >
              <b-form-input id="descripcio-input" v-model="fake1" :state="nameState" required></b-form-input>
            </b-form-group>


            <b-form-group
              :state="nameState"
              label="Hora assistència"
              label-for="name-input"
              invalid-feedback="Name is required"
            >
              <b-form-input id="name-input" v-model="fake2" :state="nameState" required></b-form-input>
            </b-form-group>

            <b-form-group
              :state="nameState"
              label="Hora transport"
              label-for="numero-input"
            >
              <b-form-input id="numero-input" v-model="fake3"></b-form-input>
            </b-form-group>

             <b-form-group
              :state="nameState"
              label="Hora arribada a l'hospital"
              label-for="numero-input"
            >
              <b-form-input id="numero-input" v-model="fake4"></b-form-input>
            </b-form-group>

            <b-form-group
              :state="nameState"
              label="Hora transferència"
              label-for="numero-input"
            >
              <b-form-input id="numero-input" v-model="fake5"></b-form-input>
            </b-form-group>

            <b-form-group
              :state="nameState"
              label="Hora finalització"
              label-for="numero-input"
            >
              <b-form-input id="numero-input" v-model="fake6"></b-form-input>
            </b-form-group>
          </form>
        </b-modal>
      </div>
    </template>
  </b-container>
</template>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      telefon: null,
      name: "",
      prova: {

      },

      fake1: null,
      fake2: null,
      fake3: null,
      fake4: null,
      fake5: null,
      fake6: null,
      fake7: null,
      nameState: null,
      submittedNames: [],
      incidents: null,
      items: null /*[
          { isActive: true, age: 40, name: { first: 'Dickerson', last: 'Macdonald' } },
          { isActive: false, age: 21, name: { first: 'Larsen', last: 'Shaw' } },
          {
            isActive: false,
            age: 9,
            name: { first: 'Mini', last: 'Navarro' },
            _rowVariant: 'success'
          },
          { isActive: false, age: 89, name: { first: 'Geneva', last: 'Wilson' } },
          { isActive: true, age: 38, name: { first: 'Jami', last: 'Carney' } },
          { isActive: false, age: 27, name: { first: 'Essie', last: 'Dunlap' } },
          { isActive: true, age: 40, name: { first: 'Thor', last: 'Macdonald' } },
          {
            isActive: true,
            age: 87,
            name: { first: 'Larsen', last: 'Shaw' },
            _cellVariants: { age: 'danger', isActive: 'warning' }
          },
          { isActive: false, age: 26, name: { first: 'Mitzi', last: 'Navarro' } },
          { isActive: false, age: 22, name: { first: 'Genevieve', last: 'Wilson' } },
          { isActive: true, age: 38, name: { first: 'John', last: 'Carney' } },
          { isActive: false, age: 29, name: { first: 'Dick', last: 'Dunlap' } }
        ]*/,
        incidencia: {
          id: null,
          adreca: null,
          num_incidencia: null
        },
      fields: [
        { key: "id", label: "ID", sortable: true, class: "text-center" },
        {
          key: "num_incidencia",
          label: "Numero incidencia",
          sortable: true,
          sortDirection: "desc",
          class: "text-center" 
        },
        {
          key: "adreca",
          label: "Adreça",
          sortable: true,
          class: "text-center"
        },
        { key: "data", label: "Data", sortable: true, class: "text-center" },
        {
          key: "descripcio",
          label: "Descripcio",
          sortable: false,
          class: "text-center"
        },
        { key: "actions", label: "Accions", class: "text-center"  }
      ],
      totalRows: 1,
      currentPage: 1,
      perPage: 5,
      pageOptions: [5, 10, 15],
      sortBy: "",
      sortDesc: false,
      sortDirection: "asc",
      filter: null,
      filterOn: [],
      isRendere: false,
      modal: 0,
      infoModal: {
        id: "info-modal",
        title: "",
        content: "AA"
      }
    };
  },
  computed: {
    sortOptions() {
      // Create an options list from our fields
      return this.fields
        .filter(f => f.sortable)
        .map(f => {
          return { text: f.label, value: f.key };
        });
    }
  },
  mounted() {
    // Set the initial number of items
    this.totalRows = this.items.length;
  },
  created() {
    this.omplirIncidents();
  },
  methods: {
    info(item, index, button) {
      this.infoModal.title = `Row index: ${item.num_incidencia}`;
      this.infoModal.content = JSON.stringify(item, null, 2);
      this.$root.$emit("bv::show::modal", this.infoModal.id, button);
    },
    infoIncidencia(item, index, button) {
      this.infoModal.title = `Row index: ${index}`;
      this.infoModal.content = JSON.stringify(item, null, 2);
      this.$root.$emit("bv::show::modal", this.infoModal.id, button);
    },
    resetInfoModal() {
      this.infoModal.title = "";
      this.infoModal.content = "";
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    abrirModal() {
      this.modal = 1;
    },
    omplirIncidents() {
      let me = this;

      axios
        .get("/incidencies")
        .then(function(response) {
          me.items = response.data;
        })
        .then((me.isRendere = true))
        .catch(function(error) {
          console.log(error);
        });
    },

    updateIncidencia() {
      let me = this;
      axios
        .put("/incidencies/" + this.item.id, this.item)
        .then(function(response) {
  
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    propietatsObjectes(i) {
      let index;
      let me3;

      return me.incidents[1][i];
    },
    passarObjecte(objecte){
      /*this.incidencia.id = objecte.id
      this.incidencia.adreca = objecte.adreca
      this.incidencia.num_incidencia = objecte.num_incidencia*/
      this.prova = objecte;
    }


  }
};
</script>


<style>
.modal-title {
  font-variant: small-caps;
}
.modal-content {
  width: 100% !important;
  position: absolute !important;
  top: 200px !important;
}
.mostrar {
  display: list-item !important;
  opacity: 1 !important;
  position: absolute !important;
  background-color: #3c29297a !important;
}
body.modal {
  overflow-y: hidden;
}

.modal-body{
  background-color: #EBDAB6;
}

.modal-header {
  background-color: #79A6EA;
}

.modal-footer {
  background-color: #EBDAB6;
}

.text-center {
  background-color: #EBDAB6;
  font-family: "Montserrat-Black";
}

.container-fluid {
  margin-top: 5rem;
}

</style>
