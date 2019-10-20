<template>
  <div className="animated">
    <b-card>
      <b-card-header>
        <i class="icon-menu mr-1"></i>Data Table
        <div class="card-header-actions">
          <a href="https://github.com/matfish2/vue-tables-2" rel="noopener noreferrer" target="_blank" className="card-header-action">
            <small className="text-muted">docs</small>
          </a>
        </div>
      </b-card-header>
      <b-card-body>
        <v-client-table  :columns="columns" :data="data" :options="options" id="dataTable" ref="mytable">

            <template slot="expires_on" slot-scope="props">
                <b-badge :variant="getBadge(props.row.expires_on)">{{formatDate(props.row.expires_on)}}</b-badge>
            </template>

            <template slot="status" slot-scope="props">
                <b-badge :variant="getBadge(props.row.expires_on)">Expires {{formatDateHumanize(props.row.expires_on)}}</b-badge>
            </template>            

            <div slot="action" slot-scope="props" class="but-group">
                <a href="#" class="btn btn-ghost-warning" @click="openWindow(getQrUrl(props))"><i class="fa fa-qrcode"></i></a>
                <a :href="getViewUrl(props)" class="btn btn-ghost-success"><i class="fa fa-eye"></i></a>
                <a :href="getEditUrl(props)" class="btn btn-ghost-info"><i class="fa fa-edit"></i></a>
            </div>
         
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
  
    export default {

        data() {
            return {
                myModal: false,
                columns: ['id', 'name', 'company.name', 'uuid', 'expires_on', 'status', 'action'],
                data:[],
                options: {
                    headings: {
                        'company.name': 'Company',
                        expires_on: 'Expires'
                    },
                    sortable: ['name', 'company.name', 'expires_on'],
                    filterable: ['name', 'company.name', 'expires_on'],
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

            formatDate(date) {
                return moment(date).format('YYYY-MM-DD');
                // return moment(date).fromNow() + ' | ' + moment(date).format('YYYY-MM-DD') + ' | ' + moment(date).diff(moment(new Date()), 'days');
            },
 
            formatDateHumanize(date) {
                return moment(date).fromNow();
            },

            getDateInDays(date) {
                return moment(date).diff(moment(new Date()), 'days');
            },

            openWindow(url) {
                window.open(url,'QRCode','resizable,height=500,width=400');
                // this.myModal = true;

            }
        },

        mounted() {
            axios.get('/api/portusers')
                .then(response => {
                    this.data = response.data;
                });
            
            this.$refs.mytable.toggleColumn('id');
        }
  };
</script>

<style lang="scss">
  #dataTable {
    width: 95%;
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
