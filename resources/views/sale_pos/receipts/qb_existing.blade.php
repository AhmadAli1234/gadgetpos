<!-- business information here -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <title>Receipt-{{$receipt_details->invoice_no}}</title>
    </head>
    <body>
        <div class="ticket">
        	
        	
        	@if(!empty($receipt_details->logo))
        		<div class="text-box centered">
        			<img style="max-height: 100px; width
        			 auto;" src="{{$receipt_details->logo}}" alt="Logo">
        		</div>
        	@endif
        	<div class="text-box">
        	<!-- Logo -->
            <p class="centered">
            	<!-- Header text -->
            	@if(!empty($receipt_details->header_text))
            		<span class="headings">{!! $receipt_details->header_text !!}</span>
					<br/>
				@endif
			</p>
			<p class="f-left">
			{{$receipt_details->invoice_date}}
			</p>
			<p class="f-right">
			Sales Receipt# {{$receipt_details->invoice_no}}
			</p>
			<p class='centered'>
				<!-- business information here -->
				@if(!empty($receipt_details->display_name))
				<br><br>
					<span class="headings">
						{{$receipt_details->display_name}}
					</span>
					<br/>
				@endif
				
				@if(!empty($receipt_details->address))

					<?php
				        $ressAdd = explode(',',$receipt_details->address);
				    	?>
				    	<p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;"><?php if(isset($ressAdd [0])) echo $ressAdd [0]; if(isset($ressAdd [1])) echo ', '.$ressAdd [1]; if(isset($ressAdd [2])) echo ', '.$ressAdd [2]; if(isset($ressAdd [3]))?><br/><span class="text-center"><?php echo $ressAdd [3];  ?></span></p> 
				@endif
				
				@if(!empty($receipt_details->contact))
				    <?php
				        $ressCont = explode(PHP_EOL,$receipt_details->contact);
				        
				        if(isset($ressCont[0])) {
				            foreach($ressCont as $v) {
				    ?>              
				                <p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;">{!! str_replace("<b>Mobile:</b> ","", $v) !!}</p>
				    <?php              
				            }
				        }
				        else {
				    ?> 
				            <p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;">{!! $receipt_details->contact !!}</p>
				    <?php          
				        }
				    ?>
				@endif
				<!-- @if(!empty($receipt_details->contact) && !empty($receipt_details->website))
					, 
				@endif
				@if(!empty($receipt_details->website))
					<p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;">{{ $receipt_details->website }}</p>
				@endif -->
				@if(!empty($receipt_details->location_custom_fields))
					<br>{{ $receipt_details->location_custom_fields }}
				@endif

				@if(!empty($receipt_details->sub_heading_line1))
					<p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;"><b>Vat sales Receipt</b></p>
					<p class="text-center" style="padding-bottom: 0px; margin-bottom: 0px;">{{ $receipt_details->sub_heading_line1 }}<p/>
				@endif
				@if(!empty($receipt_details->sub_heading_line2))
					{{ $receipt_details->sub_heading_line2 }}<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line3))
					{{ $receipt_details->sub_heading_line3 }}<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line4))
					{{ $receipt_details->sub_heading_line4 }}<br/>
				@endif		
				@if(!empty($receipt_details->sub_heading_line5))
					{{ $receipt_details->sub_heading_line5 }}<br/>
				@endif
				@if(!empty($receipt_details->tax_info1))
					<br>
					<b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
				@endif

				@if(!empty($receipt_details->tax_info2))
					<b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
				@endif

				<!-- Title of receipt -->
<!-- 				@if(!empty($receipt_details->invoice_heading))
					<br/><span class="sub-headings">{!! $receipt_details->invoice_heading !!}</span>
				@endif -->
			</p>
			</div>
<!-- 			<div class="border-top textbox-info">
				<p class="f-left"><strong>{!! $receipt_details->invoice_no_prefix !!}</strong></p>
				<p class="f-right">
					{{$receipt_details->invoice_no}}
				</p>
			</div>
			<div class="textbox-info">
				<p class="f-left"><strong>{!! $receipt_details->date_label !!}</strong></p>
				<p class="f-right">
					{{$receipt_details->invoice_date}}
				</p>
			</div> -->
			
			@if(!empty($receipt_details->due_date_label))
				<div class="textbox-info">
					<p class="f-left"><strong>{{$receipt_details->due_date_label}}</strong></p>
					<p class="f-right">{{$receipt_details->due_date ?? ''}}</p>
				</div>
			@endif

			@if(!empty($receipt_details->sales_person_label))
				<div class="textbox-info">
					<p class="f-left"><strong>{{$receipt_details->sales_person_label}}</strong>{{$receipt_details->sales_person}}</p>				
				</div>
			@endif
	        <!-- customer info -->
	        <div class="textbox-info">
	        	<p style="vertical-align
	        	 top;"><strong>
	        		{{$receipt_details->customer_label ?? ''}}
	        	</strong>
	        		@if(!empty($receipt_details->customer_info))
	        			
						{{strip_tags($receipt_details->customer_info) }}
						
					@endif
	        	</p>
	        </div>

	        @if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
	        	<div class="textbox-info">
	        		<p class="f-left"><strong>
	        			@if(!empty($receipt_details->table_label))
							<b>{!! $receipt_details->table_label !!}</b>
						@endif
	        		</strong></p>
	        		<p class="f-right">
	        			{{$receipt_details->table}}
	        		</p>
	        	</div>
	        @endif


			
			@if(!empty($receipt_details->client_id_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{{ $receipt_details->client_id_label }}
					</strong></p>
					<p class="f-right">
						{{ $receipt_details->client_id }}
					</p>
				</div>
			@endif
			
			@if(!empty($receipt_details->customer_tax_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{{ $receipt_details->customer_tax_label }}
					</strong></p>
					<p class="f-right">
						{{ $receipt_details->customer_tax_number }}
					</p>
				</div>
			@endif

			@if(!empty($receipt_details->customer_custom_fields))
				<div class="textbox-info">
					<p class="centered">
						{!! $receipt_details->customer_custom_fields !!}
					</p>
				</div>
			@endif
			
			@if(!empty($receipt_details->customer_rp_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{{ $receipt_details->customer_rp_label }}
					</strong></p>
					<p class="f-right">
						{{ $receipt_details->customer_total_rp }}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->shipping_custom_field_1_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{!!$receipt_details->shipping_custom_field_1_label!!} 
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->shipping_custom_field_1_value ?? ''!!}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->shipping_custom_field_2_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{!!$receipt_details->shipping_custom_field_2_label!!} 
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->shipping_custom_field_2_value ?? ''!!}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->shipping_custom_field_3_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{!!$receipt_details->shipping_custom_field_3_label!!} 
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->shipping_custom_field_3_value ?? ''!!}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->shipping_custom_field_4_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{!!$receipt_details->shipping_custom_field_4_label!!} 
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->shipping_custom_field_4_value ?? ''!!}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->shipping_custom_field_5_label))
				<div class="textbox-info">
					<p class="f-left"><strong>
						{!!$receipt_details->shipping_custom_field_5_label!!} 
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->shipping_custom_field_5_value ?? ''!!}
					</p>
				</div>
			@endif
			@if(!empty($receipt_details->sale_orders_invoice_no))
				<div class="textbox-info">
					<p class="f-left"><strong>
						@lang('restaurant.order_no')
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->sale_orders_invoice_no ?? ''!!}
					</p>
				</div>
			@endif

			@if(!empty($receipt_details->sale_orders_invoice_date))
				<div class="textbox-info">
					<p class="f-left"><strong>
						@lang('lang_v1.order_dates')
					</strong></p>
					<p class="f-right">
						{!!$receipt_details->sale_orders_invoice_date ?? ''!!}
					</p>
				</div>
			@endif
            <table style="margin-top
             25px !important" class="border-bottom width-100 table-f-12 mb-10">
                <thead>
                    <tr>
                        <th class="description" width="30%">
                        	{{$receipt_details->table_product_label}}
                        </th>
                        <th class="quantity text-center">
                        	{{$receipt_details->table_qty_label}}
                        </th>
                        @if(empty($receipt_details->hide_price))
                        <th class="unit_price text-left">
                        	{{$receipt_details->table_unit_price_label}}
                        </th>
                        @if(!empty($receipt_details->item_discount_label))
							<th class="text-left">{{$receipt_details->item_discount_label}}</th>
						@endif
                        <th class="price text-right">{{$receipt_details->table_subtotal_label}}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                	@forelse($receipt_details->lines as $line)
	                    <tr class="border-bottom border-top" style="border-color
	                     silver;">
	                        <td class="description">
	                        	{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
	                        	@if(!empty($line['sub_sku']))<br> {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
	                        	@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
	                        	@if(!empty($line['sell_line_note']))
	                        	<br>
	                        	<span class="f-8">
	                        	{{$line['sell_line_note']}}
	                        	</span>
	                        	@endif 
	                        	@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}
	                        	  {{$line['lot_number']}} @endif 
	                        	@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}
	                        	  {{$line['product_expiry']}} @endif
	                        	@if(!empty($line['warranty_name']))
	                            	<br>
	                            	<small>
	                            		{{$line['warranty_name']}}
	                            	</small>
	                            @endif
	                            @if(!empty($line['warranty_exp_date']))
	                            	<small>
	                            		- {{@format_date($line['warranty_exp_date'])}}
	                            </small>
	                            @endif
	                            @if(!empty($line['warranty_description']))
	                            	<small> {{$line['warranty_description'] ?? ''}}</small>
	                            @endif
	                        </td>
	                        <td class="quantity text-center">{{(int)$line['quantity']}}</td>
	                        @if(empty($receipt_details->hide_price))
	                        <td class="unit_price text-left">{{$line['unit_price_before_discount']}}</td>
	                        @if(!empty($receipt_details->item_discount_label))
					<td class="text-left">
						{{$line['line_discount'] ?? '0.00'}}
					</td>
				@endif
	                        <td class="price text-right">{{$line['line_total']}}</td>
	                        @endif
	                    </tr>
	                    @if(!empty($line['modifiers']))
							@foreach($line['modifiers'] as $modifier)
								<tr>
									<td>
										&nbsp;
									</td>
									<td>
			                            {{$modifier['name']}} {{$modifier['variation']}} 
			                            @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
			                            @if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
			                        </td>
									<td class="text-right">{{$modifier['quantity']}} {{$modifier['units']}} </td>
									@if(empty($receipt_details->hide_price))
									<td class="text-right">{{$modifier['unit_price_inc_tax']}}</td>
									@if(!empty($receipt_details->item_discount_label))
										<td class="text-right">0.00</td>
									@endif
									<td class="text-right">{{$modifier['line_total']}}</td>
									@endif
								</tr>
							@endforeach
						@endif
                    @endforeach
                </tbody>
            </table>
			@if(!empty($receipt_details->total_quantity_label))
				<div class="flex-box">
					<p class="right text-right">
						
					</p>
					<p class="width-50 text-right">
						<strong>{!! $receipt_details->total_quantity_label !!}
						</strong>
						{{$receipt_details->total_quantity}}
					</p>
				</div>
			@endif
			@if(empty($receipt_details->hide_price))
                <div class="flex-box">
                    <p class="left text-right sub-headings">
                    	
                    </p>
                    <p class="width-100 text-right">
                    	<strong>{!! $receipt_details->subtotal_label !!}</strong>
                    	{{$receipt_details->subtotal}}
                    </p>
                </div>

                <!-- Shipping Charges -->
				@if(!empty($receipt_details->shipping_charges))
					<div class="flex-box">
						<p class="left text-right">
							
						</p>
						<p class="width-100 text-right">
							<strong>{!! $receipt_details->shipping_charges_label !!}
							 </strong>
							{{$receipt_details->shipping_charges}}
						</p>
					</div>
				@endif

				@if(!empty($receipt_details->packing_charge))
					<div class="flex-box">
						<p class="left text-right">
							
						</p>
						<p class="width-100 text-right">
							<strong>{!! $receipt_details->packing_charge_label !!}
							 </strong>
							{{$receipt_details->packing_charge}}
						</p>
					</div>
				@endif

				<!-- Discount -->
				@if( !empty($receipt_details->discount) )
					<div class="flex-box">
						<p class="width-100 text-right">
							
						</p>

						<p class="width-100 text-right">
							<strong>{!! $receipt_details->discount_label !!}
							 </strong>
							(-) {{$receipt_details->discount}}
						</p>
					</div>
				@endif

				@if(!empty($receipt_details->reward_point_label) )
					<div class="flex-box">
						<p class="width-100 text-right">
							
						</p>

						<p class="width-100 text-right">
							<strong>{!! $receipt_details->reward_point_label !!}
							 </strong>
							(-) {{$receipt_details->reward_point_amount}}
						</p>
					</div>
				@endif

				@if( !empty($receipt_details->tax) )
					<div class="flex-box">
						<p class="width-100 text-right">
							
						</p>
						<p class="width-100 text-right">
							<strong>{!! $receipt_details->tax_label !!}</strong>
							 {{$receipt_details->tax}}
						</p>
					</div>
				@endif

				@if( $receipt_details->round_off_amount > 0)
					<div class="flex-box">
						<p class="width-100 text-right">
							
						</p>
						<p class="width-100 text-right">
							<strong>{!! $receipt_details->round_off_label !!}</strong>
							{{$receipt_details->round_off}}
						</p>
					</div>
				@endif

				<div class="flex-box">
					<p class="width-100 text-right sub-headings">
						
					</p>
					<p class="width-100 text-right">
						<strong>{!! $receipt_details->total_label !!}</strong>
						{{$receipt_details->total}}
					</p>
				</div>
				<!-- @if(!empty($receipt_details->total_in_words))
				<p colspan="2" class="text-right mb-0">
					<small>
					({{$receipt_details->total_in_words}})
					</small>
				</p>
				@endif -->
				@if(!empty($receipt_details->payments))
					@foreach($receipt_details->payments as $payment)
						<div class="width-100">
							<p class="width-100 text-left" style="padding-bottom: 0px; margin-bottom: 0px"><strong>{{$payment['method']}}</strong>
							 {{$payment['amount']}}</p>
						</div>
					@endforeach
				@endif

				<!-- Total Paid-->
				@if(!empty($receipt_details->total_paid))
					<div class="width-100">
						<p class="width-100 text-left">
							<strong>{!! $receipt_details->total_paid_label !!}:</strong>
							{{$receipt_details->total_paid}}
						</p>
					</div>
				@endif

				<!-- Total Due-->
				@if(!empty($receipt_details->total_due))
					<div class="width-100">
						<p class="width-100 text-left">
							{!! $receipt_details->total_due_label !!}
						</p>
						<p class="width-100 text-left">
							{{$receipt_details->total_due}}
						</p>
					</div>
				@endif

				@if(!empty($receipt_details->all_due))
					<div class="width-100">
						<p class="width-100 text-left">
							{!! $receipt_details->all_bal_label !!}
						</p>
						<p class="width-100 text-left">
							{{$receipt_details->all_due}}
						</p>
					</div>
				@endif
			@endif
            <div class="width-100">&nbsp;</div>
            @if(empty($receipt_details->hide_price))
	            <!-- tax -->
	            @if(!empty($receipt_details->taxes))
	            	<table class="width-100 table-f-12">
	            		@foreach($receipt_details->taxes as $key => $val)
	            			<tr>
	            				<td class="left">{{$key}}</td>
	            				<td class="right">{{$val}}</td>
	            			</tr>
	            		@endforeach
	            	</table>
	            @endif
            @endif


            @if(!empty($receipt_details->additional_notes))
	            <p class="centered" >
	            	{!! nl2br($receipt_details->additional_notes) !!}
	            </p>
            @endif

            {{-- Barcode --}}
			@if($receipt_details->show_barcode)
				<br/>
				<img class="center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
			@endif

			@if(!empty($receipt_details->footer_text))
				<p class="centered">
					{!! $receipt_details->footer_text !!}
				</p>
			@endif
        </div>
        <!-- <button id="btnPrint" class="hidden-print">Print</button>
        <script src="script.js"></script> -->
    </body>
</html>

<style type="text/css">
.f-8 {
	font-size: 8px !important;
}
@media print {
	* {
    	font-size: 12px;
    	font-family: 'Times New Roman';
    	word-break: break-all;
	}
	.f-8 {
		font-size: 8px !important;
	}
	
.headings{
	font-size: 16px;
	font-weight: 700;
	text-transform: uppercase;
	white-space: nowrap;
}

.sub-headings{
	font-size: 15px !important;
	font-weight: 700 !important;
}

.border-top{
    border-top: 1px solid #242424;
}
.border-bottom{
	border-bottom: 1px solid #242424;
}

.border-bottom-dotted{
	border-bottom: 1px dotted darkgray;
}

td.serial_number, th.serial_number{
	width: 5%;
    max-width: 5%;
}

td.description,
th.description {
    width: 35%;
    max-width: 35%;
}

td.quantity,
th.quantity {
    width: 15%;
    max-width: 15%;
    word-break: break-all;
}
td.unit_price, th.unit_price{
	width: 25%;
    max-width: 25%;
    word-break: break-all;
}

td.price,
th.price {
    width: 20%;
    max-width: 20%;
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 100%;
    max-width: 100%;
}

img {
    max-width: inherit;
    width: auto;
}

    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
.table-info {
	width: 100%;
}
.table-info tr:first-child td, .table-info tr:first-child th {
	padding-top: 8px;
}
.table-info th {
	text-align: left;
}
.table-info td {
	text-align: right;
}
.logo {
	float: left;
	width:35%;
	padding: 10px;
}

.text-with-image {
	float: left;
	width:65%;
}
.text-box {
	width: 100%;
	height: auto;
}

.textbox-info {
	clear: both;
}
.textbox-info p {
	margin-bottom: 0px
}
.flex-box {
	display: flex;
	width: 100%;
}
.flex-box p {
	width: 50%;
	margin-bottom: 0px;
	white-space: nowrap;
}

.table-f-12 th, .table-f-12 td {
	font-size: 12px;
	word-break: break-word;
}

.bw {
	word-break: break-word;
}
</style>