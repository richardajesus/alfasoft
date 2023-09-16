@extends('layouts.main')
@section('title', 'Contacts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" id="app">
                <div class="col-12">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact List</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input :disabled="loading" type="search" @keyup="search" v-model="filter" class="form-control float-right" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('contact.create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> New</a>
                            <div v-if="loading" class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div v-else class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th @click="sortChanged('name')" style="cursor: pointer">
                                                        <div class="d-flex">
                                                            <div v-show="sortBy == 'name'" class="mr-2">
                                                                <i v-if="sortDesc" class="fas fa-chevron-up"></i>
                                                                <i v-else class="fas fa-chevron-down"></i>
                                                            </div>Name
                                                        </div>
                                                    </th>
                                                    <th @click="sortChanged('contact')" style="cursor: pointer">
                                                        <div class="d-flex">
                                                            <div v-show="sortBy == 'contact'" class="mr-2">
                                                                <i v-if="sortDesc" class="fas fa-chevron-up"></i>
                                                                <i v-else class="fas fa-chevron-down"></i>
                                                            </div>Contato
                                                        </div>
                                                    </th>
                                                    <th @click="sortChanged('email')" style="cursor: pointer">
                                                        <div class="d-flex">
                                                            <div v-show="sortBy == 'email'" class="mr-2">
                                                                <i v-if="sortDesc" class="fas fa-chevron-up"></i>
                                                                <i v-else class="fas fa-chevron-down"></i>
                                                            </div>Name
                                                        </div>
                                                    </th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="contact in data.data">
                                                    <td>@{{ contact.name }}</td>
                                                    <td>@{{ contact.contact }}</td>
                                                    <td>@{{ contact.email }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info" @click="window.location.href = '/contacts/' + contact.id" title="Show">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-success" @click="window.location.href = '/contacts/' + contact.id + '/edit'" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger" @click="window.location.href = '/contacts/' + contact.id + '/delete'" title="Delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>E-mail</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div role="status" aria-live="polite">
                                            Showing @{{ (data.data.length > 0 ? ((data.current_page - 1) * perPage) + 1 : 0) }}
                                            to
                                            @{{ (data.total - (((data.current_page - 1) * perPage) + 1) > perPage ? perPage * data.current_page : data.total)}}
                                            of @{{ data.total }} entries @{{ (total > data.total ? '(filtered from ' + total + ' total entries)' : null)}}
                                        </div>
                                    </div>
                                    <button v-for="(l, i) in data.links" :key="i" @click="get(l.url)" :disabled="!l.url" type="button" :class="'btn btn-' + (l.active ? 'primary' : 'light')">
                                        <div v-html="l.label" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Vue -->
<script src="//cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script src="//cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            timeout: null,
            data: {
                data: []
            },
            total: 0,
            url: '/contacts/paginate',
            loading: false,
            perPage: 5,
            filter: null,
            sortBy: 'name',
            sortDesc: false,
        },
        mounted() {
            this.get()
        },
        watch: {
            filter() {
                if (!this.filter) {
                    this.filter = null
                    this.get()
                }
            }
        },
        methods: {
            search() {
                clearTimeout(this.timeout);
                var self = this
                this.timeout = setTimeout(function() {
                    self.data.current_page = 1
                    self.get()
                }, 1000)
            },
            get(url = null) {
                if (!this.loading) {
                    this.loading = true
                    this.sortBy = (this.sortBy ?? 'name')
                    let params = {
                        per_page: this.perPage,
                        filter: this.filter,
                        sortBy: this.sortBy,
                        sort: (this.sortDesc ? 'DESC' : 'ASC')
                    }
                    if (url && url.includes('?')) {
                        let result = url.split('?')
                        let param = result[1].split('=')
                        var key = param[0]
                        params[key] = param[1]
                        this.page = param[1]
                    } else params.page = this.data.current_page
                    this.$http.get(this.url, {
                            params
                        })
                        .then(
                            response => {
                                this.data = response.body.data
                                this.total = response.body.total
                                this.loading = false
                            },
                            error => {
                                console.error(response.body)
                                this.loading = false
                            }
                        )
                }
            },
            sortChanged(sortBy) {
                if (this.sortBy == sortBy) {
                    this.sortDesc = this.sortDesc ? false : true
                }
                this.sortBy = sortBy
                this.get()
            },
        }
    });
</script>
@stop