<!DOCTYPE html>
<html lang="en">

    <head>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'PT Sans', sans-serif !important;
            }

            @page {
                margin: 0.04in 0.04in 0.04in 0.04in;
            }
            @media print {
                @page {
                    size: auto; /* Automatically selects the page size based on the printer */
                }
            }
            /* logoo {
                padding: 30px;
            } */

            table {
                width: 100%;
            }

            tr {
                width: 100%;

            }

            h1 {
                text-align: center;
                vertical-align: middle;
            }

            #logo {
                width: 40%;
                text-align: center;
                -webkit-align-content: center;
                align-content: center;
                padding: 5px;
                margin: 2px;
                display: block;
                margin: 0 auto;
            }

            header {
                width: 100%;
                text-align: center;
                -webkit-align-content: center;
                align-content: center;
                vertical-align: middle;
            }

            .items thead {
                text-align: center;
            }

            .center-align {
                text-align: center;
            }

            .bill-details td {
                font-size: 12px;
                
            }
            
            .cash_amount td {
                font-size: 10px;
            }

            .receipt {
                font-size: medium;
            }

            .items .heading {
                font-size: 12.5px;
                text-transform: uppercase;
                margin-bottom: 4px;
                vertical-align: middle;
            }


            .items th {
                font-size: 10px;
                text-align: center;
                border-bottom: 1px solid black; 
                border-right: 1px solid white;
                border-top: 1px solid black;
                word-break: break-all;
            }
            .items td {
                font-size: 10px;
                text-align: center;
                vertical-align: middle;
            }

            .price::before {
                /* content: "\20B9"; */
                font-family: Arial;
                text-align: right;
            }

            .sum-up {
                text-align: right !important;
            }
            .barcode{
                width: 100px;
                /* vertical-align: middle; */
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            .total {
                font-size: 13px;
                border-top:1px dashed black !important;
                border-bottom:1px dashed black !important;
            }
            .total.text, .total.price {
                text-align: right;
            }
            .total.price::before {
                /* content: "\20B9";  */
            }
            .line {
                border-top:1px solid black !important;
            }
            .heading.Price {
                width: 20%;
            }
            .heading.Tax {
                width: 20%;
            }
            p {
                padding: 1px;
                margin: 0;
            }
            section, footer {
                font-size: 12px;
            }
        </style>
    </head>

    <body>
        <!-- time and date -->
        <table class="bill-details">
            <tbody>
                <tr>
                    <td style="font-size: 8px;">
                        <b>{{$receipt_details->date_label}}:</b>
                        <span>{{$receipt_details->invoice_date}}</span>
                    </td>
                    <td style="font-size: 8px; text-align: end;"> 
                        @if(!empty($receipt_details->invoice_no_prefix))
                            <b>{!! $receipt_details->invoice_no_prefix !!}:</b>
                        @endif
                        <span>{{$receipt_details->invoice_no}}</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- header -->
        <header>
            <!-- logo -->
            @if(!empty($receipt_details->logo))
            <div  class="logo">
                <img style="width: 200px; height: 150px; object-fit: cover;" src="{{$receipt_details->logo}}" alt="Logo"> 
            </div> 
            @endif

            <!-- Header text -->
            @if(!empty($receipt_details->header_text))
                <div style="font: size 15px; font-weight:bold; width:80%; margin:auto; margin-top: 10px; margin-bottom: 10px;">
                    {!! $receipt_details->header_text !!}
                </div>
            @endif

            <!-- bussines information -->
            @if(!empty($receipt_details->display_name))
            <h3 style="font-size: 12px; font-weight:bold; width:80%; margin:auto; margin-top: 10px; margin-bottom: 10px;">
                {{$receipt_details->display_name}}
            </h3>
            @endif

            <!-- Address -->
            @if(!empty($receipt_details->address))
            <p>
                {!! $receipt_details->address !!}
            </p>
            @endif

            @if(!empty($receipt_details->contact))
                <p>
                    {!! $receipt_details->contact !!}
                </p>
            @endif
            @if(!empty($receipt_details->contact) && !empty($receipt_details->website))
                <p>,</p> 
            @endif
            @if(!empty($receipt_details->website))
                <p>
                    {{ $receipt_details->website }}
                </p>
            @endif

            @if(!empty($receipt_details->location_custom_fields))
                <p>
                    {{ $receipt_details->location_custom_fields }}
                </p>
            @endif

            @if(!empty($receipt_details->sub_heading_line1))
                <p>
                    {{ $receipt_details->sub_heading_line1 }}
                </p>
            @endif
            
            @if(!empty($receipt_details->sub_heading_line2))
                <p>
                    {{ $receipt_details->sub_heading_line2 }}
                </p>
            @endif

            @if(!empty($receipt_details->sub_heading_line3))
                <p>
                    {{ $receipt_details->sub_heading_line3 }}
                </p>
            @endif

            @if(!empty($receipt_details->sub_heading_line4))
                <p>
                    {{ $receipt_details->sub_heading_line4 }}
                </p>
            @endif	

            @if(!empty($receipt_details->sub_heading_line5))
                <p>
                    {{ $receipt_details->sub_heading_line5 }}
                </p>
            @endif

            @if(!empty($receipt_details->tax_info1))
                <p>
                    <b>{{ $receipt_details->tax_label1 }}</b>
                    {{ $receipt_details->tax_info1 }}
                </p>
            @endif

            @if(!empty($receipt_details->tax_info2))
                <p>
                    <b>{{ $receipt_details->tax_label2 }}</b> 
                    {{ $receipt_details->tax_info2 }}
                </p>
            @endif

            <!-- Title of receipt -->
            @if(!empty($receipt_details->invoice_heading))
                <h5 style="font-weight:bold;">
                    {!! $receipt_details->invoice_heading !!}
                </h5>
            @endif

            <!-- Invoice  number, Date  -->
            <p>
                <span>
                    
                    <br>
                    @if(!empty($receipt_details->types_of_service))
                        <span>
                            <strong>{!! $receipt_details->types_of_service_label !!}:</strong>
                            {{$receipt_details->types_of_service}}
                            <!-- Waiter info -->
                            @if(!empty($receipt_details->types_of_service_custom_fields))
                                @foreach($receipt_details->types_of_service_custom_fields as $key => $value)
                                    <strong>{{$key}}: </strong> {{$value}}
                                @endforeach
                            @endif
                        </span>
                    @endif

                    <!-- Table information-->
                    @if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
                        <span>
                            @if(!empty($receipt_details->table_label))
                                <b>{!! $receipt_details->table_label !!}</b>
                            @endif
                            {{$receipt_details->table}}

                            <!-- Waiter info -->
                        </span>
                    @endif

                    <!-- customer info -->
                    @if(!empty($receipt_details->customer_info))
                        <b>{{ $receipt_details->customer_label }}</b>  
                        {!! $receipt_details->customer_info !!}
                    @endif
                    @if(!empty($receipt_details->client_id_label))
                        <b>{{ $receipt_details->client_id_label }}</b> 
                        {{ $receipt_details->client_id }}
                    @endif
                    @if(!empty($receipt_details->customer_tax_label))
                        <b>{{ $receipt_details->customer_tax_label }}</b>
                        {{ $receipt_details->customer_tax_number }}
                    @endif
                    @if(!empty($receipt_details->customer_custom_fields))
                        <b>{!! $receipt_details->customer_custom_fields !!}</b>
                    @endif
                    @if(!empty($receipt_details->sales_person_label))
                        <b>{{ $receipt_details->sales_person_label }}</b> 
                        {{ $receipt_details->sales_person }}
                    @endif
                    @if(!empty($receipt_details->customer_rp_label))
                        <strong>{{ $receipt_details->customer_rp_label }}</strong> 
                        {{ $receipt_details->customer_total_rp }}
                    @endif
                </span>

                <span class="pull-right text-left">

                    @if(!empty($receipt_details->due_date_label))
                        <b>{{$receipt_details->due_date_label}}</b> 
                        {{$receipt_details->due_date ?? ''}}
                    @endif

                    @if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
                        @if(!empty($receipt_details->brand_label))
                            <b>{!! $receipt_details->brand_label !!}</b>
                        @endif
                        {{$receipt_details->repair_brand}}
                    @endif


                    @if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
                        @if(!empty($receipt_details->device_label))
                            <b>{!! $receipt_details->device_label !!}</b>
                        @endif
                        {{$receipt_details->repair_device}}
                    @endif

                    @if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
                        @if(!empty($receipt_details->model_no_label))
                            <b>{!! $receipt_details->model_no_label !!}</b>
                        @endif
                        {{$receipt_details->repair_model_no}}
                    @endif

                    @if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))

                        @if(!empty($receipt_details->serial_no_label))
                            <b>{!! $receipt_details->serial_no_label !!}</b>
                        @endif
                        {{$receipt_details->repair_serial_no}}<br>
                    @endif

                    @if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
                        @if(!empty($receipt_details->repair_status_label))
                            <b>{!! $receipt_details->repair_status_label !!}</b>
                        @endif
                        {{$receipt_details->repair_status}}<br>
                    @endif
                    
                    @if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
                        @if(!empty($receipt_details->repair_warranty_label))
                            <b>{!! $receipt_details->repair_warranty_label !!}</b>
                        @endif
                        {{$receipt_details->repair_warranty}}
                        <br>
                    @endif
                    
                    <!-- Waiter info -->
                    @if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
                        @if(!empty($receipt_details->service_staff_label))
                            <b>{!! $receipt_details->service_staff_label !!}</b>
                        @endif
                        {{$receipt_details->service_staff}}
                    @endif
                    @if(!empty($receipt_details->shipping_custom_field_1_label))
                        <strong>{!!$receipt_details->shipping_custom_field_1_label!!} :</strong> 
                        {!!$receipt_details->shipping_custom_field_1_value ?? ''!!}
                    @endif

                    @if(!empty($receipt_details->shipping_custom_field_2_label))
                        <strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> 
                        {!!$receipt_details->shipping_custom_field_2_value ?? ''!!}
                    @endif

                    @if(!empty($receipt_details->shipping_custom_field_3_label))
                        <strong>{!!$receipt_details->shipping_custom_field_3_label!!}:</strong> 
                        {!!$receipt_details->shipping_custom_field_3_value ?? ''!!}
                    @endif

                    @if(!empty($receipt_details->shipping_custom_field_4_label))
                        <strong>{!!$receipt_details->shipping_custom_field_4_label!!}:</strong> 
                        {!!$receipt_details->shipping_custom_field_4_value ?? ''!!}
                    @endif

                    @if(!empty($receipt_details->shipping_custom_field_5_label))
                        <strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> 
                        {!!$receipt_details->shipping_custom_field_5_value ?? ''!!}
                    @endif
                    {{-- sale order --}}
                    @if(!empty($receipt_details->sale_orders_invoice_no))
                        <strong>@lang('restaurant.order_no'):</strong> 
                        {!!$receipt_details->sale_orders_invoice_no ?? ''!!}
                    @endif

                    @if(!empty($receipt_details->sale_orders_invoice_date))
                        <strong>@lang('lang_v1.order_dates'):</strong> 
                        {!!$receipt_details->sale_orders_invoice_date ?? ''!!}
                    @endif
                </span>
            </p>
            
        </header>

        <!-- customer-data -->
        <div>
            @if(!empty($receipt_details->due_date_label))
                <div style="margin-top:10px;">
                    <strong>{{$receipt_details->due_date_label}}</strong>
                    <span>{{$receipt_details->due_date ?? ''}}</span>
                </div>
            @endif

            @if(!empty($receipt_details->sales_person_label))
                <div style="margin-top:10px;">
                    <strong>{{$receipt_details->sales_person_label}}:</strong>
                    <span>{{$receipt_details->sales_person}}</span>				
                </div>
            @endif

            <div style="margin-top:10px;">
                <strong>{{$receipt_details->customer_label ?? ''}}:</strong>

                @if(!empty($receipt_details->customer_info))
                    
                    {{strip_tags($receipt_details->customer_info) }}
                    
                @endif
            </div>

            @if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
                <div style="margin-top:10px;">
                    <strong>
                        @if(!empty($receipt_details->table_label))
                            <b>{!! $receipt_details->table_label !!}</b>
                        @endif
                    </strong>
                    <span>{{$receipt_details->table}}</span>
                </div>
            @endif

            @if(!empty($receipt_details->client_id_label))
                <div style="margin-top:10px;">
                    <strong>{{ $receipt_details->client_id_label }}</strong>
                    <span>{{ $receipt_details->client_id }}</span>
                </div>
            @endif
                    
            @if(!empty($receipt_details->customer_tax_label))
                <div style="margin-top:10px;">
                    <strong>{{ $receipt_details->customer_tax_label }}</strong>
                    <span>{{ $receipt_details->customer_tax_number }}</span>
                </div>
            @endif

            @if(!empty($receipt_details->customer_custom_fields))
                <div style="margin-top:20px;">
                    <p>
                        {!! $receipt_details->customer_custom_fields !!}
                    </p>
                </div>
            @endif
            
            @if(!empty($receipt_details->customer_rp_label))
                <div style="margin-top:20px;">
                    <strong>{{ $receipt_details->customer_rp_label }}</strong>
                    <span>{{ $receipt_details->customer_total_rp }}</span>
                </div>
            @endif

            @if(!empty($receipt_details->shipping_custom_field_1_label))
                <div style="margin-top:20px;">
                    <strong>{!!$receipt_details->shipping_custom_field_1_label!!} </strong>
                    <span>{!!$receipt_details->shipping_custom_field_1_value ?? ''!!}</span>
                </div>
            @endif

            @if(!empty($receipt_details->shipping_custom_field_2_label))
                <div style="margin-top:20px;">
                    <strong>{!!$receipt_details->shipping_custom_field_2_label!!} </strong>
                    <span>{!!$receipt_details->shipping_custom_field_2_value ?? ''!!}</span>
                </div>
            @endif

            @if(!empty($receipt_details->shipping_custom_field_3_label))
                <div style="margin-top:20px;">
                    <strong>{!!$receipt_details->shipping_custom_field_3_label!!} </strong>
                    <span>{!!$receipt_details->shipping_custom_field_3_value ?? ''!!}</span>
                </div>
            @endif

            @if(!empty($receipt_details->shipping_custom_field_4_label))
                <div style="margin-top:20px;">
                    <strong>{!!$receipt_details->shipping_custom_field_4_label!!} </strong>
                    <span>{!!$receipt_details->shipping_custom_field_4_value ?? ''!!}</span>
                </div>
            @endif
            @if(!empty($receipt_details->shipping_custom_field_5_label))
                <div style="margin-top:20px;">
                    <strong>{!!$receipt_details->shipping_custom_field_5_label!!} </strong>
                    <span>{!!$receipt_details->shipping_custom_field_5_value ?? ''!!}</span>
                </div>
            @endif
            @if(!empty($receipt_details->sale_orders_invoice_no))
                <div style="margin-top:20px;">
                    <strong>@lang('restaurant.order_no')</strong>
                    <span>{!!$receipt_details->sale_orders_invoice_no ?? ''!!}</span>
                </div>
            @endif

            @if(!empty($receipt_details->sale_orders_invoice_date))
                <div style="margin-top:20px;">
                    <strong>@lang('lang_v1.order_dates')</strong>
                    <span>{!!$receipt_details->sale_orders_invoice_date ?? ''!!}</span>
                </div>
            @endif
        </div>
        
        <!-- table -->
        <div>
            @php
                $p_width = 40;
            @endphp
            @if(!empty($receipt_details->item_discount_label))
                @php
                    $p_width -= 15;
                @endphp
            @endif
            <table class="items" style="margin-top:2px;">
                <thead>
                    <tr>
                        <th style="width:40%; text-align: left;">{{$receipt_details->table_product_label}}</th>
                        <th style="width:30%;">{{$receipt_details->table_qty_label}}</th>
                        <th style="width:30%;">{{$receipt_details->table_unit_price_label}}</th>
                        @if(!empty($receipt_details->item_discount_label))
                            <th style="width:30%;">{{$receipt_details->item_discount_label}}</th>
                        @endif
                        <th style="width:30%;">{{$receipt_details->table_subtotal_label}}</th>
                    </tr>
                </thead>
            
                <tbody style="margin-top:5px;">
                    @forelse($receipt_details->lines as $line)
                        <tr>
                            <td style="text-align:left;">
                                @if(!empty($line['image']))
                                    <img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
                                @endif
                                {{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
                                @if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
                                @if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
                                @if(!empty($line['sell_line_note']))
                                <br>
                                <small>
                                    {{$line['sell_line_note']}}
                                </small>
                                @endif 
                                @if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
                                @if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif

                                @if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
                                @if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
                            </td>

                            <td class="text-right">{{round($line['quantity'])}} </td>

                            <td class="text-right">{{$line['unit_price_before_discount']}}</td>
                            @if(!empty($receipt_details->item_discount_label))
                                <td class="text-right">
                                    {{$line['line_discount'] ?? '0.00'}}
                                </td>
                            @endif

                            <td class="text-right">{{$line['line_total']}}</td>
                        </tr>
                        @if(!empty($line['modifiers']))
                            @foreach($line['modifiers'] as $modifier)
                                <tr>
                                    <td style="text-align:left;">
                                        {{$modifier['name']}} {{$modifier['variation']}} 
                                        @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
                                        @if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
                                    </td>
                                    <td class="text-right">{{$modifier['quantity']}} {{$modifier['units']}} </td>
                                    <td class="text-right">{{$modifier['unit_price_inc_tax']}}</td>
                                    @if(!empty($receipt_details->item_discount_label))
                                        <td class="text-right">0.00</td>
                                    @endif
                                    <td class="text-right">{{$modifier['line_total']}}</td>
                                </tr>
                            @endforeach
                        @endif
                        @empty
                        <tr>
                            <td colspan="4">&nbsp;</td>
                        </tr>
                    @endforelse

                    @if(!empty($receipt_details->total_quantity_label))
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->total_quantity_label !!}
                            </td>
                            <td class="line price">{{$receipt_details->total_quantity}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="3" class="sum-up line">
                            {!! $receipt_details->subtotal_label !!}
                        </td>
                        <td class="line price">
                            {{$receipt_details->subtotal}}
                        </td>
                    </tr>
                    @if(!empty($receipt_details->total_exempt_uf))
                    <tr>
                        <td colspan="3" class="sum-up line">
                            @lang('lang_v1.exempt')
                        </td>
                        <td class="line price">
                            {{$receipt_details->total_exempt}}
                        </td>
                    </tr>
                    @endif
                    <!-- Shipping Charges -->
                    @if(!empty($receipt_details->shipping_charges))
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->shipping_charges_label !!}
                            </td>
                            <td class="line price">
                                {{$receipt_details->shipping_charges}}
                            </td>
                        </tr>
                    @endif

                    @if(!empty($receipt_details->packing_charge))
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->packing_charge_label !!}
                            </td>
                            <td class="line price">
                                {{$receipt_details->packing_charge}}
                            </td>
                        </tr>
                    @endif

                    <!-- Discount -->
                    @if( !empty($receipt_details->discount) )
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->discount_label !!}
                            </td>

                            <td class="line price">
                                (-) {{$receipt_details->discount}}
                            </td>
                        </tr>
                    @endif

                    @if( !empty($receipt_details->reward_point_label) )
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->reward_point_label !!}
                            </td>

                            <td class="line price">
                                (-) {{$receipt_details->reward_point_amount}}
                            </td>
                        </tr>
                    @endif

                    <!-- Tax -->
                    @if( !empty($receipt_details->tax) )
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->tax_label !!}
                            </td>
                            <td class="line price">
                                (+) {{$receipt_details->tax}}
                            </td>
                        </tr>
                    @endif

                    @if( $receipt_details->round_off_amount > 0)
                        <tr>
                            <td colspan="3" class="sum-up line">
                                {!! $receipt_details->round_off_label !!}
                            </td>
                            <td class="line price">
                                {{$receipt_details->round_off}}
                            </td>
                        </tr>
                    @endif

                    <!-- Total -->
                    <tr>
                        <th colspan="3" class="total" style="text-align: right; padding-right: 10px; white-space: nowrap;">
                            {!! $receipt_details->total_label !!}
                        </th>
                        <th class="total price" style="white-space: nowrap;">
                            {{$receipt_details->total}}
                            @if(!empty($receipt_details->total_in_words))
                                <br>
                                <small>({{$receipt_details->total_in_words}})</small>
                            @endif
                        </th>
                    </tr>
                    
                </tbody>
            </table>
        </div>



        <!-- cash -->
        <table class="cash_amount" style="margin-top:10px; width: 200px;">
            <tbody>
                <!-- Total Amount-->
                <tr>
                    <th>
                        {!! $receipt_details->total_label !!}
                    </th>
                    <td>
                        {{$receipt_details->total}}
                    </td>
                </tr>
                @if(!empty($receipt_details->payments))
                    @foreach($receipt_details->payments as $payment)
                        <tr>
                            <td><b>{{$payment['method']}}</b></td>
                            <td>{{$payment['amount']}}</td>
                            <!--<td class="text-right">{{$payment['date']}}</td>-->
                        </tr>
                    </tr>
                    @endforeach
                @endif
                

                 <!-- Total Paid-->
                 
                <tr>
                    <th>
                        {!! $receipt_details->total_paid_label !!}
                    </th>
                    <td>
                        {{$receipt_details->total_paid}}
                    </td>
                </tr>
                 

                 
                <!--<tr>
                    <th>
                        {!! $receipt_details->total_due_label !!}
                    </th>
                    <td>
                        {{$receipt_details->total_due}}
                    </td>
                </tr> -->
                
                <tr>
                    <td><b>Status</b></td>
                    @php 
                        $total = (int)substr($receipt_details->total,2);
                        $due = (int)substr($receipt_details->total_due,2);
                        $paid = (int)substr($receipt_details->total_paid,2);
                    @endphp
                    <td>
                        @if($total==$paid)
                            Paid
                        @endif
                            
                        @if($paid<$total&&$paid>0 )
                            Partial Paid
                        @endif
                            
                        @if($paid==0 )
                            Due
                        @endif     
                    </td>
                </tr>
            </tbody>

        </table>
        <!-- cash end-->

        <!-- barcode -->
        @if($receipt_details->show_barcode)
        <div>
            <img class="barcode" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}" alt="barcode">
        </div>
        @endif
        
        <!-- additional-note -->
        <section>
            <p style="text-align:center">
                {!! nl2br($receipt_details->additional_notes) !!}
            </p>
        </section>

        <!-- footer -->
        @if(!empty($receipt_details->footer_text))
        <footer style="text-align:center">
            <p>{!! $receipt_details->footer_text !!}</p>
        </footer>
        @endif
        
    </body>

</html>