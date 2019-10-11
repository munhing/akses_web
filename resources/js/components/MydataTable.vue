<template>
    <mdb-container>
        <mdb-datatable
            :data="data"
            striped
            bordered
            arrows
            :display="3"
        />
    </mdb-container>
</template>

<script>
    export default {

        data() {
            return {
                columns: [],
                rows: []               
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
            filterData(dataArr, keys) {
                let data = dataArr.map(entry => {
                    let filteredEntry = {};
                    keys.forEach(key => {
                        let arrKey = key.split('.');
                        console.log(arrKey);
                        console.log(typeof arrKey);
                        console.log(arrKey.length);
                        if(arrKey.length == 2) {
                            if (arrKey[0] in entry) {
                                // if (typeof entry[key] === 'object'){
                                //     console.log(entry[key].name);
                                // }
                                filteredEntry[key] = entry[arrKey[0]][arrKey[1]];
                            }
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
                    let keys = ["name", "uuid", "company.name"];
                    let entries = this.filterData(json, keys);
                    console.log(entries);
                    //columns
                    this.columns = keys.map(key => {
                        return {
                            label: key.toUpperCase(),
                            field: key,
                            sort: 'asc'
                        };
                    });
                    
                    //rows
                    entries.map(entry => this.rows.push(entry));
                })
                .catch(err => console.log(err)
            );        
        }
    }
</script>
