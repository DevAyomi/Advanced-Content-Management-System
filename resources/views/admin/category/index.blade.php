<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category<b> </b>
        </h2>
    </x-slot>
    <div class="container">
    <div class="row">
    <div class="col-md-8">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{  session('success')  }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                @endif
              <div class="card-header">All Ctegories</div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">S.N</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>

                         <!--  @php($i = 1) -->
                          @foreach($categories as $category)
                          <tr>
                            <td>{{$categories->firstItem()+$loop->index}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->user->name}}</td>
                            <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                          </tr>
                        </tbody>

                        @endforeach
                      </table>

                      {{ $categories->links()}}

                   </div>
                 </div>
               </div>
            </div>


            <!--Second Column starts here--->
            <div class="col-md-4 py-12">
               <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="card-header">Add Category</div>
                <!--Form starts here--->
                <div class="p-2">
                  <form action = "{{route('store.category')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <!--Display Error Here--->
                      @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
                </div>
            </div>
          </div>

        </div>
    </div>
</x-app-layout>
