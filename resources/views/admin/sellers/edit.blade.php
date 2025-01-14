@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.sellers')}}">Vendeurs </a>
                            </li>
                            <li class="breadcrumb-item active">Modifier vendeur
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> Modification </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.sellers.update',$seller -> id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{$seller -> id}}">

                                        <div class="form-group" style="display: flex;justify-content:center">
                                            <div class="text-center" style="width:250px; height:200px">
                                                <img src="{{$seller  -> logo}}"  style="object-fit: cover;width:100% !important" alt="صورة القسم  ">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label> logo </label>
                                            <label id="projectinput7" class="file center-block">
                                                <input type="file" id="file" name="logo">
                                                <span class="file-custom"></span>
                                            </label>
                                            @error('logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> Les informations du vendeur </h4>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Nom du vendeur </label>
                                                        <input type="text" value="{{$seller -> full_name}}" id="name" class="form-control" placeholder="  " name="full_name">
                                                        @error("full_name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> le nom du coperative </label>
                                                        <input type="text" value="{{$seller -> cop_name}}" id="name" class="form-control" placeholder="  " name="cop_name">
                                                        @error("cop_name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Nom du boutique </label>
                                                        <input type="text" value="{{$seller -> store_name}}" id="name" class="form-control" placeholder="  " name="store_name">
                                                        @error("store_name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="row">

                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Telephone </label>
                                                        <input type="text" id="mobile" class="form-control" placeholder="  " name="mobile" value="{{$seller -> mobile}}">

                                                        @error("mobile")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2"> Choisissez les catégories </label>
                                                        <select name="categories[]" class="select2 form-control" multiple>
                                                            <optgroup label="من فضلك أختر القسم ">
                                                                @if($categories && $categories -> count() > 0)
                                                                @foreach($categories as $category)
                                                                <option value="{{$category -> id }}" @foreach($seller -> MainCategory as $cat)
                                                                    @if ($cat->id == $category->id)
                                                                    selected
                                                                    @endif
                                                                    @endforeach
                                                                    >{{$category -> libelle}}</option>
                                                                @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('categories')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="row">
                                                <div class="class col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Mot de pass </label>
                                                        <input type="password" id="password" class="form-control" placeholder="  " name="password">

                                                        @error("password")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  Email </label>
                                                        <input type="text" id="email" class="form-control" placeholder="  " name="email" value="{{$seller -> email}}">

                                                        @error("email")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <di class="row">
                                                <div class="col-12 ">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> Adresse </label>
                                                        <input type="text" id="pac-input" class="form-control" placeholder="  " name="address" value="{{$seller -> address}}">

                                                        @error("address")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </di>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1" name="active" id="switcheryColor4" class="switchery" data-color="success" @if($seller -> active == 1)checked @endif/>
                                                        <label for="switcheryColor4" class="card-title ml-1">Status </label>

                                                        @error("active")
                                                        <span class="text-danger"> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" onclick="history.back();">
                                                <i class="ft-x"></i> Annuler
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Enregistrer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@endsection
