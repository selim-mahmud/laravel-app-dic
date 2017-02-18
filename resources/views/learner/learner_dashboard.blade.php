@extends('layouts.control')

@section('meta')
    <title>Australian Driving Instructors Directory</title>
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
@stop

@section('header')
    @include('_partials.header_control')
@stop

@section('left_sidebar')
    @include('_partials.left_sidebar')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb_control')
@stop

@section('flash_message')
    @include('_partials.flash_message')
@stop

@section('content')
    <section style="margin-top: -50px;" id="content" class="">

        <div class="panel invoice-panel">
            <div class="panel-heading">
                <span class="panel-title">Printable Invoice</span>

                <div class="panel-header-menu pull-right mr10">
                    <button type="button" class="btn btn-xs btn-default btn-gradient mr5">
                        <i class="fa fa-plus-square pr5"></i> New Invoice
                    </button>
                    <a href="javascript:window.print()" class="btn btn-xs btn-default btn-gradient mr5">
                        <i class="fa fa-print fs13"></i>
                    </a>

                </div>
            </div>
            <div class="panel-body p20" id="invoice-item">

                <div class="row mb30">
                    <div class="col-md-4">
                        <div class="pull-left">
                            <h5 class="mn"> Created: Nov 01 2015 </h5>
                            <h5 class="mn"> Status:
                                <b class="text-success">Paid</b>
                            </h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <div class="pull-right text-right">
                            <h2 class="invoice-logo-text hidden lh10">ThemeREX</h2>
                            <h6> Sales Rep:
                                <b class="text-primary">John Doe</b>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row" id="invoice-info">
                    <div class="col-md-4">
                        <div class="panel panel-alt">
                            <div class="panel-heading">
                                <span class="panel-title"> Bill To: </span>

                                <div class="panel-btns pull-right ml10">
                                    <span class="panel-title-sm"> Edit</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="fw700">Jane Doe</div>
                                <div>Phone: (123) 456-7890</div>
                                <div>Email: info@mail.com</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-alt">
                            <div class="panel-heading">
                                <span class="panel-title"> Ship To:</span>

                                <div class="panel-btns pull-right ml10">
                                    <span class="panel-title-sm"> Edit</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div><strong>Themerex Co.</strong></div>
                                <div> Long drive, 12345</div>
                                <div> New York, NY 12345</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-alt">
                            <div class="panel-heading">
                                <span class="panel-title"> Invoice Details: </span>

                                <div class="panel-btns pull-right ml10"></div>
                            </div>
                            <div class="panel-body">
                                <div><b>Invoice #:</b> 123</div>
                                <div><b>Invoice Date:</b> Nov 01 2015</div>
                                <div><b>Due Date:</b> Nov 07 2015</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="invoice-table">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="hidden-xs">N</th>
                                <th>Item</th>
                                <th class="hidden-xs">Description</th>
                                <th style="width: 135px;">#</th>
                                <th class="hidden-xs">Rate</th>
                                <th class="text-right pr10">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="hidden-xs">
                                    <b>1</b>
                                </td>
                                <td>iPhone 6</td>
                                <td class="hidden-xs">Apple iPhone 6 is the lorem ipsum dolor</td>
                                <td>1</td>
                                <td class="hidden-xs">$25.00</td>
                                <td class="text-right pr10">$755.00</td>
                            </tr>
                            <tr>
                                <td class="hidden-xs">
                                    <b>2</b>
                                </td>
                                <td>iPad Air</td>
                                <td class="hidden-xs">Apple iPad Air is the latest lorem ipsum</td>
                                <td>1</td>
                                <td class="hidden-xs">$20.99</td>
                                <td class="text-right pr10">$500.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" id="invoice-footer">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <table class="table" id="basic-invoice-result">
                                <thead>
                                <tr>
                                    <th>
                                        <b>Sub Total:</b>
                                    </th>
                                    <th>$1255.00</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <b>Taxes</b>
                                    </td>
                                    <td>$45.99</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Total</b>
                                    </td>
                                    <td>$1300.99</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Balance Due:</b>
                                    </td>
                                    <td>$1300.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                        <div class="basic-invoice-buttons">
                            <a href="javascript:window.print()" class="btn btn-default mr10 mb5">
                                <i class="fa fa-print pr5"></i> Print Invoice</a>
                            <button class="btn btn-primary mb5" type="button">
                                <i class="fa fa-floppy-o pr5"></i> Save Invoice
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@stop

@section('footer')
    @include('_partials.footer_control')
@stop

@push('scripts_stack')
{{-- <script src="js/head_script_example.js"></script> --}}
@endpush