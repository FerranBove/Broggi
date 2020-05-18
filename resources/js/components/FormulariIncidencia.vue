<template>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!--action="{{ route('/omplirincidencies') }}"-->
          <form action method="post" enctype="multipart/form-data">
            <div class="accordion" id="accordionExample" style="background-color: #C8DFFF;">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button
                      class="btn btn-link"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >DADES BÀSIQUES</button>
                  </h2>
                </div>
                

                <div
                  id="collapseOne"
                  class="collapse show"
                  aria-labelledby="headingOne"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <div class="form-group">
                      <p>Província</p>
                      <div class="col-md-4">
                        <select v-model="provincia">
                          <option disabled selected value></option>
                          <option
                            v-for="provincia in provincies"
                            :key="provincia.id"
                            :value="provincia"
                          >{{ provincia.nom }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <p>Comarca</p>
                      <div class="col-md-4">
                        <select v-model="comarca">
                          <option disabled selected value></option>
                          <option
                            v-for="comarca in provincia.comarques"
                            :key="comarca.id"
                            :value="comarca"
                          >{{ comarca.nom }}</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <p>Municipi</p>
                      <div class="col-md-4">
                        <select v-model="incident.municipis_id">
                          <option
                            v-for="municipi in comarca.municipis"
                            :key="municipi.id"
                            :value="municipi.id"
                          >{{ municipi.nom }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="txtDireccio">Adreça</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtDireccio"
                          v-model="incident.adreca"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtDireccio">Complement adreça</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtDireccio"
                          v-model="incident.complement_adreca"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtTelefon">Telèfon</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtTelefon"
                          v-model="incident.telefon_alertant"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button
                        class="btn btn-link collapsed"
                        type="button"
                        data-toggle="collapse"
                        data-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >DADES ALERTANT</button>
                    </h2>
                  </div>
                  <div
                    id="collapseTwo"
                    class="collapse"
                    aria-labelledby="headingTwo"
                    data-parent="#accordionExample"
                  >
                    <div class="card-body">
                      <div class="form-group">
                        <label for="txtTipusAlertant">Tipus alertant</label>
                        <div class="col-md-4">
                          <select v-model="incident.tipus_alertant_id" id="dropTipusAlertant">
                            <option
                              v-for="tipusAlertant in tipusAlertants"
                              :key="tipusAlertant.id"
                              :value="tipusAlertant.id"
                            >{{ tipusAlertant.tipus }}</option>
                          </select>
                        </div>
                      </div>

                      <section v-show="incident.tipus_alertant_id == 4">
                        <div class="form-group">
                          <label for="txtTipusAlertant">Nom alertant VIP</label>
                          <div class="col-md-4">
                            <select v-model="incident.alertants_id">
                              <option disabled selected value></option>
                              <option
                                v-for="alertantVip in alertantsVip"
                                :key="alertantVip.nom"
                                :value="alertantVip.id"
                              >{{ alertantVip.nom }}</option>
                            </select>
                          </div>
                        </div>
                      </section>

                      <section v-show="incident.tipus_alertant_id == 1">
                        <div class="form-group">
                          <label for="txtTipusAlertant">Hospital</label>
                          <div class="col-md-4">
                            <select v-model="incident.alertants_id">
                              <option disabled selected value></option>
                              <option
                                v-for="alertantVip in alertantsVip"
                                :key="alertantVip.nom"
                                :value="alertantVip.id"
                              >{{ alertantVip.nom }}</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label
                            for="txtNomMetge"
                            v-show="incident.tipus_alertant_id == 1"
                          >Nom del metge</label>
                          <div class="col-md-4">
                            <input
                              type="text"
                              class="form-control"
                              id="txtNomMetge"
                              v-show="incident.tipus_alertant_id == 1"
                            />
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="txtDireccioHospital">Adreça Hospital:</label>
                          <div class="col-md-6">
                            <input
                              type="text"
                              class="form-control"
                              id="txtDireccioHospital"
                              v-model="alertantProva.adreca"
                            />
                          </div>
                        </div>
                      </section>

                      <section
                        v-show="incident.tipus_alertant_id == 2 || incident.tipus_alertant_id == 3 || incident.tipus_alertant_id == 5"
                      >
                        <div class="form-group">
                          <label for="txtNomAlertant">Nom alertant</label>
                          <div class="col-md-4">
                            <input
                              type="text"
                              class="form-control"
                              id="txtNomAlertant"
                              v-model="alertantProva.nom"
                            />
                          </div>
                        </div>
                      </section>

                      <!-- <div class="form-group">
                        <label for="txtDireccioHospital">Adreça Hospital:</label>
                        <div class="col-md-6">
                          <input
                            type="text"
                            class="form-control"
                            id="txtDireccioHospital"
                            v-model="municipiProva.nom"
                          />
                        </div>
                      </div>-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button
                      class="btn btn-link collapsed"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="false"
                      aria-controls="collapseThree"
                    >DADES AFECTAT</button>
                  </h2>
                </div>
                <div
                  id="collapseThree"
                  class="collapse"
                  aria-labelledby="headingThree"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <div class="form-group">
                      <label for="txtCIP">CIP:</label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" id="txtCIP" v-model="afectat.cip" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtTelefonAfectat">Telèfon afectat:</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtTelefonAfectat"
                          v-model="afectat.telefon"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtEdat">Edat afectat:</label>
                      <div class="col-md-4">
                        <input type="text" class="form-control" id="txtEdat" v-model="afectat.edat" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="txtTelefonAfectat">Sexe afectat:</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtTelefonAfectat"
                          v-model="afectat.sexe"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtNomAfectat">Nom afectat:</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtNomAfectat"
                          v-model="afectat.nom"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtCognomAfectat">Cognom afectat:</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtCognomAfectat"
                          v-model="afectat.cognom"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button
                      class="btn btn-link collapsed"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseFour"
                      aria-expanded="false"
                      aria-controls="collapseFour"
                    >DADES INCIDÈNCIA</button>
                  </h2>
                </div>
                <div
                  id="collapseFour"
                  class="collapse"
                  aria-labelledby="headingFour"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <button
                      type="button"
                      @click="currentTime = formatData(new Date)"
                      class="btn btn-primary"
                    >Data actual</button>

                    <button type="button" @click="horaActual()" class="btn btn-primary">Hora actual</button>

                    <div class="form-group">
                      <label for="txtDireccio">Número incidència:</label>
                      <div class="col-md-4">
                        <input
                          type="text"
                          class="form-control"
                          id="txtDireccio"
                          v-model="incident.num_incidencia"
                        />
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="txtTipusIncident">Tipus d'incidència:</label>
                      <div class="col-md-4">
                        <select v-model="incident.tipus_incident_id">
                          <option
                            v-for="tipoIncidencia in tipusIncidencies"
                            :key="tipoIncidencia.nom"
                            :value="tipoIncidencia.id"
                          >{{ tipoIncidencia.tipus }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="txtDetalls">Detalls</label>
                      <div class="col-md-4">
                        <textarea
                          type="text"
                          class="form-control"
                          id="txtDetalls"
                          v-model="incident.descripcio"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button
                      class="btn btn-link collapsed"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseFive"
                      aria-expanded="false"
                      aria-controls="collapseFive"
                    >ASSIGNACIÓ DE RECURSOS</button>
                  </h2>
                </div>
                <div
                  id="collapseFive"
                  class="collapse"
                  aria-labelledby="headingFive"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group">
                        <select v-model="tipusRecurs">
                          <option
                            v-for="tipusRecurs in tipusRecursos"
                            :key="tipusRecurs.tipus_alertant_id"
                          >{{ tipusRecurs.tipus }}</option>
                        </select>
                        <div class="form-group">
                          <select v-model="incident.incidencies_has_recurs[0].recursos_id">
                            <option
                              v-for="recurs in recursos"
                              :key="recurs"
                              :value="recurs.id"
                            >{{ recurs.codi }}</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <p>Prioritat:</p>
                          <select v-model="incident.incidencies_has_recurs[numR].prioritat">
                            <option v-for="n in 4" :key="n" :value="n">{{ n }}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <button type="button" class="btn btn-primary" @click="guardarIncidencia()">Guardar</button>
        </div>
      </div>
    </div>

    <div class="modal fade" :class="{ mostrar: modal }" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ERROR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>No s'ha pogut donar d'alta la incidència, comprova que estiguin tots els camps obligatoris omplerts.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="tancarModal()" data-dismiss="modal">D'acord</button>
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
      necessitaRecursC: 0,
      tipusAlertants: null,
      tipusIncidencies: {},
      modal: 0,
      errors: [],
      error: "",
      numR: 0,
      prova22: [
        {
          hola: "hola"
        }
      ],
      esVip: false,
      currentTime: null,
      numRecursos: 0,
      tipusRecursos: null,
      tipusRecurs: {
        id: null,
        nom: ""
      },
      alertants: null,
      alertantProva: {},
      municipiProva: {},
      alertantsVip: null,
      comarques: null,
      municipis: null,
      hora: null,
      tipusAlertant: null,
      recursos: [
        {
          id: null,
          codi: null,
          tipus_recurs_id: null,
          id_usuario: null
        }
      ],
      comarca: {
        id: 1,
        nom: "",
        municipis: {
          id: null,
          nom: null
        }
      },
      provincia: {
        id: null,
        nom: null,
        comarques: {
          id: null,
          nom: null,
          municipis: {
            id: null,
            nom: null
          }
        }
      },
      provincies: null,
      municipi: {
        id: null,
        nom: null
      },

      incident: {
        id_incidencia: null,
        num_incidencia: null,
        telefon_alertant: null,
        data: null,
        hora: null,
        adreca: null,
        complement_adreca: null,
        descripcio: null,
        municipis_id: null,
        tipus_incident_id: null,
        estats_incidencia_id: null,
        tipus_alertant_id: null,
        alertants_id: null,
        incidencies_has_recurs: [
          {
            recursos_id: null,
            prioritat: null,
            hora_activacio: null,
            hora_mobilitzacio: null,
            hora_assistencia: null,
            hora_transport: null,
            hora_arribada_hospital: null,
            hora_transferencia: null,
            hora_finalitzacio: null
          }
        ]
      },
      afectat: {
        nom: null,
        cognom: null,
        telefon: null,
        cip: null,
        edat: null,
        sexe: null
      },
      alertant: {
        id: null,
        nom: "",
        cognoms: "",
        adreca: "",
        municipis_id: 1,
        tipus_alertant_id: 1
      }
    };
  },

  created() {
    this.omplirTipoAlertants();
    this.omplirRecursos();
    this.omplirAlertants();
    this.omplirAlertantsVip();
    this.omplirProvincies();
    this.omplirProvincia();
    this.omplirTipusIncidencies();
    this.omplirMunicipis();
    this.omplirComarca();
    this.omplirRecursos2();
  },

  methods: {
    omplirTipoAlertants() {
      let me = this;

      axios
        .get("/tipo_alertant")
        .then(function(response) {
          me.tipusAlertants = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    omplirRecursos() {
      let me2 = this;

      axios
        .get("/tipo_recurs")
        .then(function(response) {
          me2.tipusRecursos = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    omplirRecursos2() {
      let me2 = this;

      axios
        .get("/recursos/" + 1)
        .then(function(response) {
          me2.recursos = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirDadesAlertant() {
      let me = this;
      axios
        .get("/alertant/" + me.incident.alertants_id)
        .then(function(response) {
          me.alertantProva = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirTipusIncidencies() {
      let me2 = this;
      axios
        .get("/tipo_incident")
        .then(function(response) {
          me2.tipusIncidencies = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirProvincia() {
      let me2 = this;
      axios
        .get("/provincies/1")
        .then(function(response) {
          me2.provincia = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirComarca() {
      let me2 = this;
      axios
        .get("/comarques/1")
        .then(function(response) {
          me2.comarca = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    omplirMunicipis() {
      let me2 = this;
      axios
        .get("/municipis")
        .then(function(response) {
          me2.municipis = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    tancarModal(){
      this.modal = 0;
    },

    omplirAlertants() {
      let me2 = this;
      axios
        .get("/tipo_alertant/1")
        .then(function(response) {
          me2.tipusAlertant = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    omplirMunicipiProva() {
      let me = this;
      axios
        .get("/municipi/" + me.alertantProva.municipis)
        .then(function(response) {
          me.municipiProva = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirProvincies() {
      let me2 = this;
      axios
        .get("/provincies")
        .then(function(response) {
          me2.provincies = response.data;
        })
        .catch(function(error) {
          console.log(error);
        });
    },

    omplirAlertantsVip() {
      let me = this;
      axios
        .get("/alertant", {
          params: {
            tipus_alertant_id: 4
          }
        })
        .then(function(response) {
          me.alertantsVip = response.data;
        })
        .catch(e => {
          console.log(e);
        });
    },

    guardarIncidencia() {
      let me = this;
      axios
        .post("/omplirincidencies", this.incident)
        .then(function(response) {
          setTimeout($forceUpdate(), 2000);
        })
        .catch(function(error) {
          me.error = error.response.data;
          me.errors.push(me.error.error);
          me.modal = 1;
        });
    },

    /*redireccionar() {
      let me2 = this;
      axios
        .get("../web/taulaIncidencia")
        .then(function(response) {

        })
        .catch(function(error) {
          console.log(error);
        });
    },*/

    formatData(date2) {
      var d = date2.getDate();
      var m = date2.getMonth() + 1;
      var y = date2.getFullYear();

      var dateActual =
        "" + y + "-" + (m <= 9 ? "0" + m : m) + "-" + (d <= 9 ? "0" + d : d);

      this.incident.data = dateActual;
    },

    horaActual() {
      var d = new Date();
      var n = d.toLocaleTimeString();
      this.hora = n;

      this.incident.hora = n;
    }
  },
  computed: {
    alertants_id: function() {
      this.omplirDadesAlertant();
    },
    alertantProva: function() {
      this.omplirMunicipiProva();
    }
  }
};
</script>

<style>
.card-body {
  font-family: "Montserrat-Black";
}

.card-header {
  font-family: "OS-SemiBold";
}
.mostrar {
  display: list-item !important;
  opacity: 1 !important;
  position: absolute !important;
  background-color: #EBDAB6;
}
</style>