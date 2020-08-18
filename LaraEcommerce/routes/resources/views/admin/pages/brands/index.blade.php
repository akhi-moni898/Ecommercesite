@extends('admin.layouts.master')

@section('content')


   <div class="main-panel">
              <div class="content-wrapper">
              <div class="card">
                 <div class="card-header">
                  <center>Manage brand</center> 
                 </div>
                  <div class="card-body">

                    @include('admin.partials.messages')
                     <table class="table table-striped table-hover">
                         <tr>
                           <th>#</th>
                           <th> brand Name</th>
                        
                            <th> brand Image</th>
                         
                           <th>Action</th>

                         </tr>

                       
                           
                             @foreach ($brands as $brand)
                               <tr>
                              <td>#</td>
                               <td>{{$brand->name}}</td>
                                

                                <td>    

                           <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100">

                                </td>
                               
                                 <td>
                                  <a href="{{route('admin.pages.brands.edit',$brand->id)}}" class="btn btn-success">Edit</a>

                                 <a href="#deleteModal{{ $brand->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                           <div class="modal fade" id="deleteModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <p>Are you sure to delete</p>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action ="{!!route('admin.brand.delete',$brand->id)!!}" method="post">
                                      {{ csrf_field() }}
                                      <button type="submit" class="btn btn-danger" >Delete</button>

                                    </form>
                                      
                                  </div>
                                </div>
                              </div>
                            </div>

                                 </td>
                                </tr>
                              @endforeach

                        
                     </table>
                     
                  </div>

              </div>
              </div>
              </div>

@endsection