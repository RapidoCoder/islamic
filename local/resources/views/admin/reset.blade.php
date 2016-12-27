
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>Islamic Administration System</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta content="" name="description"/>
  <meta content="" name="author"/>
  {!! Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')!!}
  {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')!!}
  {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')!!}
  {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')!!}
  <style type="text/css">
      .fa{
        margin-right: 10px !important;
    }
</style>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/password/reset') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-refresh"></i>Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Html::script('assets/global/plugins/jquery.min.js'); !!}
    {!! Html::script('assets/global/plugins/jquery-migrate.min.js'); !!}
    {!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js'); !!}
    {!! Html::script('assets/global/plugins/jquery.blockui.min.js'); !!}
    {!! Html::script('assets/global/plugins/uniform/jquery.uniform.min.js'); !!}
    {!! Html::script('assets/global/plugins/jquery.cokie.min.js'); !!}
</body>
</html>


