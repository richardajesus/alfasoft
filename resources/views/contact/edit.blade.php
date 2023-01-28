@extends('main')
@section('title', 'Edit contact')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form</h3>
                        </div>
                        <form method="post" action="{{ route('contact.update', ['id' => $contact->id]) }}">
                            @csrf
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input required type="text" class="form-control" value="{{ old('name', $contact->name) }}" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input required pattern="[0-9]{9}" value="{{ old('contact', $contact->contact) }}" title="Should be 9 digits" type="text" class="form-control" name="contact" placeholder="Enter contact">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input required type="email" class="form-control" value="{{ old('email', $contact->email) }}" name="email" placeholder="Enter e-mail">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Go back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop()