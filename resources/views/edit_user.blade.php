<?php
/**
 * Created by PhpStorm.
 * User: reden
 * Date: 3/3/16
 * Time: 2:44 PM
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update user profile</div>
                    <div class="panel-body">
                        {!! Form::model($user,
                                array(
                                    'url' => '/user/' . $user->id,
                                    'method' => 'PATCH',
                                    'class' => 'form-horizontal',
                                    'role' => 'form')) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name', array('class' => 'col-md-4 control-label')) !!}

                                <div class="col-md-6">
                                    {!! Form::text('name', old('name'), array('class' => 'form-control')) !!}

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'E-Mail Address', array('class' => 'col-md-4 control-label')) !!}

                                <div class="col-md-6">
                                    {!! Form::email('email', old('email'), array('class' => 'form-control')) !!}
                                    {{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}

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

                            <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">User Type</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="user_type">
                                        <option {{ $user->user_type == 'branch_admin' ? 'selected=selected' : '' }} value="branch_admin">Branch Administrator</option>
                                        <option {{ $user->user_type == 'staff' ? 'selected=selected' : '' }} value="staff">Staff</option>
                                    </select>

                                    @if ($errors->has('user_type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Active?</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="active">
                                        <option {{ $user->active == 0 ? 'selected=selected' : '' }} value="0">No</option>
                                        <option {{ $user->active == 1 ? 'selected=selected' : '' }} value="1">Yes</option>
                                    </select>

                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('branch_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Branch</label>

                                <div class="col-md-6">
                                    {!! Form::select('branch_id', $branches, $user->branch_id, ['class' => 'form-control']) !!}

                                    @if ($errors->has('branch_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection