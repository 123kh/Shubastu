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



<form  method="POST" action="{{route('create_secondary')}}" id="createpromotor_formid">
    @csrf
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 mx-auto" style="margin-top: -10%;">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-center">

                            <h5 class="mb-0 text-primary">Secondary Sales Entry</h5>
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
                            {{-- <option value="">@php
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
                                    <option value="">  @php
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

                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Company*</label>

                                <select class="multiple-select medicaleschme" data-placeholder="Choose anything" id="company" name="company">
                                    <option value="">Select</option>
                                    @foreach ($company as $companys)
                                    <option value="{{ $companys->id }}">
                                       {{$companys->Name}} </option>
                                    @endforeach

                                </select>

                            </div>

                            

                    

                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Select Stockist*</label>

                                <select class="multiple-select" data-placeholder="Choose anything" id="stockist" name="stockist">
                                    <option value="">Select</option>
                                    @foreach ($stockist as $stockists)
                                    <option value="{{ $stockists->id }}">
                                       {{$stockists->stockist}} </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-3">
                                <label for="inputFirstName" class="form-label">Sale Value*</label>
                                <input type="text" class="form-control" placeholder="Enter Sale value" id="medical" name="medical">
                            </div>

                        </div>

                       
            
<hr>


                            <div class="row g-2">

                                <div class="col-md-3">
                                    <label for="inputFirstName" class="form-label">Select Medicine*</label>
                            
                                    <select class="multiple-select medicines" data-placeholder="Choose anything" id="medicine" name="medicine">
                                        <option value="">Select</option>
                                        
                                    </select>
                            
                                </div>

                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Select Batch*</label>
                            
                                    <select class="multiple-select batchno" data-placeholder="Choose anything" id="batch" name="batch" >
                                        <option value="">Select</option>
                                        
                                    </select>
                            
                                </div>
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">Purchase Rate*</label>
                                    <input type="text" id="purchase" name="purchase"  class="form-control " placeholder="Purchase Rate"> 
                            
                                </div>
                                
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">QNTY*</label>
                                    <input type="text" class="form-control" id="qnty" name="qnty" placeholder="QNTY" >
                                </div>

                               
                              
                            
                                <div class="col-md-2">
                                    <label for="inputFirstName" class="form-label">QNTY*Purchase*</label>
                                    <input type="text" class="form-control" id="mpsqnty" name="mpsqnty" placeholder="QNTY*Purchase" >
                                </div>
                            
                                
                            
                                <div class="col-md-1" style="padding:8px" ><br>
                                    <button type="button" class="btn btn-primary px-3 add-row "><i class="fadeIn animated bx bx-plus"></i></button>
                                </div>
                            </div>
                            
                            

                    <div style="overflow-x: scroll;">
                        
                        <table style="width:100%; margin-top:4%;" id="table">
                            <tr align="center">
                                
                                <th width="20%">Medicine</th>
                                <th width="20%"> Batch No </th>
                                <th  width="20%">Purchase Rate</th>
                                <th width="20%">QTY</th>
                               
                                <th width="20%">QTY*Purchase</th>
                            
                            </tr>
                          

                           <tbody class="add_more">
                                            

                                        </tbody>
                          

							</div>

									   
					
							<div >
								<table class="table table-bordered " style="width:30%; margin-top:2%; margin-left:70%;" id="tablegrand">
									<thead class="t">
										<tr class="t">
											<th scope="col" class="t">Grand Total 1 : <input type="text" value="0" id="grandtotal1" name="grand_total1"></th>
											{{-- <th scope="col" class="t">Grand Total 2 : <input type="text" value="0" id="grandtotal2" name="grand_total2"></th> --}}
										</tr>
									</thead>
									
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

        <div class="overlay toggle-icon"></div>

    </div>
</form>




  

<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Secondary Sales Entry</h5>
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
                    <label for="inputFirstName" class="form-label">Select Stokist</label><br>
                    <label style="color: black;" id="previewstockist"></label>
                </div>

                <div class="col-md-2">
                    <label for="inputFirstName" class="form-label">Sale Value</label><br>
                    <label style="color: black;" id="previewmedical"></label>

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
$(".medicaleschme").on('change',function(){
    var company_id=$("#company").val()
   
    if(company_id==''){
        alert('please select company');
    }
         
                    $.ajax({
      url: "{{route('get_medicine_by_id')}}",
      type:'get',
      data:{ 
        company_id:company_id,
     
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

            })
                </script>

				<script>

$(document).ready(function()
{
	$(".medicines").on('change',function(){
var company_id=$("#company").val();

var medicine=$(this).val();

if(company_id==''){
	// alert('please select company');
}

if(medicine==''){
	// alert('please select medicine');
}	
			// alert(medicine);	
                $.ajax({
  url: "{{route('get_batch_no_by_id')}}",
  type:'get',
  data:{ 
    company_id:company_id,

	medicine:medicine//company me jo id hai jiski id hume chahiye wo leni hai
    },
  cache: false,
  success: function(result){
	console.log(result);
    $("#batch").empty();
    $("#batch").append(' <option value=""> Select </option>');
        $.each(result,function(a,b)
        {
            // console.log(b.id);
            $("#batch").append(' <option value="'+b.id+'">'+b.batch_no+'</option>');
			
        })

 
      
  }
});
            })
   


		})

	
       
                </script>
    

    {{-- <script>
        $(document).ready(function()
              {
          $(".medicines").on('change',function(){
      var company_id=$("#company").val()

      var medicine=$(this).val()
      
      if(company_id==''){
          // alert('please select company');
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
         
          medicine:medicine//company me jo id hai jiski id hume chahiye wo leni hai
          },
        cache: false,
        success: function(result){
          console.log(result);
      
          $("#batch").empty();
          $("#batch").append(' <option value=""> Select </option>');
              $.each(result,function(a,b)
              {
                  $("#batch").append(' <option value="'+b.id+'">'+b.batch_no+'</option>');
                  
              })
      
        
        }
      });
                  })
         
      
      
              })
      
    </script> --}}

<script>
    $(document).ready(function()
          {
      $("#qnty,#purchase").on('keyup',function(){
      
     var  qnty= parseFloat($('#qnty').val());
     var purchase = parseFloat($('#purchase').val());
    
    //  console.log(ptr);
      $('#mpsqnty').val(qnty * purchase); 

     
  
       } )
      });
    



          
     </script> 

<script>
    $(document).ready(function() {
        $("#year option").filter(function(index) { return $(this).text() == new Date().getFullYear(); }).attr('selected', 'selected').change();
        $(".add-row").click(function() {
            var medicine = $('#medicine option:selected').text();// .text()se text ayega id nh
            var batch = $('#batch option:selected').text();
            var qnty = $('#qnty').val();
            
            var purchase = $('#purchase').val();
            var mpsqnty = $('#mpsqnty').val();//qnty*purchase
            
            var grandtotal1 =$('#grandtotal1').val();
     
    
            var total1= parseFloat(grandtotal1)+parseFloat(mpsqnty)
           
            $('#grandtotal1').val(total1);
          
    
                var markup =
                    '<tr><td><input type="text" name="medicine[]" required="" style="border:none; width: 100%;" value="' + medicine + '"></td><td><input type="text" name="batch[]" style="border:none; width: 100%;" value="' +
                    batch +
                    '"></td><td><input type="text" name="purchase[]" required="" style="border:none; width: 100%" value="' + purchase + '"></td><td><input type="text" name="qnty[]" required="" style="border:none; width: 100%;" value="' +
                    qnty +
                    '"></td><td><input type="text" name="mpsqnty[]" required="" style="border:none; width: 100%;" value="' +
                    mpsqnty +
                    '"></td><td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="bx bx-trash me-0"></i></button></td></tr>';
    
    
                   
                $(".add_more").append(markup);
    
                $('#medicine').val('');
                $('#batch').val('');
                $('#qnty').val('');
                $('#purchase').val('');
                $('#mpsqnty').val('');
             
                // $('#total_amount').val('');
                // final_calculations();
        
            }
            
        )
        // Find and remove selected table rows
        $("tbody").delegate(".delete-row", "click", function() {
            var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
          
    
            var grandtotal1 =$('#grandtotal1').val();
            
    
            var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
           
            $('#grandtotal1').val(total1);
          
    
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

var stockist=$('#stockist').find(':selected').text();
$('#previewstockist').text(stockist);
var medical=$('#medical').val();
$('#previewmedical').text(medical);//sale value


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


})</script>
   
   <script>
    $(document).ready(function() {
        // alert(1);
    $(".batchno").on('change',function(){
        
        var batch=$("#batch").val()
        
        var medicine=$("#medicine").val()
        if(batch==''){
          
        }
        
        if(medicine==''){
            // alert('please select scheme');
        }
                
                      $.ajax({
          url: "{{route('get_purchase_by_id')}}",
          type:'get',
          data:{ 
            batch:batch,
            medicine:medicine
            },
          cache: false,
          success: function(result){
            console.log(result);
            $("#purchase").val(result.purchase);
           
           
          }
        });
                    })
                })
             
                    </script>
        
    
      @stop