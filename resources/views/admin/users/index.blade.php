@extends("layouts.admin")
@section("content")
 <h1>Users</h1>
 <table class="table">
     <thead>
       <tr>
         <th>Id</th>
         <th>Photo</th>
         <th>Name</th>
         <th>Email</th>
         <th>Role</th>
         <th>Status</th>
         <th>Created</th>
         <th>Updated</th>
       </tr>
     </thead>
     <tbody>

     @if($users)
         @foreach($users as $user)
           <tr>
             <td>{{$user->id}}</td>
             <td><img src="{{($user->photo==""?'https://via.placeholder.com/150':$user->photo->file)}}" alt="" class="img-responsive img-rounded" style="height:150px;width: 150px;">
             </td>
             <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
             <td>{{$user->email}}</td>
             <td>{{$user->role_id}}</td>
             <td>{{$user->is_active==1?"Active":"No active"}}</td>
             <td>{{$user->created_at}}</td>
             <td>{{$user->updated_at}}</td>
           </tr>
         @endforeach
     @endif

     </tbody>
   </table>
@stop
