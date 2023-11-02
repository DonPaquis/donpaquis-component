<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg bg-dark" style="height: 55px;">
                    <a class="navbar-brand" href="#">
                        <img src="images/des.jpeg" alt="Tu Logo" style="height: 20px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active text-primary" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-success" href="#">Ofertas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="#">Categorías</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-info" href="#">Tu Cuenta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="#">Ayuda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger">
                                    <input wire:model="search" type="search" placeholder="search" style="height: 30px;">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary">
                                    <button class="btn-primary" wire:click="prueba">Search</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <br>
                <div>
                    <iframe width="100%" height="315" src="{{ $videoUrl }}" frameborder="0" allowfullscreen></iframe>
                    <button class="btn-warning" wire:click="editVideo">Cambiar Video</button>
                    @if ($editingVideo)
                        <input type="text" wire:model="videoFile">
                        <button class="btn btn-primary" wire:click="uploadVideo">Subir Video</button>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <h1 class="text-center text-info bg-dark" style="height: 55px;"> Add Product</h1>
                <form wire:submit.prevent="addProduct" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" wire:model="name" name="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" class="form-control" id="image" wire:model="image" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input class="form-control" id="description" wire:model="description">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" id="price" wire:model="price">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button  id="newP" type="submit" class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Agregar' }}</button>
                </form>
            </div>
        </div>
        <div wire:ignore.self>
            <div wire:transition.fade>
                @if($showForm)
                    <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="text-center">Productos</h1>
                                    <button type="button" class="close" data-dismiss="modal" wire:click="deleteWindow">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="addProduct" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input type="text" class="form-control" id="name" wire:model="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Imagen</label>
                                            <input type="file" class="form-control" id="image" wire:model="image" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descripción</label>
                                            <input class="form-control" id="description" wire:model="description">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Precio</label>
                                            <input type="number" class="form-control" id="price" wire:model="price">
                                        </div>

                                        <button type="submit" class="btn btn-primary">{{ $editing ? 'Actualizar' : 'Agregar' }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($products as $componente)
                <div class="col-md-4">
                    <hr>
                    <img width="100%" height="30%" src="{{ asset('images/des.jpeg') }}" alt="Descripción de la imagen">
                    <div class="card-body">
                        <h2>{{ $componente->name }}</h2>
                        <p>{{ $componente->description }}</p>
                        <p>${{ $componente->price }}</p>
                        <button wire:click="editProduct({{ $componente->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteProduct({{ $componente->id }})" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        document.getElementById('newP').addEventListener('click', function() {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        });
    </script>

</div>

