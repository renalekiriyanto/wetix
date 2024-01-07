@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Edit User</h3>
                </div>

                <div class="col-4 text-right">
                    <button class="btn text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-2">
                    <form action="{{url('dashboard/users/update/'.$user->id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{old('name') ?? $user->name}}">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email') ?? $user->email}}">
                            @error('email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-2 mb-0">
                            <button type="button" onclick="window.history.back()" class="btn text-secondary btn-sm">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete</h5>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin hapus user {{$user->name}} ?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{url('dashboard/users/delete/'.$user->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
