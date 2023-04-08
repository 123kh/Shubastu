

@extends('layout')
@section('content')


<style>
    table,
    th,
    td {
        border: 1px solid black;


    }

    .td {
        font-size: 5px;
    }
</style>


<!--start page wrapper -->  



  <form  method="POST" action="{{route('create_promotor')}}" id="createpromotor_formid">
@csrf


<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 mx-auto" style="margin-top: -10%;">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">

                            <h5 class="mb-0 text-primary">Promotor Sales</h5>
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
                            <div class="col-md-1">
                                <label class="form-label">Year</label>
                                <select class="multiple-select" data-placeholder="Choose anything" id="year" name="year_id">
                                 {{-- <option>@php
                                    $currentYear = date('Y');
                               echo $currentYear; // Output: February
                               @endphp</option> --}}
                                 @foreach ($year as $years)
                                 <option value="{{ $years->id }}" 
                               >
                                 {{$years->year}} 
                             </option>
                                 @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Sale of Month*</label>
                               
                                
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
                                <label for="inputFirstName" class="form-label">Select Company*</label>

                                <select class="multiple-select companystokist medicaleschme" data-placeholder="Choose anything" id="company" name="company" >
                                    <option value="">Select</option>
                                    @foreach ($company as $companys)
                                    <option value="{{ $companys->id }}">
                                       {{$companys->Name}} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Marketing*</label>

                                <select class="multiple-select" data-placeholder="Choose anything" id="market" name="market">
                                    <option value="">Select</option>
                                    
                                </select>

                            </div>
                            

                                                       <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Doctor*</label>

                                <select class="multiple-select" data-placeholder="Choose anything" id="doctor" name="doctor">
                                    <option value="">Select</option>
                                    @foreach ($doctor as $doctors)
                                    <option value="{{ $doctors->id }}">
                                       {{$doctors->allotted_dr_name}} </option>
                                    @endforeach

                                </select>

                            </div>


                            {{-- <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Stokist*</label>

                                <select class="multiple-select companystokist" data-placeholder="Choose anything" id="stockist" name="stockist">
                                    <option value="">Select</option>
                                    @foreach ($stockist as $stockists)
                                    <option value="{{ $stockists->id }}">
                                       {{$stockists->stockist}} </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Medical*</label>

                                <select class="multiple-select 
								" data-placeholder="Choose anything" id="medical" name="medical">
                                    <option value="">Select</option>
                                    {{-- @foreach ($medical as $medicals)
                                    <option value="{{ $medicals->id }}">
                                       {{$medicals->medical}} </option>
                                    @endforeach --}}
                                {{-- </select>

                            </div> --}}
                     

                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label">Select Scheme % *</label>

                                 <input type="text" class="form-control" id="scheme" placeholder="scheme" name="sheme">

                            </div>
                    </div>




                            


<br>
                        <br>
<hr>
<br>
<div class="row g-2">
    <div class="col-md-3">
        <label for="inputFirstName" class="form-label">Select Stokist*</label>

        <select class="multiple-select companystokist" data-placeholder="Choose anything" id="stockist" name="stockist">
            <option value="">Select</option>
            @foreach ($stockist as $stockists)
            <option value="{{ $stockists->id }}">
               {{$stockists->stockist}} </option>
            @endforeach
        </select>

    </div>

    <div class="col-md-3">
        <label for="inputFirstName" class="form-label">Select Medical*</label>

        <select class="multiple-select 
        " data-placeholder="Choose anything" id="medical" name="medical">
            <option value="">Select</option>
            {{-- @foreach ($medical as $medicals)
            <option value="{{ $medicals->id }}">
               {{$medicals->medical}} </option>
            @endforeach --}}
        </select>

    </div>

    <div class="col-md-3">
        <label for="inputFirstName" class="form-label">Select Medicine*</label>

        <select class="multiple-select medicines" data-placeholder="Choose anything" id="medicine" >
            <option value="">Select</option>
            
        </select>

    </div>
    <div class="col-md-3">
        <label for="inputFirstName" class="form-label">Select Batch*</label>

        
        <input type="text" class="form-control" id="batch" placeholder="batch" name="batch">
       

    </div>
    
    <div class="col-md-2">
        <label for="inputFirstName" class="form-label">PTR*</label>
        {{-- <input type="text" class="form-control" id="ptr1" placeholder="PTR" name="ptr1"> --}}
        <input type="text" id="ptr1" class="form-control "> 
   
    </div>
    <div class="col-md-2">
        <label for="inputFirstName" class="form-label">M+P+S*</label>
        {{-- <input type="text" class="form-control" id="mps1" placeholder="M+P+S" name="mps1"> --}}
        <input type="text" id="mps1"  class="form-control "> 

    </div>


    <div class="col-md-2">
        <label for="inputFirstName" class="form-label">QNTY*</label>
        <input type="text" class="form-control" id="qnty" placeholder="QNTY" >
    </div>

   

    <div class="col-md-2">
        <label for="inputFirstName" class="form-label">QNTY*(M+P+S) Total 1*</label>
        <input type="text" class="form-control" id="mpsqnty" placeholder="QNTY*(M+P+S) Total 1" >
    </div>

    <div class="col-md-2">
        <label for="inputFirstName" class="form-label">(PTR*QNTY) Total 2*</label>
        <input type="text" class="form-control" id="ptrqnty" placeholder="(PTR*QNTY) Total 2" >
    </div>

    <div class="col-md-2" style="padding:8px" ><br>
        <button type="button" class="btn btn-primary px-3 add-row "><i class="fadeIn animated bx bx-plus"></i>Add </button>
    </div>
</div>


                            <div style="overflow-x: scroll;">
								
								<table style="width:100%; margin-top:4%;" id="table">
									<tr align="center">
										{{-- <th width="5%">Sr. No.</th> --}}
                                        <th width="">Stokist</th>
                                        <th width="10%">Medical</th>
										<th width="10%">Medicine</th>
                                        <th width="10%">Batch No</th>
										<th width="10%"> PTR </th>
										<th width="10%">M+P+S</th>
										<th width="10%">QNTY</th>
										{{-- <th width="10%">Batch No</th> --}}
										<th width="10%">QNTY*(M+P+S)<br> Total 1  </th>
										<th width="10%">(PTR*QNTY)<br> Total 2  </th>
                                        <th width="5%">Action</th>
									</tr>
									{{-- <tr align="center" id="scheme_data"> --}}
                                        <tbody class="add_more">
                                            

                                        </tbody>
                          

							</div>

									   
					
							<div >
								<table class="table table-bordered " style="width:30%; margin-top:2%; margin-left:70%;" id="tablegrand">
									<thead class="t">
										<tr class="t">
											<th scope="col" class="t">Grand Total 1 : <input type="text" value="0" id="grandtotal1" name="grand_total1"></th>
											<th scope="col" class="t">Grand Total 2 : <input type="text" value="0" id="grandtotal2" name="grand_total2"></th>
										</tr>
									</thead>
									{{-- <tbody >
										

									</tbody> --}}
								</table>
							</div>
								
							</div>
							<div class="col-md-12">
								<div class="col-md-2" style="padding:8px; text-align: center; margin-left: 43%;" >
									<button type="button" class="btn btn-primary px-3" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" id="preview"><i class="fadeIn animated bx bx-plus"></i> Preview </button>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!--end page wrapper -->
				<!--start overlay-->
				<div class="overlay toggle-icon"></div>

			</div>
        </form>

		


			<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Medicine Sales Entry</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">	
                        <div class="row g-2">

							<div class="col-md-2">
								<label class="form-label">Year</label><br>
								<label style="color: black;" id="previewyear"></label>
							
							</div>
							<div class="col-md-2">
								<label for="inputFirstName" class="form-label">Sale of Month</label><br>
								<label style="color: black;" id="previewmonth"></label>

							</div>

							<div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Company</label><br>
								<label style="color: black;" id="previewcompany"></label>
					
							</div>

							<div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Marketing</label><br>
								<label style="color: black;" id="previewmarketing"></label>
							
							</div>
						
							<div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Doctor</label><br>
								<label style="color: black;" id="previewdoctor"></label>
							</div>


							{{-- <div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Stokist</label><br>
								<label style="color: black;" id="previewstockist"></label>
							</div>

							<div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Medical</label><br>
								<label style="color: black;" id="previewmedical"></label>

							</div> --}}
                            <div class="col-md-2">
								<label for="inputFirstName" class="form-label">Select Scheme % </label><br>
								<label style="color: black;" id="previewscheme"></label>
							</div>
                        </div>


							<div style="overflow-x: scroll;">
								<div id="previewtable">

                                </div>
								{{-- <table style="width:100%; margin-top:4%;" id="previewtable">
									<tr align="center">
										<th width="5%">Sr. No.</th>
										<th width="10%">Medicine</th>
										<th width="10%"> PTR </th>
										<th width="10%">M+P+S</th>
										<th width="10%">QTY</th>
										<th width="10%">Batch No</th>
										<th width="10%">ONTY*(M+P+S)<br> Total 1  </th>
										<th width="10%">(PTR*QNTY)<br> Total 2  </th>
									</tr>
								
								  </table> --}}
                                  <div id="previewgrandtable">
                                    {{-- <table class="table table-bordered " style="width:30%; margin-top:2%; margin-left:50%;" id="previewgrandtable">
                                        <thead class="t">
                                            <tr class="t">
                                                <th scope="col" class="t ">Grand Total 1 : <input type="text" value="0" id="previewgrandtotal1"></th>
                                                <th scope="col" class="t">Grand Total 2 : <input type="text" value="0" id="previewgrandtotal2"></th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            
                                        </tbody>
                                    </table> --}}
                                </div>
                                    
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
							<button type="button" class="btn btn-primary" id="confirm">Confirm</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
  <!--  -->


@stop
@section('js')

<script>

        $(document).ready(function()
        {
            $("#grandtotal1").val(0);
            $("#grandtotal2").val(0);
            $("#company").on('change',function(){
                $.ajax({
  url: "{{route('get_market_by_id')}}",
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
   
    

//get medical from company and stokist
        
            $(".companystokist").on('change',function(){
                let doctor_id=$("#doctor").val();
                let stockist_id=$("#stockist").val(); 
                if(doctor_id && stockist_id){
                    $.ajax({
  url: "{{route('get_medical_by_id')}}",
  type:'get',
  data:{ 
    doctor_id:doctor_id,
    stockist_id:stockist_id
    },
  cache: false,
  success: function(result){
    console.log(stockist_id);
    $("#medical").empty();
    $("#medical").append(' <option value=""> Select </option>');
        $.each(result,function(a,b)
        {
            $("#medical").append(' <option value="'+b.id+'">'+b.medical+'</option>');
        })
  }
});
                }

           
            })
        })
        



      
            $(".medicaleschme").on('change',function(){
var company_id=$("#company").val()
var scheme=$("#scheme").val()
if(company_id==''){
	// alert('please select company');
}


if(scheme==''){
	// alert('please select scheme');
}
		
				
                $.ajax({
  url: "{{route('get_medicine_by_id')}}",
  type:'get',
  data:{ 
    company_id:company_id,
	scheme:scheme//company me jo id hai jiski id hume chahiye wo leni hai
    },
  cache: false,
  success: function(result){
	console.log(result);
    $("#medicine").empty();
    $("#medicine").append(' <option value=""> Select </option>');
        $.each(result,function(a,b)
        {
            $("#medicine").append(' <option value="'+b.id+'">'+b.medicine+'</option>');
			
        })
  }
});
            })
   
			</script>



				<script>
  $(document).ready(function()
        {
	$(".medicines").on('change',function(){
        
var company_id=$("#company").val();
var scheme=$("#scheme").val();
var medicine=$(this).val();
// alert(company_id);
// alert(scheme);
// alert(medicine);

if(company_id==''){
	// alert('please select company');
}


if(scheme==''){
	// alert('please select scheme');
}
if(medicine==''){
	// alert('please select medicine');
}	
			// alert(medicine);	
                $.ajax({
  url: "{{route('get_ptrmarketing_by_id')}}",
  type:'get',
  data:{ 
    company_id:company_id,
	scheme:scheme,
	medicine:medicine//company me jo id hai jiski id hume chahiye wo leni hai
    },
  cache: false,
  success: function(result){
	console.log(result);
    $("#ptr1").val(result.ptr);
    $("#mps1").val(result.marketing_promotion_scheme);
    $("#batch").val(result.batch_no);


    // $("#batch").empty();
    // $("#batch").append(' <option value=""> Select </option>');
    //     $.each(result,function(a,b)
    //     {
    //         $("#batch").append(' <option value="'+b.id+'">'+b.batch_no+'</option>');
			
    //     })

 
      
  }
});
            })
   


		})

	


    </script>





{{-- <script>
    $(document).ready(function()
          {
      $("#medicine").on('change',function(){
  var company_id=$("#company").val()
  var scheme=$("#scheme").val()
  var medicine=$(this).val()
  
  if(company_id==''){
      // alert('please select company');
  }
  
  
  if(scheme==''){
      // alert('please select scheme');
  }
  if(medicine==''){
      // alert('please select medicine');
  }	
              // alert(medicine);	
                  $.ajax({
    url: "{{route('get_batch_by_id')}}",
    type:'get',
    data:{ 
      company_id:company_id,
      scheme:scheme,
      medicine:medicine
      },
    cache: false,
    success: function(result){
      console.log(result);
    $("#batch").val(result.batch_no);
    //   $("#batch").empty();
    //   $("#batch").append(' <option value=""> Select </option>');
    //       $.each(result,function(a,b)
    //       {
    //           $("#batch").append(' <option value="'+b.id+'">'+b.batch_no+'</option>');
              
    //       })
  
    
    }
  });
              })
     
  
  
          })
  
</script> --}}
  
<script>
    $(document).ready(function()
          {
      $("#qnty,#mps1,#ptr1").on('keyup',function(){
      
     var  qnty= parseFloat($('#qnty').val());
     var mps = parseFloat($('#mps1').val());
     var ptr =parseFloat($('#ptr1').val());
    //  console.log(ptr);
      $('#mpsqnty').val(qnty * mps); 
      $('#ptrqnty').val(qnty * ptr); 
     
  
       } )
      });
      
     </script> 



<script>
$(document).ready(function() {

    $(".add-row").click(function() {
        var stockist = $('#stockist option:selected').text();
        var medical = $('#medical option:selected').text();
        var medicine = $('#medicine option:selected').text();// .text()se text ayega id nh
        var ptr1 = $('#ptr1').val();
        var mps1 = $('#mps1').val();
        var qnty = $('#qnty').val();
        var batch = $('#batch').val();
        var mpsqnty = $('#mpsqnty').val();
        var ptrqnty = $('#ptrqnty').val();
        
        var grandtotal1 =$('#grandtotal1').val();
        var grandtotal2 =$('#grandtotal2').val();

        var total1= parseFloat(grandtotal1)+parseFloat(mpsqnty)
        var total2= parseFloat(grandtotal2)+parseFloat(ptrqnty)
        $('#grandtotal1').val(total1);
        $('#grandtotal2').val(total2);

            var markup =

                '<tr><td><input type="text" name="stockist[]" required="" style="border:none; width: 100%;" value="' + stockist + '"></td><td><input type="text" name="medical[]" required="" style="border:none; width: 100%;" value="' + medical + '"></td><td><input type="text" name="medicine[]" required="" style="border:none; width: 100%;" value="' + medicine + '"></td><td><input type="text" name="batch[]" style="border:none; width: 100%;" value="' +
                batch +
                '"></td><td><input type="text" name="ptr1[]" required="" style="border:none; width: 100%" value="' + ptr1 + '"></td><td><input type="text" name="mps1[]" required="" style="border:none; width: 100%;" value="' +
                mps1 +
                '"></td><td><input type="text" name="qnty[]" required="" style="border:none; width: 100%;" value="' +
                qnty +
                '"></td><td><input type="text" name="mpsqnty[]" required="" style="border:none; width: 100%;" value="' +
                mpsqnty +
                '"></td><td><input type="text" name="ptrqnty[]" required="" style="border:none; width: 100%;" value="' +
                ptrqnty +
                '"></i></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';


               
            $(".add_more").append(markup);
  
           $('#stockist').val('');
           $('#medical').val('');
           $('#medicine').val('');
          
            $('#batch').val('');
            $('#ptr1').val('');
            $('#mps1').val('');
            $('#qnty').val('');
         
            $('#mpsqnty').val('');
            $('#ptrqnty').val('');
            // $('#total_amount').val('');
            // final_calculations();
    
        }
        
    )
    // Find and remove selected table rows
    $("tbody").delegate(".delete-row", "click", function() {
        var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
        var ptrqnty=$(this).parents("tr").find('input[name="ptrqnty[]"]').val()

        var grandtotal1 =$('#grandtotal1').val();
        var grandtotal2 =$('#grandtotal2').val();

        var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
        var total2= parseFloat(grandtotal2)-parseFloat(ptrqnty)
        $('#grandtotal1').val(total1);
        $('#grandtotal2').val(total2);

        $(this).parents("tr").remove();

        // final_calculations();


    });

   
    $("#preview").on('click',function(){
var year=$('#year').find(':selected').text();
$('#previewyear').text(year);
var month=$('#month').find(':selected').text();
$('#previewmonth').text(month);
var company=$('#company').find(':selected').text();
$('#previewcompany').text(company);
var market=$('#market').find(':selected').text();
$('#previewmarketing').text(market);
var doctor=$('#doctor').find(':selected').text();
$('#previewdoctor').text(doctor);
// var stockist=$('#stockist').find(':selected').text();
// $('#previewstockist').text(stockist);
// var medical=$('#medical').find(':selected').text();
$('#previewmedical').text(medical);
var scheme=$('#scheme').val();
$('#previewscheme').text(scheme);

// var table=$('#table').find().text();
// $('#previewtable').text(table);
$("#previewtable").empty();
var table=$("#table").clone();
$("#previewtable").append(table);

$("#previewgrandtable").empty();
var table2=$("#tablegrand").clone();
$("#previewgrandtable").append(table2);
      
    })

    $("#confirm").on('click',function(){
        $("#previewtable").empty();// array me data repeat hora tha islye preview table ko empty kiya
        $("#previewgrandtable").empty();
        $("#createpromotor_formid").submit();
    })


})
</script>


<script>

    $(document).ready(function()
    {
        $("#year option").filter(function(index) { return $(this).text() == new Date().getFullYear(); }).attr('selected', 'selected').change();// current date show hone ke liye 

        $("#doctor").on('change',function(){ // dr ke onchnge pe scheme milne ke liye
            $.ajax({
url: "{{route('get_scheme_by_id')}}",
type:'get',
data:{ 
doctor_id:$(this).val()
},
cache: false,
success: function(result){
    console.log(result);
    $("#scheme").val(result.Scheme);

}
});
        })
    })
</script>




@stop 

    