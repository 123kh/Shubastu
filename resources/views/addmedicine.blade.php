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
								
									<h5 class="mb-0 text-primary">Add Medicine</h5>
								</div>
								<hr>

								@if(count($errors)>0)
								<ul class="alert alert-danger">
									@foreach($errors->all() as $error)
									<li>{{ $error }} </li>
									@endforeach
								</ul>
								@endif
								
								<form class="row g-2" method="post" action="{{route('create_medicine')}}">
                                    {{csrf_field()}}
									<div class="col-md-2"></div>
									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Select Company*</label>
								
											<select class="multiple-select" data-placeholder="Choose anything" name="select_company_id" >
                                            <option value="">Select</option>
                                                @foreach ($add as $adds)
                                         <option value="{{ $adds->id }}">
                                            {{$adds->Name}} </option>
                                         @endforeach
										
											</select>
										
										
											</select>

									</div>

									<div class="col-md-3">
										<label for="inputFirstName" class="form-label">Medicine*</label>
										<input type="text" class="form-control" id="inputFirstName" placeholder="Medicine" name="medicine">
									</div>

						
									<div class="col-md-3" style="margin-top:3.4%;" >
								       <button type="submit" class="btn btn-primary px-3"><i class="fadeIn animated bx bx-plus"></i> Add  </button>
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
										<th>Company</th>  
										<th>Medicine</th> 
										<th style="background-color: #fff">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($med as $medi)
									<tr>
										<td>{{$loop->index+1}}</td>
										<td>{{$medi->Name}}</td>
										<td>{{$medi->medicine}}</td>
										
										<td style="background-color: #fff"><a href="{{route('edit-medicine',$medi->id)}}">
                                            <button type="button" class="btn1 btn-outline-success"><i class='bx bx-edit-alt me-0'></i></button></a>
                                            <a href="{{route('destroy-addedmedicine',$medi->id)}}">
                                             <button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button> </a>
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