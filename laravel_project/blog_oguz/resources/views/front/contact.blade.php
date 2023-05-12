<!-- Main Content-->
@extends('front.layouts.master')
@section('title', 'Iletisim')
@section('bg', 'https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/contact-bg.jpg')
@section('content')
    <div class="col-md-8">

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p>Bizimle iletisime gece bilirsiniz.</p>
        <div class="my-5">
            <form action="{{route('contact.post')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Ad Soyad</label>
                    <input class="form-control" value="{{old('name')}}" name="name" type="text"
                           placeholder="Enter your name..."
                           data-sb-validations="required"/>
                    {{--                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>--}}
                </div>
                <div class="mb-3">
                    <label for="email">Email Adresi</label>
                    <input class="form-control" value="{{old('email')}}" name="email" type="email"
                           placeholder="Enter your email..."
                           data-sb-validations="required,email"/>
                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                    {{--                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>--}}
                </div>
                <div class="mb-3">

                    <label for="phone">Konu</label>
                    <select class="form-control" name="topic">
                        <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                        <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                        <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                    </select>
                    {{--                    <div class="invalid-feedback" data-sb-feedback="phone:required"> </div>--}}


                </div>
                <div class="mb-3">
                    <label for="message">Mesajiniz</label>
                    <textarea class="form-control" name="message" placeholder="Mesajiniz..."
                              style="height: 12rem" data-sb-validations="required">{{old('message')}}</textarea>
                    {{--                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>--}}
                </div>
                <br/>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br/>
                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                </div>
                <!-- Submit Button-->
                <button class="btn btn-primary text-uppercase " name="submitButton" type="submit">Gonder</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                Adress:
            </div>
        </div>

    </div>

@endsection





