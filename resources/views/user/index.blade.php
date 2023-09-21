
@extends('app')


@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

@if(Auth::check())
<div class="card">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
               
                <div class="col">
                    <input type="text" class="form-control" id="cherche" placeholder="Rechercher ici..." name="q" value="{{ old('cherche')}}">
                </div>
                <div class="col">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </div>
                <div class="col">   
                    <a class="btn btn-success" href="{{ url('register') }}">Ajouter un Utilisateur</a>
                </div>
            </form>   
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-bordered table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nom</th>
                    <th>User name</th>
                    <th>E-mail</th>
                    <th>Rolle</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $index => $user)

                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rolle }}</td>
                    
                    <td>

                        <form action="{{ url('user/'. $user->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary" href="#">Modifier</a>
                            @if(Auth::check())
                            @if(Auth::user()->rolle == 'admin')
                                <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $user->user_id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                            @endif
                            @endif  
                        </form>
                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
    <footer class="card-footer">
    
    </footer>
</div>
@endif
@endsection

 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="{{ url('user/') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Un Utilisateur :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="user_delete_id" id="user_id">
                    vous êtes sûr de supprimer cet utilisateur
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
                        <button type="submit" class="btn btn-danger" id="deletemember">Yes Delete</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    <!-- Fin de modal -->
@section('scripts')
<script>
     $(document).ready(function() {
        $('.deleteCategoryBtn').click(function(e){
            e.preventDefault();

            var $user_id = $(this).val();
            $('#user_id').val($user_id);

            $('#deleteModal').modal('show');
        });
     });
</script>
@endsection
