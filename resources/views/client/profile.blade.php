@extends('layouts.client')
@section('custom-css')
<link rel="stylesheet" href="{{asset("public/css/category/minimal.css")}}">
@endsection
@section('top-header')
@include('client.includes.shopTopHeader')
@endsection
@section('bottom-header')
@endsection
@section('mobile-header')
@include('client.includes.shopMobileHeader')
@endsection
@section('breadcrumb')
@include('client.includes.breadcrumb',['title'=>$title])
@endsection

@section('content')


<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="woocommerce">
                    <div class="row">
                        <div class="col-12">
                            <div class="sign-in-form">
                                 @include('client.alerts.errors')
                                @include('client.alerts.success')
                                <form class="woocommerce-form-login" action="{{route('client.profile.update',$client['id'])}}" method="post"
                                    novalidate enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id=$client['id']}}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="name">Prenom&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$client['first_name']}}" />
                                            @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror</div>


                                        <div class="col-lg-6">
                                            <label for="name">Nom&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" name="last_name"  value="{{$client['first_name']}}" />
                                            @error('last_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                         </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="name">N° tele&nbsp;<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" name="phone" id="email"  value="{{$client['phone']}}"/>
                                            @error('phone')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                         <div class="col-lg-6">
                                            <label for="name">Email&nbsp;<span class="required">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email"  value="{{$client['email']}}"/>
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror </div>


                                    </div>
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <label for="name">Mot de pass&nbsp;<span class="required">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password"  />
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror</div>

                                            <div class="col-lg-6">
                                                <label for="name">Adresse&nbsp;<span class="required"></span></label>
                                                <input type="text" class="form-control" name="adresse" id="adresse"  value="{{$client['adresse']}}"/>
                                            @error('adresse')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror</div>
                                                <button type="submit" class="woocommerce-form-login__submit btn btn-primary rounded-0" style="margin-top: 3rem"  value="Log in">Modifier</button>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
