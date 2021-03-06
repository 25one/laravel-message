@extends('front.layout')

@section('css')
<style>
.form-group.has-error label{color:#dd4b39}
.form-group.has-error .help-block{color:#dd4b39}
</style>    
@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            @if (session('message-ok'))
                @component('front.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('message-ok') !!}
                @endcomponent
            @endif
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    @yield('form-open')
                    <div class="box-body">
                        <div class="">
                            <label for="name">@lang('User Name')</label>
                            <h4>{{auth()->user()->name}}</h4>
                        </div>
                        <div class="">
                            <label for="name">@lang('Date of visit')</label>
                            <h4>{{date('Y-m-d')}}</h4>
                        </div>                                              
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="name">@lang('Title')</label>
                            <input type="text" class="form-control" id="title" name="title" value="@if(old('title')){{old('title')}}@endif" placeholder="Title"> 
                            {!! $errors->first('title', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label for="name">@lang('Message')</label>
                            <input type="text" class="form-control" id="message" name="message" value="@if(old('message')){{old('message')}}@endif" placeholder="Message"> 
                            {!! $errors->first('message', '<small class="help-block">:message</small>') !!}
                        </div>              
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
@endsection

