@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            <div class="row">
                <div id="gif-wrap" class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                    <div class="row w-100">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-center p-5">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="h6 control-label mb-2">Adresse email</label>
                                            <input id="email" type="email" class="form-control text-center" name="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="h6 control-label mb-2">Mot de passe</label>


                                            <input id="password" type="password" class="form-control text-center" name="password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Se souvenir de moi
                                                </label>
                                            </div>
                                    </div>

                                    <div class="form-group">
                                            <button type="submit" class="btn btn-primary text-uppercase">
                                                <i class="fa fa-btn fa-sign-in"></i> Se connecter
                                            </button>

                                    </div>
                                    <div class="mt-4 d-block">
                                        <a class="auth-link text-muted text-small" href="{{ url('/password/reset') }}">Mot de passe oublié ?</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>





@endsection
