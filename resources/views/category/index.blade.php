@extends ('dashboard.layouts.main')
@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        @include('stuffs.alerts')
          @include('reservations.nav')
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-primary">
                <tr>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Date Added</th>
                  <th> 
                    <a href="{{ route('category.create')}}" class="btn btn-primary" style="float:right; margin-right:5px;">Add New Category</a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->description}}</td>
                  <td>{{$category->created_at->toDayDateTimeString()}}</td>
                  <td>
                    <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                    </form>
                    <a href="{{ route('category.show', ['category' => $category->id]) }}" class="btn btn-primary" style="float:right; margin-right:5px;"><i class="material-icons">edit</i></a>
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection