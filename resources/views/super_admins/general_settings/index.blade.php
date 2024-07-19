@extends('super_admins.layouts.master')

@section('title')
    {{ $heading }}
@endsection

@section('css')
    @include('super_admins.includes.datatable_css')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pt-4 pt-lg-0">

                <div class="col-sm-6">
                    <h2 class="main-content-title fw-bold mb-0">{{ $heading }}</h2>
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> {{ $heading }} </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="card-body">

                            <form method="POST" action="{{ route('super_admin.general_settings.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table id="" class="table ">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Value</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($general_settings as $key => $general_setting)

                                            <tr>
                                                <td>{{ $i }}</td>

                                                <td>{{ $general_setting->display_name }}</td>

                                                <td>
                                                    <input class="form-control" type="hidden" name="general_setting_name[]"
                                                        value="{{ $general_setting->name }} ">
                                                    <input class="form-control" type="hidden" name="general_setting_type[]"
                                                        value="{{ $general_setting->type }} ">
                                                    @if ($general_setting->type == 'image')
                                                        @if ($general_setting->value)
                                                        <div class="custom-file-preview mb-2">
                                                        <img src="{{ url($general_setting->value) }}" height="75px" alt="{{ $general_setting->name }}">
                                                        </div>
                                                        @else
                                                        <div class="custom-file-preview">
                                                            -- No Image Selected
                                                        </div>
                                                        @endif
                                                        <input  type="file" name="general_setting_value[{{$key}}]"
                                                            class="custom-file-input @if ($errors->has($general_setting->name)) is-invalid @endif"
                                                            id="Input{{ $general_setting->name }}"
                                                            placeholder="Select {{ $general_setting->display_name }}"
                                                            aria-describedby="{{ $general_setting->name }}Error"
                                                            aria-invalid="true">
                                                        <span id="{{ $general_setting->name }}Error"
                                                            class="error invalid-feedback">
                                                            @if ($errors->has($general_setting->name))
                                                                {{ $errors->first($general_setting->name) }}
                                                            @endif
                                                        </span>
                                                        @elseif($general_setting->type == 'textarea')
                                                        <textarea required class="form-control" id="{{$general_setting->name}}" name="general_setting_value[{{$key}}]" >
                                                            {!! $general_setting->value !!}
                                                        </textarea><script>
                                                            $(document).ready(function() {
                                                                CKEDITOR.replace('discription_editor');
                                                            });
                                                        </script>
                                                        @else
                                                        <input required class="form-control" type="{{ $general_setting->type }}"
                                                            name="general_setting_value[{{$key}}]"
                                                            value="{{$general_setting->value}}">
                                                        @endif
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>

                                <button type="submit" class="btn btn-primary">Update</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('super_admins.includes.datatable_scripts')
    <script>
        $(document).ready(function() {
            @foreach ($general_settings as $general_setting)
                @if($general_setting->type == 'textarea')
                     CKEDITOR.replace({{$general_setting->name}});
                @endif
            @endforeach
        });
    </script>
@endsection
