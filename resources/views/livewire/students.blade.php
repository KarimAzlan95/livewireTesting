<div>
    @include('livewire.create')
    @include('livewire.update')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div class="card">
                    <div class="card-header">
                        <h3>All Students
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
                            Add New Student
                        </button></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unisel as $haha)
                                <tr>
                                    <td>{{$haha->firstname}}</td>
                                    <td>{{$haha->lastname}}</td>
                                    <td>{{$haha->email}}</td>
                                    <td>{{$haha->phone}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updatestudentmodal" wire:click.prevent="
                                        edit({{$haha->id}})" />Edit</button>
                                        <button type="button" class="btn btn-danger" wire:click.prevent="delete({{$haha->id}})">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                </div>
        </div>
    </section>
</div>
