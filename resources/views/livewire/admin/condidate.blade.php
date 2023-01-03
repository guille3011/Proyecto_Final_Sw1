<div>
    <x-slot:title>
        Position
        </x-slot>
        <div class="container">
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ __('Condidatos') }}({{ $total }})</h4>
                        <button wire:click='showForm' class="btn btn-primary">Nuevo</button>
                    </div>
                </div>
            </div>
            @if ($showTable == true)
                <input type="text" wire:model="search" class="form-control" placeholder="Search Here...">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <div class="table-responsive my-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Puntos</th>
                                <th>Posicion</th>
                                <th>Foto</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($condidates) > 0)
                                @foreach ($condidates as $condidate)
                                    <tr>
                                        <td>{{ $condidate->id }}</td>
                                        <td>{{ $condidate->fname }}</td>
                                        <td>{{ $condidate->lname }}</td>
                                        <td>{{ $condidate->email }}</td>
                                        <td>{{ $condidate->points }}</td>
                                        <td>{{ $condidate->positions->positions }}</td>
                                        <td><img src="{{ asset('storage') }}/{{ $condidate->image }}"
                                                style="width:70px;height:70px;" alt=""></td>
                                        <td><button wire:click="edit({{ $condidate->id }})" class="btn btn-success">Editar</button></td>
                                        <td><button class="btn btn-danger" wire:click.prevent='delete({{ $condidate->id }})'>Eliminar</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <h4>sin datos disponibles en este momento</h4>
                            @endif

                        </tbody>
                    </table>
                </div>
            @endif
            @if ($showCreate == true)
                <div class="my-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>atras</button>

                    <form wire:submit.prevent='store'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label"> Nombre:</label>
                            <input type="text" wire:model.lazy="fname" class="form-control"
                                placeholder="Enter First Name">
                            @error('fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Apellido:</label>
                            <input type="text" wire:model.lazy="lname" class="form-control"
                                placeholder="Enter Last Name">
                            @error('lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Posiciones:</label>
                            <select wire:model.lazy='pos_id' class="form-control">
                                <option selected>Seleccione la posicion</option>

                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->positions }}</option>
                                @endforeach
                            </select>
                            @error('pos_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email:</label>
                            <input type="text" wire:model.lazy="email" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Foto:</label>
                            <input type="file" wire:model="image" class="form-control" placeholder="Enter Image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            @endif
            @if ($showUpdate == true)
                <div class="my-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>atras</button>

                    <form wire:submit.prevent='update({{ $condidate_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Nombre:</label>
                            <input type="text" wire:model.lazy="edit_fname" class="form-control"
                                placeholder="Enter First Name">
                            @error('edit_fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Apellido:</label>
                            <input type="text" wire:model.lazy="edit_lname" class="form-control"
                                placeholder="Enter Last Name">
                            @error('edit_lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Posicion:</label>
                            <select wire:model.lazy='edit_pos_id' class="form-control">
                                <option selected>Seleccione la posicion</option>

                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->positions }}</option>
                                @endforeach
                            </select>
                            @error('edit_pos_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email:</label>
                            <input type="text" wire:model.lazy="edit_email" class="form-control" placeholder="Enter Email">
                            @error('edit_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Foto:</label>
                            <input type="file" wire:model="new_image" class="form-control" placeholder="Enter Image">
                            @if ($new_image)
                                <img src="{{ $new_image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @else
                                <img src="{{ asset('storage') }}/{{ $old_image }}"
                                    style="width:70px;height:70px;" alt="">
                            @endif
                            <input type="hidden" wire:model="old_image">

                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            @endif
        </div>
</div>
