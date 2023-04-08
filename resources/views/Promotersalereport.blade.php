

@extends('layout')
@section('content')


{{-- <style>
    table,
    th,
    td {
        border: 1px solid black;


    }

    .td {
        font-size: 5px;
    }
</style> --}}


<!--start page wrapper -->  



  {{-- <form  method="POST" action="{{route('create_promotor')}}" id="createpromotor_formid"> --}}
{{-- @csrf --}}


<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 mx-auto" style="margin-top: -10%;">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">

                            <h5 class="mb-0 text-primary">Promotor Sales Report</h5>
                        </div>
                        <hr>
                        @if(count($errors)>0)
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }} </li>
    @endforeach
</ul>
@endif
                  <div class="row g-2">
                    <form class="row g-2" action="{{route('promotorreport')}}" method="get">
                            <div class="col-md-1">
                                <label class="form-label">Year</label>
                                <select class="multiple-select" data-placeholder="Choose anything" id="year" name="year_id">
                              
                                 @foreach ($year as $years)
                                 <option value="{{ $years->id }}" 
                               >
                                 {{$years->year}} 
                             </option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label for="inputFirstName" class="form-label">Month</label>
                               
                                
                                <select class="multiple-select" data-placeholder="Choose anything" id="month" name="sale_of_month">
                                  
                                    <option>  @php
                                        $currentMonth = date('F');
                                   echo $currentMonth; // Output: February
                                   @endphp
                                  </option>
                                  
                                    <option value="January">January</option>
                                    <option value="February" >February</option>
                                    <option value="March" >March</option>
                                    <option value="April" >April</option>
                                    <option value="May" >May</option>
                                    <option value="June" >June</option>
                                    <option value="july" >july</option>
                                    <option value="August" >August</option>
                                    <option value="September" >September</option>
                                    <option value="October" >October</option>
                                    <option value="November" >November</option>
                                    <option value="December" >December</option>


                                </select>

                            </div>

                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Company</label>

                                <select class="multiple-select companystokist medicaleschme" data-placeholder="Choose anything" id="company" name="company" >
                                    <option value="">Select</option>
                                    @foreach ($company as $companys)
                                    <option value="{{ $companys->id }}">
                                       {{$companys->Name}} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Marketing</label>

                                <select class="multiple-select" data-placeholder="Choose anything" id="market" name="market">
                                    <option value="">Select</option>
                                    
                                </select>

                            </div>
                            

                                                       <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Doctor</label>

                                <select class="multiple-select" data-placeholder="Choose anything" id="doctor" name="doctor">
                                    <option value="">Select</option>
                                    @foreach ($doctor as $doctors)
                                    <option value="{{ $doctors->id }}">
                                       {{$doctors->allotted_dr_name}} </option>
                                    @endforeach

                                </select>

                            </div>

                     

							<div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Stockist</label>

                                <select class="multiple-select companystokist" data-placeholder="Choose anything" id="stockist" name="stockist">
                                    <option value="">Select</option>
                                    @foreach ($stockist as $stockists)
                                    <option value="{{ $stockists->id }}">
                                       {{$stockists->stockist}} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Medical</label>

                                <select class="multiple-select 
								" data-placeholder="Choose anything" id="medical" name="medical">
                                    <option value="">Select</option>
                                    @foreach ($medical as $medicals)
                                    <option value="{{ $medicals->id }}">
                                       {{$medicals->medical}} </option>
                                    @endforeach
                              </select>

                            </div>
                            <div class="row">
                                <div class="col-md-2" style="padding:8px" ><br>
                                    <button type="submit" class="btn btn-primary px-3"><i class="lni lni-search-alt" id="search"></i> Search</button>
                                </div>
                                <div class="col-md-2" style="padding:8px" ><br>
                                    <a href="{{route('promotorreport')}}"
                                        class="btn btn-primary px-3"><i class='bx bx-refresh me-0'></i> Refresh</a>
                                </div>
                            </div>
							
                           
                    </form>
                    </div>
					</div>
				</div>
					{{-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> --}}
					<hr/>
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Sr. No</th>
											<th>Year</th>
											<th>Month</th>
											<th>Company</th>
											<th>Marketing</th>
											<th>Doctor</th>
											<th>Stockist</th>
											<th>Medical</th>
											<th style="background-color: #fff">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($stocmed as $report)
											
									
										<tr>
											<td>{{$loop->index+1}}</td>
											<td>{{$report->year}}</td>
											<td>{{$report->sale_of_month}}</td>
											<td>{{$report->Name}}</td>
											<td>{{$report->name}}</td>
											<td>{{$report->allotted_dr_name}}</td>
											<td>{{$report->select_stokist_id}}</td>
											<td>{{$report->select_medical_id}}</td>
											<td style="background-color: #fff">
												{{-- <a href="{{route('promotersledestroy',$report->id)}}">
													<button type="button" class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button></a>  --}}
													<button type="button" class="btn btn-primary px-3 viewinfo" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"  id="{{$report->id}}" >show</button>
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
			<div class="col">
				<!-- Button trigger modal -->
				<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Large Modal</button> -->
				<!-- Modal -->
				<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Promoter Sale Report</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<div class="row g-2">
								<hr/>
								<div class="col-md-2">
									<label class="form-label">Year</label><br>
									<label style="color: black;" id="yearmodal"></label>
								
								</div>
								<div class="col-md-2">
									<label class="form-label">Month</label><br>
									<label style="color: black;" id="monthmodal"></label>
								
								</div>
								<div class="col-md-2">
									<label class="form-label">Company
										</label><br>
									<label style="color: black;" id="companymodal"></label>
								
								</div>
								<div class="col-md-2">
									<label for="inputFirstName" class="form-label">Marketing</label><br>
									<label style="color: black;" id="marketmodal"></label>
	
								</div>
	
	
								<div class="col-md-2">
									<label for="inputFirstName" class="form-label">
										Client</label><br>
									<label style="color: black;" id="doctorclientmodal"></label>
								
								</div>
							
								<div class="col-md-2">
									<label for="inputFirstName" class="form-label">Stockist</label><br>
									<label style="color: black;" id="stockistmodal"></label>
								</div>
								<div class="col-md-2">
									<label for="inputFirstName" class="form-label"> Medical</label><br>
									<label style="color: black;" id="medicalmodal"></label>
						
								</div>
	
								{{-- <div class="col-md-2">
									<label for="inputFirstName" class="form-label">Scheme % </label><br>
									<label style="color: black;" id="previewscheme"></label>
								</div> --}}
								</div>
	
								<div class="card">
									<div class="card-body">
										<table class="table mb-0 table-striped">
											<thead>
												
												<tr>
													
													<th scope="col">Medicine</th>
													<th scope="col">PTR</th>
													<th scope="col">MPS</th>
													<th scope="col">Quntity</th>
                                                    <th scope="col">Batch No</th>
													<th scope="col">Qnty_mps_total</th>
													<th scope="col">Qnty_ptr_total</th>
                                                    <th scope="col">Scheme</th>
													<th scope="col">Grand_total1</th>
													<th scope="col">Grand_total2</th>
												</tr>
											</thead>
											<tbody id="appendbody">
												
											
												
											</tbody>
										</table>
									</div>
								</div></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							
							</div>
							{{-- </form> --}}
						</div>
					</div>
				</div>
			</div>


@stop
@section('js')

<script>

       
$(document).ready(function(){
    // $('.viewinfo').on('click',function() {
        $( "table" ).delegate( ".viewinfo", "click", function() {// this delegate function is use for dynamic database ajax for every page
       
  var entry_id = $(this).attr('id');
//   alert(entry_id);
   $.ajax({
                                    url:'sale_entry_details',
                                    type:'get',
                                    data:{
                                            entry_id:entry_id
                                    },
                                    dataType:'json',
                                    success:function(data)
                                    {
                                        //  console.log(data);
                                        $("#appendbody").empty();
                                        // $("#date_of_invoice").text(data[0].date);
                                        $("#yearmodal").text(data['proreport'][0]['year']);//proreport jo controller me return response json me likha hai wo hai
                                        $("#monthmodal").text(data['proreport'][0]['sale_of_month']);
                                        $("#companymodal").text(data['proreport'][0]['Name']);
                                        $("#marketmodal").text(data['proreport'][0]['name']);
                                        $("#doctorclientmodal").text(data['proreport'][0]['allotted_dr_name']);
                                        $("#stockistmodal").text(data['proreport'][0]['select_stokist_id']);
                                        $("#medicalmodal").text(data['proreport'][0]['select_medical_id']);
                                        $.each(data.proreport,function(a,b) {
                                             $("#appendbody").append('<tr><td>'+b.select_medicine1+'</td><td>'+b.ptrs+'</td><td>'+b.mpss+'</td> <td>'+b.qntys+'</td><td>'+b.select_batchs+'</td><td>'+b.qnty_mps_total+'</td><td>'+b.qnty_ptr_total+'</td><td>'+b.select_scheme+'</td><td>'+b.grand_total1+'</td><td>'+b.grand_total2+'</td></tr>');
                                        });
                                     
                                    }

                            });
   }); 

   $("#company").on('change',function(){
                $.ajax({
  url: "{{route('market')}}",
  type:'get',
  data:{ 
    id:$(this).val()
    },
  cache: false,
  success: function(result){
    $("#market").empty();
    $("#market").append(' <option value=""> Select </option>');
        $.each(result,function(a,b)
        {
            $("#market").append(' <option value="'+b.id+'">'+b.name+'</option>');
        })
  }
});
            })
   
})
</script>

<script>
    $(document).ready(function(){
    
     $('#search').on('click',function() {
        // alert(1)
         var year = $("#year").val();
         var month = $("#month").val();
         var company = $("#company").val();
         var market = $("#market").val();
         var doctor = $("#doctor").val();
         var stockist = $("#stockist").val();
         var medical = $("#medical").val();
        //  var company = $("#company").val();
        //  var company = $("#company").val();
        //  var company = $("#company").val();
     
     })}
     )
     
 </script>


@stop 

    