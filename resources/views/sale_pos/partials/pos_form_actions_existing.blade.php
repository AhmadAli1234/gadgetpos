@php
$is_mobile = isMobile();
@endphp
@if($is_mobile)
	<div class="col-md-12 text-right">
		<b>@lang('sale.total_payable'):</b>
		<input type="hidden" name="final_total" id="final_total_input" value=0>
		<span id="total_payable" class="text-success lead text-bold text-right">0</span>
	</div>
	@endif
<div class="row actions-pos-btns">
	
	<div class="col-md-2">
		<!--<button type="button" class=" @if($pos_settings['disable_draft'] != 0) hide @endif" id="pos-draft"><i class="fas fa-edit"></i> @lang('sale.draft')</button>		@if(empty($pos_settings['disable_suspend']))-->
		<button type="button"
		class=" no-print pos-express-finalize btn-outline-primary"
		data-pay_method="suspend"
		title="@lang('lang_v1.tooltip_suspend')" >
		<i class="fas fa-pause" aria-hidden="true"></i>
		@lang('lang_v1.suspend')
		</button>
		@endif
		<!--<button type="button" style="width:95px" class="rounded-circle col-md-12 btn btn-outline-warning @if($is_mobile) col-xs-6 @endif" id="pos-quotation"><i class="fas fa-edit"></i> @lang('lang_v1.quotation')</button>-->
			</div>
	<!--<div class="col-md-3">-->
		
	<!--	@if(empty($pos_settings['disable_credit_sale_button']))-->
	<!--	<input type="hidden" name="is_credit_sale" value="0" id="is_credit_sale">-->
	<!--	<button type="button"-->
	<!--	class="rounded-circle col-md-12 btn btn-outline-primary no-print pos-express-finalize @if($is_mobile) col-xs-6 @endif"-->
	<!--	data-pay_method="credit_sale"-->
	<!--	title="@lang('lang_v1.tooltip_credit_sale')" >-->
	<!--	<i class="fas fa-check" aria-hidden="true"></i> @lang('lang_v1.credit_sale')-->
	<!--	</button>-->
	<!--	@endif-->
	<!--</div>-->
	<div class="col-md-3">
		<!-- 			<button type="button" class="col-md-12 btn bg-maroon btn-default btn-flat no-print @if(!empty($pos_settings['disable_suspend'])) @endif pos-express-finalize @if(!array_key_exists('card', $payment_types)) hide @endif @if($is_mobile) col-xs-6 @endif"
		data-pay_method="card"
		title="@lang('lang_v1.tooltip_express_checkout_card')" >
		<i class="fas fa-credit-card" aria-hidden="true"></i> @lang('lang_v1.express_checkout_card')
		</button> -->
		<button type="button" class=" btn-outline-success no-print @if($pos_settings['disable_pay_checkout'] != 0) hide @endif" id="pos-finalize" title="@lang('lang_v1.tooltip_checkout_multi_pay')"><i class="fas fa-money-check-alt" aria-hidden="true"></i> @lang('lang_v1.checkout_multi_pay') </button>
	</div>
	@php
	$is_admin = auth()->user()->hasRole('Admin#' . session('business.id')) ? true : false;
	@endphp
	<div class="@if($is_admin || auth()->user()->can('access_recent_transcations')) col-md-2 @else col-md-4 @endif">
		<button type="button" class=" btn-outline-secondary no-print @if($pos_settings['disable_express_checkout'] != 0 || !array_key_exists('cash', $payment_types)) hide @endif pos-express-finalize" data-pay_method="cash" title="@lang('tooltip.express_checkout')"> <i class="fas fa-dollar-sign"></i> @lang('lang_v1.express_checkout_cash')</button>
	</div>
	@if($is_admin || auth()->user()->can('access_recent_transcations'))
	@if(!isset($pos_settings['hide_recent_trans']) || $pos_settings['hide_recent_trans'] == 0)	
	<div class="col-md-2">

		<button type="button" class=" btn-outline-warning" data-toggle="modal" data-target="#recent_transactions_modal" id="recent-transactions"> <i class="fas fa-clock"></i> @lang('lang_v1.recent_transactions')</button>
	</div>
	@endif
	@endif
	
</div>
@if(isset($transaction))
@include('sale_pos.partials.edit_discount_modal', ['sales_discount' => $transaction->discount_amount, 'discount_type' => $transaction->discount_type, 'rp_redeemed' => $transaction->rp_redeemed, 'rp_redeemed_amount' => $transaction->rp_redeemed_amount, 'max_available' => !empty($redeem_details['points']) ? $redeem_details['points'] : 0])
@else
@include('sale_pos.partials.edit_discount_modal', ['sales_discount' => $business_details->default_sales_discount, 'discount_type' => 'percentage', 'rp_redeemed' => 0, 'rp_redeemed_amount' => 0, 'max_available' => 0])
@endif
@if(isset($transaction))
@include('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $transaction->tax_id])
@else
@include('sale_pos.partials.edit_order_tax_modal', ['selected_tax' => $business_details->default_sales_tax])
@endif
@include('sale_pos.partials.edit_shipping_modal')