@extends('layouts.main')
@section('title', 'Show contact')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-6">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $imgUser }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $contact->name }}</h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Contact</b> <a class="float-right">{{ $contact->contact }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>E-mail</b> <a href="mailto:{{ $contact->email }}" class="float-right">{{ $contact->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last update</b> <a class="float-right">{{ $contact->updated_at }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Created at</b> <a class="float-right">{{ $contact->created_at }}</a>
                                </li>
                            </ul>

                            <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                                <i class="fas fa-chevron-left"></i>
                                Go back
                            </a>
                            <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <a href="{{ route('contact.delete', ['id' => $contact->id]) }}" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                Delete
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
</div>
@stop()