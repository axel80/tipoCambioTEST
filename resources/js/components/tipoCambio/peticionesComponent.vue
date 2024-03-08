<template>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="invoice-title"> Tipo de cambio consultas </h4>
                    </div>

                    <div class="card-body">
                        <!--     Inicia vuetify       -->
                        <v-app id="inspire">

                            <div class="mb-3">
                                <template>
                                    <v-card>
                                        <v-card-text>
                                            <v-container fluid>
                                                <v-row>
                                                    <v-col
                                                        cols-="12"
                                                        sm="4"
                                                        md="4"
                                                    >
                                                        <v-text-field
                                                            v-model="fechaInicio"
                                                            label="Fecha inicio"
                                                            ref="fechaInicio"
                                                            hint="EJ: 01-01-2024"
                                                        >

                                                        </v-text-field>
                                                    </v-col>
                                                    <v-col
                                                        cols-="12"
                                                        sm="4"
                                                        md="4"
                                                    >
                                                        <v-text-field
                                                            v-model="fechaFin"
                                                            label="Fecha fin"
                                                            ref="fechaFin"
                                                            hint="EJ: 01-01-2024"
                                                        >

                                                        </v-text-field>
                                                    </v-col>

                                                    <v-col
                                                        cols="12"
                                                        sm="4"
                                                        md="4"
                                                    >
                                                    <v-select
                                                            item-text="descripcion"
                                                            item-value="moneda"
                                                            v-model="monedaSelect"
                                                            :items="monedaItems"
                                                            label="Seleccione una moneda"
                                                            hint="Monedas"
                                                            :loading="esperarMonedas"
                                                        >
                                                    </v-select>
                                                </v-col>

                                                <v-col>
                                                    <v-card-actions>
                                                            <button class="btn btn-success" @click="peticionTC()"><i class="fas fa-search-dollar"></i> Consultar</button>
                                                    </v-card-actions>
                                                </v-col>

                                                </v-row>
                                            </v-container>
                                        </v-card-text>
                                    </v-card>
                                </template>
                            </div>

                            <template>
                                <v-card>

                                        <v-data-table
                                            :headers="headers"
                                            :items="peticionRespuestaArr"
                                            :items-per-page="10"
                                            class="elevation-1"
                                            :search="search"
                                            group-by="numero_peticion"
                                            show-group-by
                                            :footer-props="{
                                                showFirstLastPage: true,
                                                firstIcon: 'fas fa-angle-double-left',
                                                lastIcon: 'fas fa-angle-double-right',
                                                prevIcon: 'fas fa-angle-left',
                                                nextIcon: 'fas fa-angle-right',
                                                   'items-per-page-text':'Registros por página'
                                              }"
                                        >
                                            <template v-slot:top>




                                                <v-toolbar flat color="white">

                                                    <button type="button" @click="limpiarSolicitud()"  class="btn btn-primary"> <i class="fas fa-sync"></i> Limpiar</button>


                                                    <v-spacer></v-spacer>
                                                    <v-text-field v-model="search" label="Buscar" single-line hide-details></v-text-field>

                                                </v-toolbar>
                                            </template>


                                            <template v-slot:item.fecha_peticion="{item}">
                                                    {{ new Date( item.fecha_peticion ).toLocaleString() }}
                                                </template>

                                            <template v-slot:no-data>
                                                <v-alert :value="true" color="error" icon="fas fa-exclamation-triangle" class="mt-2">
                                                    No hay registros para mostrar
                                                </v-alert>
                                            </template>
                                        </v-data-table>

                                </v-card>

                            </template>
                        </v-app>
                        <!--     Termina vuetify             -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import Swal from "sweetalert2/dist/sweetalert2";
import "sweetalert2/src/sweetalert2.scss";

export default {
    vuetify: new Vuetify(),
    data(){
        return{
            peticionRespuestaArr:[],
            pagination:{},
            search:"",
            headers:[],
            fechaInicio:'',
            fechaFin:'',
            monedaSelect:0,
            monedaItems:[],
            esperarMonedas:false,
            esperaRespuesta:""

        }
    },
    mounted() {
        localStorage.clear();
        this.cargarHeader();
        this.cargarTiposMonedas();
        this.listar();


    },
    methods:{

        cargarHeader(){
            this.headers = [
                { text: "No. CONSULTA", align: "left", value: 'numero_peticion' },
                { text: "FECHA", align: "center", value: 'fecha_peticion' },
                { text: "TC/COMPRA", align: "left", value: 'tc_compra' },
                { text: "TC/VENTA", align: "center", value: 'tc_venta' },

            ]

            //this.cargarTiposMonedas()
        },


        cargarTiposMonedas(){
            axios.get('variables-disponibles').then((response)=>{
                this.monedaItems = response.data.variables;
                console.log(response.data.variables);
            })
        },


        peticionTC(){
            this.esperaRespuesta = true
            let data = {
                'fecha_inicio'  : this.fechaInicio,
                'fecha_fin'     : this.fechaFin,
                'moneda_id'     : this.monedaSelect

            }

             axios.post('peticion/tipo-cambio-rango', data)
             .then((response)=>{
                // console.log(response.data.peticionTC)
                // this.peticionRespuestaArr = response.data.peticionTC
                this.listar();
                this.toastMessage('success', 'Fechas y tipos procesados');
             })


        },

        limpiarSolicitud(){
            this.close();
        },

        close(){
            this.fechaInicio = ''
            this.fechaFin = ''
            this.peticionRespuestaArr = []
            this.getMonedas()


        },

        listar(){
            axios.get('peticion/lista').then((response)=>{
                this.peticionRespuestaArr = response.data.peticionTC
                console.log(this.peticionRespuestaArr);
            })
        },

        toastMessage(icon, message){
            const Toast =  Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: icon,
            title: message
            });
        },

    },
    components:{ Vuetify }
}
</script>
