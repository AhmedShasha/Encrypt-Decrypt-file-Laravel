@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Files</h3>
                                {{-- <p class="text-subtitle text-muted">For user to check they list</p> --}}
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Files</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    {{-- Create New One --}}
                        <section id="Add Category">
                            <div class="row match-height">
                                <div class="col-12 m-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Upload File</h4>
                                        </div>
                                        <div class="card-content">
                                            @include('includes.errors')

                                            <div class="card-body">
                                                <form class="form" method="POST" action="{{route('storeFile')}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ csrf_field() }}
                                                {{ method_field('POST') }}

                                                <div class="row">
                                                    <div class=" col-10  form-group">
                                                        <label for="file" class="form-label ">Attachments</label>
                                                        <input class="form-control form-control-md " id="file" name="file"
                                                            type="file">
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    {{-- View List of Categories --}}
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <span class="col-md-6">All Files</span>

                                    <div class="col-md-6 text-end">
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                {{-- Table Of Data --}}
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Size</th>
                                            <th>Extention</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $index => $file)
                                            <tr>
                                                <td>
                                                    {{ $index + 1}}
                                                </td>
                                                <td>
                                                    {{$file->name}}
                                                </td>
                                                <td>
                                                    {{number_format($file->size , 2)}} Bytes
                                                </td>
                                                <td>
                                                    {{$file->extention}}
                                                </td>
                                                <td style="width: 175px;">
                                                    <img src="{{ asset('../storage/app/uploads/' . $file->name) }}"
                                                        class="img-thumbnail img-square" style="width: 100px">
                                                </td>
                                                <td>
                                                    @if($file->status == 0)
                                                        <a href="{{ route('encryptfile', $file->id) }}"
                                                            class="btn btn-sm btn-primary">Encrypt</a>
                                                    @elseif($file->status == 1)
                                                        <a href="{{ route('decryptfile', $file->id) }}"
                                                            class="btn btn-sm btn-dark">Decrypt</a>
                                                    @endif
                                                    <a href="{{ route('perviewFile', $file->id) }}"
                                                        class="btn btn-sm btn-success"><i
                                                            class="fas fa-download mr-1"></i></a>

                                                    <form action="{{ route('deletefile', $file->id) }}"
                                                        method="POST" class="" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                                            onclick="return confirm('Are you sure you want to delete?!')"><i
                                                                class="fa fa-trash mr-1"></i></button>
                                                    </form>
                                                </td> 
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js') }} "></script>
    <script>
        // Simple Datatable
        let table = document.querySelector('#table');
        let dataTable = new simpleDatatables.DataTable(table);
    </script>
    
@endsection