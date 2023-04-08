@extends('layout')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-md-12 mx-auto" style="margin-top: -10%;">
						<div class="card">
							<div class="card-body">
								<div class="card-title d-flex align-items-center">
								
									<h5 class="mb-0 text-primary">Add Stockist</h5>
								</div>
								<hr>
								<form class="row g-2" method="post" action="{{route('update-stockist')}}">
									{{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$stockedit->id}}">
									<div class="col-md-2"></div>
									
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Select City*</label>
											<select class="multiple-select" data-placeholder="Choose anything" name="city">
                                            <option value="select">Select</option>
                                                    
                                                    @foreach ($city as $citys)
                                                           <option value="{{$citys->id}}" @if($stockedit->city_id==$citys->id) selected @endif >{{$citys->city}}</option>
                                                    @endforeach
                                        </select>                                          
														
									</div>

									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Add Stockist*</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Enter Stockist" name="stockist" value="{{$stockedit->stockist}}">
									</div>

						
									<div class="col-md-3" style="margin-top:3.4%;" >
								       <button type="submit" class="btn btn-primary px-3"><i class="fadeIn animated bx bx-plus"></i> Update  </button>
									</div>
								</form>
		
							</div>
		
						</div>
					</div>
				</div>
				

				
				<!--end page wrapper -->
				<!--start overlay-->
				<div class="overlay toggle-icon"></div>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Sr. No.</th>
										<th>City</th>  
										<th>Stockist</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($stock as $citys)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$citys->city}}</td>
										<td>{{$citys->stockist}}</td>
										
										<td><a href="{{route('edit-stockist',$citys->id)}}">

											<button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
											<a href="{{route('destroy-stockist',$citys->id)}}">
											 <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a> 
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
		<!--end page wrapper -->
        @stop