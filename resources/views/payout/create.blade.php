@extends('layouts.app')
@section('title', __('expense.add_payout'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('expense.add_payout')</h1>
</section>

<!-- Main content -->
<section class="content">
	{!! Form::open(['url' => action('PayoutController@store'), 'method' => 'post', 'id' => 'add_expense_form', 'files' => true ]) !!}
	<div class="box box-solid">
		<div class="box-body">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', null, ['class' => 'form-control']); !!}
						<p class="help-block">
			                @lang('lang_v1.leave_empty_to_autogenerate')
			            </p>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', null, ['class' => 'form-control']); !!}
						<p class="help-block">
			                @lang('lang_v1.leave_empty_to_autogenerate')
			            </p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						{!! Form::label('ref_no', __('purchase.ref_no').':') !!}
						{!! Form::text('ref_no', null, ['class' => 'form-control']); !!}
						<p class="help-block">
			                @lang('lang_v1.leave_empty_to_autogenerate')
			            </p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div> <!--box end-->
	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary pull-right">@lang('messages.save')</button>
	</div>
{!! Form::close() !!}
</section>
@endsection
@section('javascript')

@endsection