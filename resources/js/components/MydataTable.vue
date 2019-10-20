<template>
    <mdb-container>
    <mdb-row>
      <mdb-col sm="6" md="8">
        <mdb-row>
          <mdb-col sm="12" md="4">
            <datatable-select :title="entriesTitle" v-if="pagination" @getValue="updateEntries" :options="options"/>
          </mdb-col>
          <mdb-col class="pt-2">
            <mdb-btn @click="updateData" v-if="refresh" size="sm" class="mt-4" outline="primary" >
              <mdb-icon  icon="sync" />
            </mdb-btn>
          </mdb-col>
        </mdb-row>
      </mdb-col>
      <mdb-col sm="6" md="4" v-if="searching">
        <datatable-search class="mt-4 pt-2" :placeholder="searchPlaceholder" @getValue="updateSearch" />
      </mdb-col>
    </mdb-row>

        <mdb-datatable 
            ref="mdbtable" 
            responsive
            :data="data"
            striped
            bordered
            :pagination="true"
            :display="5"
            focus
            :tfoot="false"
            @selectRow="logConsole($event)"
        />
    </mdb-container>
</template>

<script>
    export default {

        data() {
            return {
                columns: [],
                rows: [],
                pagination: false,
                searching: false,
                refresh: false
                              
            }
        },        

        computed: {
            data() {
                return {
                    columns: this.columns,
                    rows: this.rows
                };
            },
        },
        methods: {
            logConsole(e) {
                console.log(this.rows[e]);
            },

            filterData(dataArr, keys) {
                let data = dataArr.map(entry => {
                    let filteredEntry = {};
                    keys.forEach(key => {
                        let arrKey = key.split('.');
                        // console.log(arrKey);
                        // console.log(typeof arrKey);
                        // console.log(arrKey.length);
                        if(arrKey.length == 2) {
                            if (arrKey[0] in entry) {
                                // if (typeof entry[key] === 'object'){
                                //     console.log(entry[key].name);
                                // }
                                filteredEntry[key] = entry[arrKey[0]][arrKey[1]];
                            }
                        } else if (key == 'action') {

                            filteredEntry[key] = `
                                    <a href="/portusers/${entry['id']}/qrcode"><i class="text-primary fa fa-qrcode"></i></a> | 
                                    <a href="/portusers/${entry['id']}"><i class="text-warning fa fa-eye"></i></a> | 
                                    <a href="/portusers/${entry['id']}/edit"><i class="text-danger fa fa-edit"></i></a>
                            `;

                        } else {
                            if (key in entry) {
                                // if (typeof entry[key] === 'object'){
                                //     console.log(entry[key].name);
                                // }
                                filteredEntry[key] = entry[key];
                            }
                        }
                    });
                    return filteredEntry;
                });
                return data;
            }
        },

        mounted() {
            fetch('/api/portusers')
                .then(res => res.json())
                .then(json => {
                    console.log(json);
                    let keys = ["id", "name", "uuid", "company.name", "action"];
                    let entries = this.filterData(json, keys);
                    console.log(entries);
                    //columns
                    // this.columns = keys.map(key => {
                    //     return {
                    //         label: key.toUpperCase(),
                    //         field: key,
                    //         sort: 'asc'
                    //     };
                    // });
                    
                    this.columns = [
                        {
                            label: 'Name',
                            field: 'name',
                            sort: 'asc'
                        },
                        {
                            label: 'Uuid',
                            field: 'uuid',
                            sort: 'asc'
                        },  
                        {
                            label: 'Company',
                            field: 'company.name',
                            sort: 'asc'
                        },
                        {
                            label: 'Action',
                            field: 'action'
                        }                                                                       
                    ];

                    //rows
                    entries.map(entry => this.rows.push(entry));
                })
                .catch(err => console.log(err)
            );
            
            this.$refs.mdbtable.search = "Con";
        }
}
</script>
