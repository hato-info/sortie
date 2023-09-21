
@extends('app')
 

@section('content')

 <!-- debut de modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ url('/classe/index') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer Une Classe :</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="classe_id" id="classe_id">
                    Vous êtes sûr de supprimer cet Classe !
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                
                        <button type="submit" class="btn btn-danger" id="deletemember">Oui Supprimer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Fin de modal -->

    @if ($message = Session::get('success'))

<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif

@if(Auth::check())

<div class="container">
        <div class="row align-items-start">
            <div class="col-4">
                <div class="card mt-3">     
                    <div class="card-body p-2 border-info">
                        <h4 class="text-center text-warning">Ajouter une Classe :</h4>
            
                        <form action="#" method="POST">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="classe" class="mt-2 mb-2">La Classe :</label>
                                <input type="text" class="form-control" id="classe" placeholder="Son Classe" name="classe" value="{{ old ('classe') }}">
                                @error('classe')
                                        <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
                        <button type="submit" class="btn btn-primary">Enregister</button>
                        <!-- <a class="btn btn-info rounded-pill" href="/">Annuler</a> -->
                </form>
                </div>
                </div>
            </div> 
            <div class="col-2"></div>
            <div class="col">
                <div>
                    <table class="table table-bordered table-striped table-hover m-0 text-center">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Classe</th>
                            <th width="200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($lesclasses as $index => $lesclasse)

                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $lesclasse->classe }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger deleteCategoryBtn" value="{{ $lesclasse->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $lesclasses->links() !!}
                </div>
            </div>

        </div>
</div>

@endif

@endsection
<footer class="card-footer">

</footer>

@section('scripts')


<script>
     $(document).ready(function() {
        $('.deleteCategoryBtn').click(function(e){
            e.preventDefault();

            var classe_id = $(this).val();
            $('#classe_id').val(classe_id);
            
            $('#deleteModal').modal('show');
        });
     });
     
</script>
@endsection


   