@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Import File to Database with Laravel') }}
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
                            Import File
                        </button>
                        <a href="/sendemail" class="btn btn-primary">Send Email</a>
                        <br/>

                        <!-- Import Excel -->
                        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="/mahasiswa/import" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
                                        </div>
                                        <div class="modal-body">

                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{--notifikasi form validasi--}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
			        <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif

                   {{--notifikasi sukses--}}
                    @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Alamat</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($mahasiswa as $s)
                            <tr>
                                <td>{{$s->nama_depan}}</td>
                                <td>{{$s->nama_belakang}}</td>
                                <td>{{$s->alamat}}</td>
                                <td>{{$s->nim}}</td>
                                <td>{{$s->jurusan}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}

@endsection
