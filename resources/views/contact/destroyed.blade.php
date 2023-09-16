@extends('layouts.main')
@section('title', 'Contact destroyed')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Destroyed</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active">Delete</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-8">

                    <!-- Profile Image -->
                    <div class="card card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <div class="alert alert-success" role="alert">
                                    Contact <strong>{{ $contact->name }}</strong> was successfully deleted!
                                </div>
                            </div>
                            <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                                <i class="fas fa-chevron-left"></i> Go contacts
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop()