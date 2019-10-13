@extends("layouts.admin")
@section("content")
    <h1>Edit users</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{{($user->photo==""?'https://via.placeholder.com/150':$user->photo->file)}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            {!! Form::model($user,['method' => 'PATCH','action' => ['AdminUsersController@update',$user->id],'files' => true]) !!}
                <div class="form-group">
                    {{ Form::label('name' , 'name:') }}
                    {{ Form::text('name' , null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email' , 'email:') }}
                    {{ Form::email('email' , null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('is_active' , 'status:') }}
                    {{ Form::select('is_active' ,array(1 => 'Active',0 => 'Not active'), null , ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('role_id' , 'Role:') }}
                    {{ Form::select('role_id' , $roles ,null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password' , 'Password:') }}
                    {{ Form::password('password',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('photo_id' , 'Upload:') }}
                    {{ Form::file('photo_id',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Edit' , ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('includes.form_error')
        </div>
    </div>





@stop