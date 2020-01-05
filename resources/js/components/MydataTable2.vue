<template>
  <div className="animated">
    <b-card>
      <b-card-header>
        <i class="icon-menu mr-1"></i>Portusers
        <div class="card-header-actions">
            <b-button size="sm" variant="link" @click="goto('/portusers/create')"><i class="nav-icon icon-people"></i> New Portuser</b-button>
        </div>
      </b-card-header>
      <b-card-body>
        <v-client-table  :columns="columns" :data="data" :options="options" id="dataTable" ref="mytable">

            <template slot="expires_on" slot-scope="props">
                <b-badge :variant="getBadge(props.row.expires_on)">{{formatDate(props.row.expires_on)}}</b-badge>
            </template>

            <template slot="status" slot-scope="props">
                <b-badge :variant="getBadge(props.row.expires_on)">{{formatDateHumanize(props.row.expires_on)}}</b-badge>
            </template>            

            <template slot="action" slot-scope="props">
                <b-button-group>
                    <b-button class="btn btn-ghost-success" @click="openWindow(getQrUrl(props))"><i class="fa fa-qrcode"></i></b-button>
                    <b-button class="btn btn-ghost-warning"  @click="goto(getViewUrl(props))"><i class="fa fa-eye"></i></b-button>
                    <b-button class="btn btn-ghost-danger"  @click="goto(getEditUrl(props))"><i class="fa fa-edit"></i></b-button>
                </b-button-group>
            </template>
         
        </v-client-table>
      </b-card-body>
    </b-card>
    <b-modal title="Modal title" v-model="myModal" @ok="myModal = false">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </b-modal>
  </div>
</template>

<script>
    // moment must be import from here for it to work. Import it global somehow will not work.
    import moment from 'moment';
    import {Event} from 'vue-tables-2';

    export default {
        data() {
            return {
                myModal: false,
                columns: ['id', 'name', 'company.name', 'uuid', 'expires_on', 'status', 'action'],
                dateColumns: ['expires_on'],
                data:[],
                options: {
                    headings: {
                        'company.name': 'Company',
                        expires_on: 'Expires'
                    },
                    sortable: ['name', 'company.name', 'expires_on'],
                    filterable: ['name', 'company.name', 'uuid', 'expires_on', 'status'],
                    sortIcon: { base:'fa', up:'fa-sort-asc', down:'fa-sort-desc', is:'fa-sort' },
                    columnsDropdown: false,
                    templates: {
                        expires_on: (h, row) => {
                            return this.formatDate(row.expires_on);
                        }
                    }
                }
            }
        },

        methods: {
            getQrUrl(props) {
                return '/portusers/' + props.row.id + '/qrcode';
            },

            getViewUrl(props) {
                return '/portusers/' + props.row.id;
            },

            getEditUrl(props) {
                return '/portusers/' + props.row.id + '/edit';
            },

            getBadge (date) {
                let days = this.getDateInDays(date);
                return days <= 0 ? 'danger'
                    : days <= 90 ? 'warning'
                    :days > 90 ? 'success' : 'primary'
            },

            getDaysPassOrFuture (date) {
                let days = this.getDateInDays(date);
                return days <= 0 ? 'Expired' : 'Expires'
            },

            formatDate(date) {
                return moment(date).format('YYYY-MM-DD');
                // return moment(date).fromNow() + ' | ' + moment(date).format('YYYY-MM-DD') + ' | ' + moment(date).diff(moment(new Date()), 'days');
            },
 
            formatDateHumanize(date) {
                return this.getDaysPassOrFuture(date) + ' ' + moment(date).fromNow();
            },

            getDateInDays(date) {
                return moment(date).diff(moment(new Date()), 'days');
            },

            openWindow(url) {
                window.open(url,'QRCode','resizable,height=500,width=400');
                // this.myModal = true;
            },

            goto(url) {
                window.open(url, '_self');
                // this.myModal = true;
            },
            
            printTableLog() {
              console.log('Filter: ' + this.$refs.mytable.query);
              console.log('Limit: ' + this.$refs.mytable.limit);
              console.log('Page No: ' + this.$refs.mytable.page);
              console.log('OrderBy Col: ' + this.$refs.mytable.orderBy.column);
              console.log('OrderBy Asc: ' + this.$refs.mytable.orderBy.ascending);
            },

            printStore() {
              console.log('Filter: ' + this.$store.getters.getQuery);
              console.log('Limit: ' + this.$store.getters.getLimit);
              console.log('Page No: ' + this.$store.getters.getPage);
              console.log('OrderBy Col: ' + this.$store.getters.getOrderBy.column);
              console.log('OrderBy Asc: ' + this.$store.getters.getOrderBy.ascending);
            },

            commitToStore() {
              this.$store.commit('setQuery', this.$refs.mytable.query);
              this.$store.commit('setLimit', this.$refs.mytable.limit);
              this.$store.commit('setPage', this.$refs.mytable.page);
              this.$store.commit('setOrderBy', {
                'column': this.$refs.mytable.orderBy.column,
                'ascending': this.$refs.mytable.orderBy.ascending
              });

              // this.$refs.mytable.setFilter(this.$store.getters.getQuery);
              // this.$refs.mytable.setPage(this.$store.getters.getPage);
              // this.$refs.mytable.setOrder(this.$store.getters.getOrderBy.column, this.$store.getters.getOrderBy.ascending);              
            }
        },

        mounted() {
            axios.get('/api/portusers')
                .then(response => {
                    this.data = response.data;
                });
            
            this.printStore();
            
            this.$refs.mytable.toggleColumn('id');
            this.$refs.mytable.setLimit(this.$store.getters.getLimit);
            this.$refs.mytable.setFilter(this.$store.getters.getQuery);
            this.$refs.mytable.setPage(parseInt(this.$store.getters.getPage));
            this.$refs.mytable.setOrder(this.$store.getters.getOrderBy.column, this.$store.getters.getOrderBy.ascending);

            this.printTableLog();
        Event.$on('vue-tables.limit', (e) => {
            console.log('vue-tables.limit: ' + e);
            // this.printTableLog();
            this.commitToStore();
            this.printStore();
        });

        Event.$on('vue-tables.filter', (e) => {
          console.log('vue-tables.filter: ' + e);
          // this.printTableLog();
          this.commitToStore();
          this.printStore();

        });  
        Event.$on('vue-tables.sorted', (e) => {
            // this.printTableLog();
            this.commitToStore();
            this.printStore();
        });  
        Event.$on('vue-tables.pagination', (e) => {
            console.log('vue-tables.pagination: ' + e);
            // this.printTableLog();
            this.commitToStore();
            this.printStore();
        }); 
        
        Event.$on('vue-tables.loaded', (e) => {
            console.log('vue-tables.loaded: ' + e);

        });      
        },
        updated() {
          this.$refs.mytable.setPage(parseInt(this.$store.getters.getPage));
        }
  };
</script>

<style lang="scss">
  #dataTable {
    width: 100%;
    margin: 0 auto;

    .VuePagination {
      text-align: center;
      justify-content: center;
    }

    .vue-title {
      text-align: center ;
      margin-bottom: 10px;
    }

    .VueTables__search-field {
      display: flex;
    }
    .VueTables__search-field input {
      margin-left: 0.25rem;
    }

    .VueTables__limit-field {
      display: flex;
    }

    .VueTables__limit-field select {
      margin-left: 0.25rem !important;
    }

    .VueTables__table th {
      text-align: center;
    }

    .VueTables__child-row-toggler {
      width: 16px;
      height: 16px;
      line-height: 16px;
      display: block;
      margin: auto;
      text-align: center;
    }

    .VueTables__child-row-toggler--closed::before {
      content: "+";
    }

    .VueTables__child-row-toggler--open::before {
      content: "-";
    }
  }

</style>
