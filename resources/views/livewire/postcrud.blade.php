<div>
    <div class="d-flex ms-auto input-group justify-content-between mt-5">
        <h3 class="text-center fw-bold mt-3 ms-5" style="font-family: Fantasy;">Posts</h3>
        <input type="search" wire:model="search" class="form-control float-end mt-1 ms-5" placeholder="Search..." />
        <a wire:click='showForm' class="ms-3 mt-3 btn btn-success"> Add
        </a>
    </div>
    @if ($showData==true)
            @if (session()->has('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                <strong>{{session('error')}}</strong>
            </div>
            @endif
            @role('user')
            <div class="">
                <div class="container">
                    @if($images->count() > 0)
                        <div class="row">
                        @foreach($images as $img)
                        @if ($img->user_id == auth()->id())
                        <div class="col mt-5">
                            <div class="card shadow-lg" style="width: 300px; height:350px">
                                <img class="card-img-top" src="{{asset('storage')}}/{{$img->image}}" alt="" style="width: 300px; height:200px">
                            <div class="card-body d-flex">
                            <h4 class="card-title mt-1">{{$img->users->name}} </h3>
                                <span style="font-style:italic; font-size:15px"> &nbsp; is feeling {{$img->status}} <span>
                                    <p class="" style="font-size: 15px; text-align: justify;">{{$img->description}}</p>
                            </div>
                            <div class="card-footer ms-auto">
                                <a type="button" wire:click='edit({{$img->id}})'>
                                    <i class="bi bi-pencil-square" style="color:rgb(38, 0, 255);"></i>
                                </a>
                                <a type="button" wire:click='delete({{$img->id}})' onclick="return confirm('Are you sure you want to delete this?')">
                                    <i class="bi bi-trash3" style="color:red;"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        @endif
                        @endforeach
                    @endif
                </div>
            </div>
            @endrole
            @role('admin')
            <div class="">
                <div class="container">
                    @if($images->count() > 0)
                        <div class="row">
                        @foreach($images as $img)
                        {{-- @if($img->status==0) --}}
                        <div class="col mt-5">
                            <div class="card shadow-lg" style="width: 300px; height:350px">
                                <img class="card-img-top" src="{{asset('storage')}}/{{$img->image}}" alt="" style="width: 300px; height:200px">
                            <div class="card-body d-flex">
                            <h4 class="card-title mt-1">{{$img->users->name}} </h3>
                                <span style="font-style:italic; font-size:15px"> &nbsp; is feeling {{$img->status}} <span>
                                    <p class="" style="font-size: 15px; text-align: justify;">{{$img->description}}</p>
                            </div>
                            <div class="card-footer ms-auto">
                                <a type="button" wire:click='edit({{$img->id}})'>
                                    <i class="bi bi-pencil-square" style="color:rgb(38, 0, 255);"></i>
                                </a>
                                <a type="button" wire:click='delete({{$img->id}})' onclick="return confirm('Are you sure you want to delete this?')">
                                    <i class="bi bi-trash3" style="color:red;"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        {{-- @endif --}}
                        @endforeach
                    @endif
                </div>
            </div>
            @endrole
            @else
            <p></p>
    @endif
    <div class="float-end">{{$images->links()}}</div>
        @if ($createData==true)
        <div class="row mt-3">
            <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="card w-150">
                    <div class="card-header bg-white">
                        <div class="d-flex mt-3">
                            <i class="bi bi-arrow-left" wire:click="back()"></i>
                            <h3 class="text-center mx-auto">Create Post</h3>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent='create'>
                        <div class="card-body">
                            <div class="from-group mb-3">
                                <select class="form-select mt-2" name="status" wire:model.defer="status">
                                    <option selected>I'm feeling...</option>
                                    <option value="Happy">Happy</option>
                                    <option value="Sad">Sad</option>
                                    <option value="Angry">Angry</option>
                                    <option value="In love">In love</option>
                                  </select>
                                    @error('status')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="from-group">
                                <textarea class="form-control" wire:model="description" id="description" cols="30"
                                    rows="10"  placeholder="What's on your mind?"></textarea>
                                @error('description')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="from-group">
                                <select class="form-select mt-2" name="privacy" wire:model.defer="privacy">
                                    <option selected>Choose privacy</option>
                                    <option value="1">Public</option>
                                    <option value="0">Private</option>
                                  </select>
                                    @error('privacy')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="custom-file mt-3">
                                <input type="file" wire:model='image' class="custom-file-input form-control" id="customFile">
                            </div>
                            @if ($image)
                            <img src="{{$image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="">
                            @endif
                        </div>
                        <div class="card-footer float-end">
                            <button type="submit" class="btn btn-primary">Post</button>
                            <button wire:click="back()" class="btn btn-secondary">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if ($updateData == true)
        <div class="row mt-2">
            <div class="col-xl-8 col-md-8 col-sm-12 offset-xl-2 offset-md-2 offset-sm-0">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    <strong>{{session('error')}}</strong>
                </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <div class="d-flex mt-3">
                            <i class="bi bi-arrow-left" wire:click="back()"></i>
                            <h3 class="text-center mx-auto">Update Post</h3>
                        </div>
                    </div>
                    <form action="" wire:submit.prevent='update({{$edit_id}})'>
                        <div class="card-body">
                            <div class="from-group mb-3">
                                <select class="form-select mt-2" name="status" wire:model.defer="status">
                                    <option selected>I'm feeling...</option>
                                    <option value="Happy">Happy</option>
                                    <option value="Sad">Sad</option>
                                    <option value="Angry">Angry</option>
                                    <option value="In love">In love</option>
                                  </select>
                                    @error('status')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="from-group">
                                <textarea class="form-control" wire:model="description" id="description" cols="30"
                                    rows="10"  placeholder="What's on your mind?"></textarea>
                                @error('description')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="from-group">
                                <select class="form-select mt-2" name="privacy" wire:model.defer="privacy">
                                    <option selected>Choose privacy</option>
                                    <option value="1">Public</option>
                                    <option value="0">Private</option>
                                  </select>
                                    @error('privacy')<span class="error text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="custom-file mt-3">
                                <input type="file" wire:model='image' class="custom-file-input form-control" id="customFile">
                            </div>
                            @if ($image)
                            <img src="{{$image->temporaryUrl()}}" style="width: 200px;height:200px;" alt="">
                            @endif
                        </div>
                        <div class="card-footer d-flex ms-3">
                            <button type="submit" class="btn btn-primary ms-auto">Update</button>
                            <button wire:click="back()" class="btn btn-secondary ms-2">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
</div>
