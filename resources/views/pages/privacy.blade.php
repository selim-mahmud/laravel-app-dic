@extends('layouts.main')

@section('meta')
    <title>Privacy policy - Australian Driving Instructors Directory</title>
    <meta name="description" content="privacy policy of driving instructors catalog">
    <meta name="keywords" content="privacy policy of driving instructors catalog">
@stop

@section('header')
    @include('_partials.header')
@stop

@section('breadcrumb')
    @include('_partials.breadcrumb')
@stop

@section('flash_message')
    @include('_partials.flash_message')
@stop
@section('content')
    <div class="listing-details-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="extrabold uppercase bgfff p-right20">Privacy Policy</span>
                    <div><br />
                        <strong>What information do we collect?</strong>
                        <br/>
                        We collect information from you when you register on our site, place an order, subscribe to our newsletter or respond to a survey.
                        <br/><br/>
                        When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing
                        address, phone number or credit card information. You may, however, visit our site anonymously.
                        <br/><br/>
                        <strong>What do we use your information for?</strong>
                        <br/><br/>
                        Any of the information we collect from you may be used in one of the following ways:
                        <br/><br/>
                        1. To personalize your experience<br/>(your information helps us to better respond
                        to your individual needs)<br/><br/>
                        2. To improve customer service<br/>(your information helps us to more effectively
                        respond to your customer service requests and support needs)<br/><br/>
                        3. To process transactions<br/>Your
                        information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for
                        any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product
                        or service requested.<br/>
                        4. To send periodic emails<br/>The email address you provide for order processing, may be
                        used to send you information and updates pertaining to your order, in addition to receiving occasional company news,
                        updates, related product or service information, etc.<br/><br/>
                        <strong>How do we protect your information?</strong>
                        <br/><br/>We implement a variety of security measures to maintain the safety of your personal information when you
                        place an order or enter, submit, or access your personal information.
                        <br/> <br/>We offer the use of a secure
                        server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then
                        encrypted into our Payment gateway providers database only to be accessible by those authorized with special access
                        rights to such systems, and are required to?keep the information confidential.<br/><br/>After a transaction, your
                        private information (credit cards, social security numbers, financials, etc.) will not be stored on our
                        servers.<br/><br/>
                        <strong>Do we use cookies?</strong>
                        <br/><br/>We do not use cookies.<br/><br/><strong>Do we
                            disclose any information to outside parties?</strong>
                        <br/><br/>We do not sell, trade, or otherwise transfer to
                        outside parties your personally identifiable information. This does not include trusted third parties who assist us
                        in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this
                        information confidential. We may also release your information when we believe release is appropriate to comply with
                        the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally
                        identifiable visitor information may be provided to other parties for marketing, advertising, or other
                        uses.<br/><br/>
                        <strong>Third party links</strong>
                        <br/><br/> Occasionally, at our discretion, we may include or
                        offer third party products or services on our website. These third party sites have separate and independent privacy
                        policies. We therefore have no responsibility or liability for the content and activities of these linked sites.
                        Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these
                        sites.<br/><br/>
                        <strong>Your Consent</strong>
                        <br/><br/>By using our site, you consent to our websites privacy
                        policy.<br/><br/>
                        <strong>Changes to our Privacy Policy</strong>
                        <br/><br/>If we decide to change our privacy policy,
                        we will post those changes on this page, and/or send an email notifying you of any changes.
                        <div class="clearfix"></div><br />
                </div>
            </div>
        </div>
    </div>

    <br/>
    <br/>
@stop

@section('footer')
    @include('_partials.footer')
@stop

@push('scripts_stack')

@endpush