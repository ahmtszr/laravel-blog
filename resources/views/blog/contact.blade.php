@extends('layouts.app')

@section('content')


    <div class="container p-3">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-5 p-5">


                    <form action="{{ route('blog-contact-create.view') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset>
                            <legend class="text-center">İletişim</legend>

                            <!-- Name input-->
                            <div class="control-group col-12">
                                <label class="col-md-3 control-label" for="name">Ad</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" placeholder="Adınız" class="form-control">
                                </div>
                            </div>

                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="email">Email</label>
                                <div class="col-md-9">
                                    <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="control-group col-12 mt-2">
                                <label class="col-md-3 control-label" for="message">Mesajınız</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="message" name="message" placeholder="Lütfen mesajınızı yazın..." rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

