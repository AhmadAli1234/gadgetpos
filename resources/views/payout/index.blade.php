@extends('layouts.app')
@section('title', 'Payouts')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  @if(Session::has('success'))
    
    <div class="alert alert-success" style="width:250px;" id="success">
        
            {{ Session::get('success') }}
            @php session()->forget('success');  @endphp
        
    </div>
    
@endif
    <h1>{{'Payout'}}</h1>



</section>

<button class="btn btn-primary pull-right" data-target="#modalPayout" data-toggle="modal" style="margin-right: 10px;"><i class="fa fa-plus"></i>Add</button>

<div id="modalPayout" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="POST" action="{{ url('/payouts/store') }}">
        {{csrf_field()}}
      <div class="modal-header" style="background: dodgerblue;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:white;">Add Payout</h4>
      </div>
      <div class="modal-body">
        <input class="form-control" id="borrowername" placeholder="Payee" name="borrowername"  type="text" required="required" style="margin-bottom:6px;">
  
        <input class="form-control" style="margin-bottom:6px;" id="amount" name="amount" type="number"  placeholder="Enter amount" required>

       <textarea class="form-control" required="required" placeholder="Enter Detail" name="detail"></textarea>
       <!--  <div class="row">
          <div class="col-sm-6">
        <input type="password" placeholder="Enter old Password" class="form-control" name="oldpass">
      </div>
        <input type="password" placeholder="Enter new Password" class="form-control" name="resetpass">
        <input type="password" placeholder="Confirm Password" class="form-control" name="confirpassword">
      </div> -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btnSub">Pay</button>
      </div>
    </form>
    </div>
</div>
  </div>
<!-- Main content -->
<section class="content" style="margin-top:25px;margin-right: 1px;">
    @component('components.widget', ['class' => 'box-primary'])

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="clock_table">
            <thead>
                <tr>
                  
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Current status</th>
                    <th>Description</th>
                    <th>Staff Name</th>

                    <!--<th>@lang('messages.action')</th>-->
                </tr>
              </thead>
            <tbody>
              @foreach($objPayouts as $payout)
               <tr>
              <td>{{$payout->date_time}}</td>
              <td>{{$payout->person_name}}</td>
              <td>{{$payout->amount}}</td>
        <td>@if($payout->cash_status==0) <span style="padding: 3px;border-radius: 4px; color: white;background: orange;">Payout</span> @else <span style="border-radius: 4px; color: white;padding: 3px;background: limegreen;">Returned</span>  @endif</td>
              <td>{{$payout->detail}}</td>
              
              <td>
                {{$payout->staff_name}}
                </td>
               </tr>

<div id="editModal_{{$payout->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form method="POST" action="#">
        {{csrf_field()}}
        <input type="hidden" name="updid" value="{{$payout->id}}">
      <div class="modal-header" style="background: dodgerblue;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:white;">Edit Payout</h4>
      </div>
      <div class="modal-body">
        <input class="form-control" id="borrowername" placeholder="Enter borrower name" name="updborrowername" value="{{$payout->person_name}}"  type="text" required="required" style="margin-bottom:6px;">
  
        <input class="form-control" style="margin-bottom:6px;" id="updamount" name="updamount" value="{{$payout->amount}}" type="number"  placeholder="Enter amount" required>

       <textarea class="form-control" required="required" placeholder="Enter Detail" name="upddetail">{{$payout->detail}}</textarea>
       <!--  <div class="row">
          <div class="col-sm-6">
        <input type="password" placeholder="Enter old Password" class="form-control" name="oldpass">
      </div>
        <input type="password" placeholder="Enter new Password" class="form-control" name="resetpass">
        <input type="password" placeholder="Confirm Password" class="form-control" name="confirpassword">
      </div> -->
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="btnSub">Submit</button>
      </div>
    </form>
    </div>
</div>
  </div>

              @endforeach
         
            </tbody>
 
        </table>
    </div>
    @endcomponent
</section>
<!-- /.content -->
@php  $sesVar=0; @endphp
@if(Session::has('printContent'))
<div class="row" id="recElement">
  @php  $sesVar=session('printContent');
  session()->forget('printContent');
  $obLoc=DB::table('business_locations')->first();
  @endphp
     @component('components.widget', ['title' =>''])
     <h4 style="margin-left:3px;">Payout</h4>
   <center>  <img src="{{URL::asset('uploads/Imaglogo2-1.png')}}" style="width:70px;height:60px;">
    <b><p align="center">{{$obLoc->name}}</p>
    <p align="center">{{$obLoc->landmark}}</p> </b>
    <p align="center">{{$obLoc->state}},{{$obLoc->country}}</p>
    <p align="center">{{$obLoc->mobile}}</p>
     </center>
       <hr>
        <div class="col-xs-12" style="margin-left:50px;">

                <table class="table table-striped">
                   
                   <thead>
                <tr>
                  
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Detail</th>
                    <th>Staff</th>

                
                </tr>
              </thead>
            <tbody>
              @foreach($objPayouts->reverse() as $payout)
              @if($loop->iteration==1)
               <tr>
              <td>{{$payout->date_time}}</td>
              <td>{{$payout->person_name}}</td>
              <td>{{$payout->amount}}</td>
              <td>@if($payout->cash_status==0) <span style="padding: 3px;border-radius: 4px; color: white;background: orange;">Payout</span> @else <span style="border-radius: 4px; color: white;padding: 3px;background: limegreen;">Returned</span>  @endif</td>
              <td>{{$payout->detail}}</td>
              
              <td>
                {{$payout->staff_name}}
                </td>
               </tr>
               @endif
               @endforeach
                </tbody>
                </table>
            </div>
            @endcomponent
           
        </div>
     
 @endif
 <button id="printdivC" style="color: #ECF0F5;
    border: #ECF0F5;
    background: #ECF0F5" onclick="printContent()"></button>
@endsection

@section('javascript')
    <script src="{{ asset('js/report.js?v=' . $asset_v) }}"></script>
    <script type="text/javascript">
        $(document).ready( function () {
          
          
    $('#clock_table').DataTable();
     $("#success").fadeOut(5200);
    
     
});
var sesVar="{{$sesVar}}";
if(sesVar!=='0'){
  //alert(typeof(sesVar))
 $('#printdivC').click();
}
//alert(sesVar)

function printContent(){
  //alert(3);
var restorepage = $('body').html();
var printcontent = $('#recElement').clone();
$('body').empty().html(printcontent);
window.print();
setTimeout(function(){ location.reload(); }, 9000);
//
//$('body').html(restorepage);
 

//location.reload();
}

function funMoneyBack(id,cash_register_id) {
          if(confirm('Do you want to Money Back?')){
            $.get("#",{id:id,cash_register_id:cash_register_id},function(dt){
              location.reload()
            });
          }
          // body...
}
    </script>
<?php //if(Session::has('printcontent')) 222 ?>
   
@endsection