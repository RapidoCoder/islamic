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
  {!! Html::style('assets/global/plugins/uniform/css/uniform.default.css')!!}
  {!! Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')!!}
  {!! Html::style('assets/global/plugins/select2/select2.css')!!}
  {!! Html::style('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')!!}
  {!! Html::style('assets/admin/layout/css/custom.css')!!}
  <style type="text/css">
    .fa{
      margin-right: 10px !important;
    }
  </style>
  <body class="admin-email">
    <!-- Main Content -->

    <div class="container">
      <div class="row" id="password_reset">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">Reset Password</div>
            <div class="panel-body">
              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

              <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">E-Mail Address</label>

                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
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


    </html>

