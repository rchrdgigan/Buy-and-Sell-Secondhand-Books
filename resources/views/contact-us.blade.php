@extends('layouts.buyer')

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
            <div class="contact-page-side-content ">
                <h3 class="contact-page-title text-center">Contact Us</h3>
                <div class="single-contact-block pt-2">
                    <h4><i class="fa fa-fax"></i> Address</h4>
                    <p>Bulan, Sorsogon</p>
                </div>
                <div class="single-contact-block">
                    <h4><i class="fa fa-phone"></i> Phone</h4>
                    <p>Mobile: (+63) 931 1231 412</p>
                </div>
                <div class="single-contact-block last-child">
                    <h4><i class="fa fa-envelope-o"></i> Email</h4>
                    <p>yourmail@domain.com</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
            <div class="contact-form-content pt-sm-55 pt-xs-55">
                <h3 class="contact-page-title">Tell Us Your Message</h3>
                <div class="contact-form">
                    <form  id="contact-form" action="" method="post">
                        <div class="form-group">
                            <label>Your Name <span class="required">*</span></label>
                            <input type="text" name="customerName" id="customername" required>
                        </div>
                        <div class="form-group">
                            <label>Your Email <span class="required">*</span></label>
                            <input type="email" name="customerEmail" id="customerEmail" required>
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="contactSubject" id="contactSubject">
                        </div>
                        <div class="form-group mb-30">
                            <label>Your Message <span class="required">*</span></label></label>
                            <textarea name="contactMessage" id="contactMessage" ></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="submit">send</button>
                        </div>
                    </form>
                </div>
                <p class="form-messege"></p>
            </div>
        </div>
    </div>
</div>
@endsection