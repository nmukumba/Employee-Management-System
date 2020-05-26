@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Employee Contact Details
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Contact Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="/contact_details/{{ $contact_details->employee_id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="box-body">
                            <div>
                                <label for="phone">Phone</label>
                                <input type="tel"
                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                name="phone" 
                                id="phone"
                                value="{{ old('phone') ?? $contact_details->phone }}">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone_2">Phone 2</label>
                                <input type="text"
                                class="form-control {{ $errors->has('phone_2') ? ' is-invalid' : '' }}"
                                name="phone_2" 
                                id="phone_2"
                                value="{{ old('phone_2') ?? $contact_details->phone_2 }}">
                                @if ($errors->has('phone_2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_2') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="personal_email">Personal Email</label>
                                <input type="text" class="form-control {{ $errors->has('personal_email') ? ' is-invalid' : '' }}"
                                 name="personal_email"
                                 id="personal_email"
                                 value="{{ old('personal_email') ?? $contact_details->personal_email }}"
                                placeholder="Enter personal email">
                                 @if ($errors->has('personal_email'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('personal_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Work Email</label>
                                <input type="text" class="form-control {{ $errors->has('work_email') ? ' is-invalid' : '' }}"
                                 name="work_email"
                                 id="work_email"
                                 value="{{ old('work_email') ?? $contact_details->work_email }}"
                                placeholder="Enter work email">
                                 @if ($errors->has('work_email'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('work_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Postal Address</label>
                                <input type="text" class="form-control {{ $errors->has('postal_address') ? ' is-invalid' : '' }}"
                                 name="postal_address"
                                 id="postal_address"
                                 value="{{ old('postal_address') ?? $contact_details->postal_address }}"
                                placeholder="Enter postal address">
                                 @if ($errors->has('postal_address'))
                                 <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="physical_address">Physical Address</label>
                                <input type="text"
                                class="form-control {{ $errors->has('physical_address') ? ' is-invalid' : '' }}"
                                name="physical_address" 
                                id="physical_address"
                                value="{{ old('physical_address') ?? $contact_details->physical_address }}"
                                placeholder="Enter physical address">
                                @if ($errors->has('physical_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('physical_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="next_of_kin">Next of Kin</label>
                                <input type="text"
                                class="form-control {{ $errors->has('next_of_kin') ? ' is-invalid' : '' }}"
                                name="next_of_kin" 
                                id="next_of_kin"
                                value="{{ old('next_of_kin') ?? $contact_details->next_of_kin }}"
                                placeholder="Enter next of kin">
                                @if ($errors->has('next_of_kin'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('next_of_kin') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Next of Kin Relationship</label>
                                <input type="text"
                                class="form-control {{ $errors->has('next_of_kin_relationship') ? ' is-invalid' : '' }}"
                                name="next_of_kin_relationship" 
                                id="next_of_kin_relationship"
                                value="{{ old('next_of_kin_relationship') ?? $contact_details->next_of_kin_relationship }}"
                                placeholder="Enter relationship">
                                @if ($errors->has('next_of_kin_relationship'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('next_of_kin_relationship') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Next of Kin Phone</label>
                                <input type="text"
                                class="form-control {{ $errors->has('next_of_kin_phone') ? ' is-invalid' : '' }}"
                                name="next_of_kin_phone" 
                                id="next_of_kin_phone"
                                value="{{ old('next_of_kin_phone') ?? $contact_details->next_of_kin_phone }}">
                                @if ($errors->has('next_of_kin_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('next_of_kin_phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Next of Kin Email</label>
                                <input type="text"
                                class="form-control {{ $errors->has('next_of_kin_email') ? ' is-invalid' : '' }}"
                                name="next_of_kin_email" 
                                id="next_of_kin_email"
                                value="{{ old('next_of_kin_email') ?? $contact_details->next_of_kin_email }}"
                                placeholder="Enter email">
                                @if ($errors->has('next_of_kin_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('next_of_kin_email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Next of Kin Address</label>
                                <input type="text"
                                class="form-control {{ $errors->has('next_of_kin_address') ? ' is-invalid' : '' }}"
                                name="next_of_kin_address" 
                                id="next_of_kin_address"
                                value="{{ old('next_of_kin_address') ?? $contact_details->next_of_kin_address }}"
                                placeholder="Enter address">
                                @if ($errors->has('next_of_kin_address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('next_of_kin_address') }}</strong>
                                </span>
                                @endif
                            </div>
                           
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
@endsection