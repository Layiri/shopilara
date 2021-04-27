<template>
<div>
<bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage"></bootstrap-4-datatable>
    <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
    </template>

    <script>
export default {
    data() {
        return {
            columns: [{
                label: 'id',
                field: 'id'
            },
                {
                    label: 'title',
                    field: 'title'
                },
                {
                    label: 'category',
                    field: 'category'
                },
                {
                    label: 'description',
                    field: 'description'
                }
            ],
            rows: [],
            page: 1,
            filter:  '',
            perPage: 12,
        }
    },
    methods: {
        showBlogs: function () {
            axios.get('/blogs').then(function (res) {
                this.rows = res.data;
            }.bind(this));
        }
    },
    created: function () {
        this.showBlogs()
    }
}

</script>
