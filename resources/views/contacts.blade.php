@extends('layouts.app')

@section('content')
<div class="container">
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Contact Us</h2>
                <form>
                    <br>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection
