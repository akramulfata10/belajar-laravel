@extends('layout')

@section('main')

<!-- main -->
<main class="container">
    <section id="contact-us">
        <h1>Get in Touch!</h1>
        {{-- flash message --}}
        @include('includes.flash-message')
        <!-- contact info -->
        <div class="container">
            <div class="contact-info">
                <div class="specific-info">
                    <a href="https://www.google.com/maps/place/Politeknik+Negeri+Lhokseumawe/@5.120625,97.1561776,17z/data=!3m1!4b1!4m5!3m4!1s0x304777a35c813bbf:0xfac9e2831347f07f!8m2!3d5.120625!4d97.1583663"> <i class="fas fa-home"></i></a>
                    <div>
                        <p class="title">Politeknik Negeri Lhokseumawe</p>
                    </div>
                </div>
                <div class="specific-info">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <a href="http://whatsapp.com/081262327643">+62 812 6232 7643 </a>
                        <br />
                    </div>
                </div>
                <div class="specific-info">
                    <i class="fas fa-envelope-open-text"></i>
                    <div>
                        <a href="mailto:adilahfika24@gmail.com">
                            <p class="title">adilahfika24@gmail.com</p>
                        </a>
                        <p class="subtitle">Kirimkan pertanyaan anda kapan saja!</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf 
                    <!-- Name -->
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror

                    <!-- Email -->
                    <label for="email"><span>Email</span></label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror

                    <!-- Subject -->
                    <label for="subject"><span>Subject</span></label>
                    <input type="text" id="Subject" name="subject" value="{{ old('subject') }}" />
                    @error('subject')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror
                    <!-- Message -->
                    <label for="message"><span>Message</span></label>
                    <textarea id="message" name="message">{{ old('message') }}</textarea>
                    @error('message')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror
                    <!-- Button -->
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
