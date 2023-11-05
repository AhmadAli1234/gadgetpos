<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

    <div class="modal-header" style="border:none;">
      <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title Title-top">@lang( 'cash_register.register_details' ) ( {{ \Carbon::createFromFormat('Y-m-d H:i:s', $register_details->open_time)->format('jS M, Y h:i A') }} -  {{\Carbon::createFromFormat('Y-m-d H:i:s', $close_time)->format('jS M, Y h:i A')}} )</h3>
      <hr class="divider-top">
    </div>

    <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <table class="table posTable">
            <tr>
              <th>
                @lang('cash_register.cash_in_hand'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->cash_in_hand }}</span>
              </td>
            </tr>

            <tr>
              <th>
                @lang('cash_register.cash_payment'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cash }}</span>
              </td>
            </tr>

            <tr>
              <th>
                @lang('cash_register.checque_payment'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cheque }}</span>
              </td>
            </tr>

            <tr>
              <th>
                @lang('cash_register.card_payment'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_card }}</span>
              </td>
            </tr>

            <!-- <tr>
              <th>
                @lang('cash_register.bank_transfer'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_bank_transfer }}</span>
              </td>
            </tr> -->

            <!-- <tr>
              <th>
                @lang('lang_v1.advance_payment'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_advance }}</span>
              </td>
            </tr> -->
            
            <!-- <tr>
              <th>
                @lang('cash_register.other_payments'):
              </th>
              <td>
                <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_other }}</span>
              </td>
            </tr> -->

            <tr class="success">
              <th>
                @lang('lang_v1.register_total_payment')
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ ($register_details->cash_in_hand + $register_details->total_cash + $register_details->total_cheque + $register_details->total_card + $register_details->total_bank_transfer + $register_details->total_advance + $register_details->total_custom_pay_1 + $register_details->total_custom_pay_2 + $register_details->total_custom_pay_3 + $register_details->total_custom_pay_4 + $register_details->total_custom_pay_5 + $register_details->total_custom_pay_6 + $register_details->total_custom_pay_7 + $register_details->total_other) }}</span></b>
              </td>
            </tr>

            <tr class="success">
              <th>
                @lang('cash_register.total_refund')
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">- {{ $sell_return_details['total_sell_details'] }}</span></b><br>
                <small>
                @if($register_details->total_cash_refund != 0)
                  Cash: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cash_refund }}</span><br>
                @endif
                @if($register_details->total_cheque_refund != 0) 
                  Cheque: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_cheque_refund }}</span><br>
                @endif
                @if($register_details->total_card_refund != 0) 
                  Card: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_card_refund }}</span><br> 
                @endif
                @if($register_details->total_bank_transfer_refund != 0)
                  Bank Transfer: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_bank_transfer_refund }}</span><br>
                @endif
                @if($register_details->total_advance_refund != 0)
                  @lang('lang_v1.advance'): <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_advance_refund }}</span><br>
                @endif
                @if(array_key_exists('custom_pay_1', $payment_types) && $register_details->total_custom_pay_1_refund != 0)
                    {{$payment_types['custom_pay_1']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_1_refund }}</span>
                @endif
                @if(array_key_exists('custom_pay_2', $payment_types) && $register_details->total_custom_pay_2_refund != 0)
                    {{$payment_types['custom_pay_2']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_2_refund }}</span>
                @endif
                @if(array_key_exists('custom_pay_3', $payment_types) && $register_details->total_custom_pay_3_refund != 0)
                    {{$payment_types['custom_pay_3']}}: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_custom_pay_3_refund }}</span>
                @endif
                @if($register_details->total_other_refund != 0)
                  Other: <span class="display_currency" data-currency_symbol="true">{{ $register_details->total_other_refund }}</span>
                @endif
                </small>
              </td>
            </tr>
            
            <tr class="success">
              <th>
                Total Payouts:
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">- {{ $payout }}</span></b><br>
              </td>
            </tr>
        
            <tr class="success">
              <th>
                @lang('lang_v1.credit_sales'):
              </th>
              <td>
                <b><span class="display_currency" data-currency_symbol="true">{{ $details['transaction_details']->total_sales - $register_details->total_sale }}</span></b>
              </td>
            </tr>

            <tr class="success">
              <th>
                @lang('lang_v1.register_total_sales'):
              </th>
              <td>
                  @php
                  $credit_sales = ($details['transaction_details']->total_sales) - $register_details->total_sale;
                        
                    $finAmount = ($register_details->cash_in_hand + $register_details->total_cash + $register_details->total_cheque + $register_details->total_card + $register_details->total_bank_transfer + $register_details->total_advance + $register_details->total_custom_pay_1 + $register_details->total_custom_pay_2 + $register_details->total_custom_pay_3 + $register_details->total_custom_pay_4 + $register_details->total_custom_pay_5 + $register_details->total_custom_pay_6 + $register_details->total_custom_pay_7 + $register_details->total_other) - $sell_return_details['total_sell_details'] + $credit_sales - $register_details->cash_in_hand - $payout;
                  @endphp
                <b><span class="display_currency" data-currency_symbol="true">{{ $finAmount }}</span></b>
              </td>
            </tr>

          </table>
        </div>
      </div>

      @include('cash_register.register_product_details')

      @if(!empty($register_details->denominations))
        @php
          $total = 0;
        @endphp
        <div class="row">
          <div class="col-md-8 col-sm-12">

            <h3 class="title-cash-domination">@lang( 'lang_v1.cash_denominations' )</h3>

            <table class="table table-slim posTable3">
              <thead>
                <tr>
                  <th width="20%" class="text-right">@lang('lang_v1.denomination')</th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-center">@lang('lang_v1.count')</th>
                  <th width="20%">&nbsp;</th>
                  <th width="20%" class="text-left">@lang('sale.subtotal')</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach($register_details->denominations as $key => $value)
                <tr>
                  <td class="text-right">{{$key}}</td>
                  <td class="text-center">X</td>
                  <td class="text-center">{{$value ?? 0}}</td>
                  <td class="text-center">=</td>
                  <td class="text-left">
                    @format_currency($key * $value)
                  </td>
                </tr>
                @php
                  $total += ($key * $value);
                @endphp
                @endforeach
              </tbody>

              <tfoot>
                <tr>
                  <th colspan="4" class="text-center">@lang('sale.total')</th>
                  <td>@format_currency($total)</td>
                </tr>
              </tfoot>

            </table>

          </div>
        </div>
      @endif
      
      <!-- <div class="row userFont">
        <div class="col-xs-6">
          <div>
            <b>@lang('report.user'):</b> 
            <span>{{ $register_details->user_name}}</span>
          </div>

          <div>
            <b>@lang('business.email'):</b> 
            <span>{{ $register_details->email}}</span>
          </div>
          
          <div>
            <b>@lang('business.business_location'):</b> 
            <span>{{ $register_details->location_name}}</span>
          </div>
          
        </div>
        @if(!empty($register_details->closing_note))
          <div class="col-xs-6">
            <strong>@lang('cash_register.closing_note'):</strong><br>
            {{$register_details->closing_note}}
          </div>
        @endif
      </div> -->

    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary no-print" 
        aria-label="Print" 
          onclick="$(this).closest('div.modal').printThis();">
        <i class="fa fa-print"></i> @lang( 'messages.print' )
      </button>

      <button type="button" class="btn btn-default no-print" 
        data-dismiss="modal">@lang( 'messages.cancel' )
      </button>
    </div>

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->