<!-- default value -->
@php
    $go_back_url = action('SellPosController@index');
    $transaction_sub_type = '';
    $view_suspended_sell_url = action('SellController@index').'?suspended=1';
    $pos_redirect_url = action('SellPosController@create');
@endphp

@if(!empty($pos_module_data))
    @foreach($pos_module_data as $key => $value)
        @php
            if(!empty($value['go_back_url'])) {
                $go_back_url = $value['go_back_url'];
            }

            if(!empty($value['transaction_sub_type'])) {
                $transaction_sub_type = $value['transaction_sub_type'];
                $view_suspended_sell_url .= '&transaction_sub_type='.$transaction_sub_type;
                $pos_redirect_url .= '?sub_type='.$transaction_sub_type;
            }
        @endphp
    @endforeach
@endif
<input type="hidden" name="transaction_sub_type" id="transaction_sub_type" value="{{$transaction_sub_type}}">
@inject('request', 'Illuminate\Http\Request')
<div class="col-md-12 no-print pos-header">
  <input type="hidden" id="pos_redirect_url" value="{{$pos_redirect_url}}">
  <div class="row">
    <div class="col-md-6">
      <div class="m-6 mt-5" style="display: flex;">
        <p ><strong>@lang('sale.location'): &nbsp;</strong> 
          @if(empty($transaction->location_id))
            @if(count($business_locations) > 1)
            <div style="width: 28%;margin-bottom: 5px;">
               {!! Form::select('select_location_id', $business_locations, $default_location->id ?? null , ['class' => 'form-control input-sm',
                'id' => 'select_location_id', 
                'required', 'autofocus'], $bl_attributes); !!}
            </div>
            @else
              {{$default_location->name}}
            @endif
          @endif

          @if(!empty($transaction->location_id)) {{$transaction->location->name}} @endif &nbsp;{{ @format_datetime('now') }} <i class="fa fa-keyboard hover-q text-muted" aria-hidden="true" data-container="body" data-toggle="popover" data-placement="bottom" data-content="@include('sale_pos.partials.keyboard_shortcuts_details')" data-html="true" data-trigger="hover" data-original-title="" title=""></i>
        </p>
      </div>
    </div>
    <div class="col-md-6">
      <a href="{{$go_back_url}}" title="{{ __('lang_v1.go_back') }}" class="rounded-circle btn btn-outline-info m-6 m-5 pull-right">
        <strong><i class="fa fa-backward fa-lg"></i></strong>
      </a>
      @can('close_cash_register')
      <button type="button" id="close_register" title="{{ __('cash_register.close_register') }}" class="rounded-circle btn btn-outline-danger m-6 m-5 btn-modal pull-right" data-container=".close_register_modal" 
          data-href="{{ action('CashRegisterController@getCloseRegister')}}">
            <strong><i class="fa fa-window-close fa-lg"></i></strong>
      </button>
      @endcan
      
      @can('view_cash_register')
      <button type="button" id="register_details" title="{{ __('cash_register.register_details') }}" class="rounded-circle btn btn-outline-success m-6 m-5 btn-modal pull-right" data-container=".register_details_modal" 
          data-href="{{ action('CashRegisterController@getRegisterDetails')}}">
            <strong><i class="fa fa-briefcase fa-lg" aria-hidden="true"></i></strong>
      </button>
      @endcan

      <button title="@lang('lang_v1.calculator')" id="btnCalculator" type="button" class="rounded-circle btn btn-outline-success pull-right m-6 m-5 popover-default" data-toggle="popover" data-trigger="click" data-content='@include("layouts.partials.calculator")' data-html="true" data-placement="bottom">
            <strong><i class="fa fa-calculator fa-lg" aria-hidden="true"></i></strong>
      </button>

      <button type="button" title="{{ __('lang_v1.full_screen') }}" class="rounded-circle btn btn-outline-primary m-6 hidden-xs m-5 pull-right" id="full_screen">
            <strong><i class="fa fa-window-maximize fa-lg"></i></strong>
      </button>

      <button type="button" id="view_suspended_sales" title="{{ __('lang_v1.view_suspended_sales') }}" class="rounded-circle btn btn-outline-warning m-6 m-5 btn-modal pull-right" data-container=".view_modal" 
          data-href="{{$view_suspended_sell_url}}">
            <strong><i class="fa fa-pause-circle fa-lg"></i></strong>
      </button>
      <button title="Payout" class="rounded-circle btn btn-outline-warning m-6 m-5 btn-modal pull-right" data-target="#modalPayout" data-toggle="modal"><strong><i class="fas fa-money-bill-wave fa-lg" style="color: #104d0f;"></i></strong></button>
      <!-- <button type="button" id="mark-line" title="Close Order" class="rounded-circle btn btn-outline-warning m-6 m-5 btn-modal pull-right"  
          >
            <strong><i class="fa fa-lg">---</i></strong>
      </button> -->
      
     <!--  <button type="button" id="remove-mark-line" title="Remove Close Order" class="rounded-circle btn btn-outline-warning m-6 m-5 btn-modal pull-right"  
          >
            <strong><i class="fas fa-trash fa-lg"></i></strong>
      </button> -->
		<button type="button" class="rounded-circle btn btn-outline-primary m-6 m-5 pull-right "  id="return-to-category"><i class="fa fa-reply fa-lg" aria-hidden="true"></i></button>

	
      @if(empty($pos_settings['hide_product_suggestion']) && isMobile())
        <button type="button" title="{{ __('lang_v1.view_products') }}"   
          data-placement="bottom" class="rounded-circle btn btn-success btn-flat m-6 btn-xs m-5 btn-modal pull-right" data-toggle="modal" data-target="#mobile_product_suggestion_modal">
            <strong><i class="fa fa-cubes fa-lg"></i></strong>
        </button>
      @endif

      @if(Module::has('Repair') && $transaction_sub_type != 'repair')
        @include('repair::layouts.partials.pos_header')
      @endif

        @if(in_array('pos_sale', $enabled_modules) && !empty($transaction_sub_type))
          @can('sell.create')
            <a href="{{action('SellPosController@create')}}" title="@lang('sale.pos_sale')" class="btn btn-success btn-flat m-6 btn-xs m-5 pull-right">
              <strong><i class="fa fa-th-large"></i> &nbsp; @lang('sale.pos_sale')</strong>
            </a>
          @endcan
        @endif

    </div>
    
  </div>
</div>
<div id="modalPayout" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

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
           <input type="hidden" value="payout-popup" name="payout_popup">
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