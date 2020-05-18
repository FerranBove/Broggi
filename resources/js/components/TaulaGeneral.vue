<template>
   <b-container fluid>
    <!-- User Interface controls -->
    <input type="text" v-model="clase">


    <p @click="omplirTaula()">Busca</p>


    <b-row>
      <b-col lg="6" class="my-1">
        <b-form-group
          label="Sort"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          label-for="sortBySelect"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-select v-model="sortBy" id="sortBySelect" :options="sortOptions" class="w-75">
              <template v-slot:first>
                <option value="">-- none --</option>
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
          label="Filter"
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
          class="mb-0">
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
          <b-form-select
            v-model="perPage"
            id="perPageSelect"
            size="sm"
            :options="pageOptions"
          ></b-form-select>
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

    <!-- Main table element -->
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
      <template v-slot:cell(name)="row">
        {{ row.value.first }} {{ row.value.last }}
      </template>

      <template v-slot:cell(actions)="row">
        <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
          Info modal
        </b-button>
        <b-button size="sm" @click="row.toggleDetails">
          {{ row.detailsShowing ? 'Hide' : 'Mostrar' }}  detalls
        </b-button>
        <b-button class="btn btn-danger" size="sm">
           Esborrar
        </b-button>
        <b-button class="btn btn-info" size="sm">
           Editar
        </b-button>
      </template>

      <template v-slot:row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>

    <!-- Info modal -->
    <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
      <pre>{{ infoModal.content }}</pre>
    </b-modal>
  </b-container>
</template>

<script>

    export default {
         data() {
      return {
        //claseInicial: "Tipo_alertant",
        clase: null,
        incidents: null,
        atributs: null,
        items: null/*[
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
        fields: [
          { key: "A", label: "E", sortable: true, class: 'text-center' },
          { key: "A", label: "E", sortable: true, sortDirection: 'desc' },

        ],
        totalRows: 1,
        currentPage: 1,
        perPage: 5,
        pageOptions: [5, 10, 15],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        }
      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      },
      items: function () {
        //this.atributs = Object.getOwnPropertyNames(items[0]);
        //this.atributs = this.items;
      },
      atributs: function() {
        this.fields[0].key = this.atributs[0];
        this.fields[1].key = this.atributs[1];
        this.fields[0].label = this.atributs[0];
        this.fields[1].label = this.atributs[1];
      }
    },
    mounted() {
      // Set the initial number of items
      this.totalRows = this.items.length
    },
    created() {
        //this.getNomTaula();
        //this.omplirTaula();
        //this.propietatsObjectes(clase);
        
    },
    /*computed: {
      // a computed getter
      a: function () {
        // `this` points to the vm instance
        this.clase = this.claseInicial;
        return this.clase;
      },
      b: function() {
        this.atributs = thisatributsInicials;
        return this.atributs;
      }
    },*/
  

    methods: {
      info(item, index, button) {
        this.infoModal.title = `Row index: ${index}`
        this.infoModal.content = JSON.stringify(item, null, 2)
        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      },
      omplirTaula() {
      let me = this;
      console.log(this.clase);

      axios
        .get("/" + me.clase)
        .then(function(response) {
          me.items = response.data;
        }).then(function(){
          me.fields[0].key = Object.getOwnPropertyNames(me.items)[0];
          me.fields[1].key = Object.getOwnPropertyNames(me.items)[1];
          me.fields[0].label = Object.getOwnPropertyNames(me.items)[0];
          me.fields[1].label = Object.getOwnPropertyNames(me.items)[1];
        })
        .catch(function(error) {
          console.log(error);
        });

        
    


    },
    getNomTaula(){
        let me = this;
        var url = window.location.pathname;
        //pongo 33 porque mi ruta es /projecte/broggi-projecte/public/, que son 33 carácteres. Queria coger data de la url para rellenar el atributo "clase" antes de que
        //cargara todo, pero parece ser que "data" carga a la vez que los métodos.  
        me.clase = url.substr(33, 0);

        //this.propietatsObjectes(this.clase);
        //this.omplirTaula();
    },

    cambiarNoms() {
      this.clase

    },
    propietatsObjectes() {

      let me3 = this;
      let obj1 = me3.items[0];
    
    me3.atributs = Object.getOwnPropertyNames(obj1);
    }
    }
    }
</script>
