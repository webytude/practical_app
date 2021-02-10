@section('title','Create Application')
@extends('admin.layouts.form')
@section('main_contant')

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Application </h3>
                            </div>
                            <form action="{{ route('post.show_form') }}" method="post">
                                @csrf()

                                <div class="card-body">
                                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <div class="form-group">
                                        <span id="error" class="error invalid-feedback">{{$error}}</span>
                                    </div>
                                    @endforeach
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" rows="2" placeholder="Address" name="address" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="form-check d-inline">
                                            <input class="form-check-input" type="radio" value="M" name="gender">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input class="form-check-input" type="radio" value="F" name="gender">
                                            <label class="form-check-label">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control numeric" placeholder="Contact" name="contact" maxlength="11" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Education Details</label>
                                        <select class="form-control" name="education_detail" required>
                                            <option>Select</option>
                                            <option value="SSC">SSC</option>
                                            <option value="HSC">HSC</option>
                                            <option value="Graduation">Graduation</option>
                                            <option value="Post Graduation">Post Graduation</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" placeholder="Company Name" name="company_name[]" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Duration Month</label>
                                                <input type="text" class="form-control numeric" maxlength="2" placeholder="Duration Month" name="duration[]" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Location" name="location[]" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" placeholder="Designation" name="designation[]" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                <button type="button" class="btn btn-primary addMore"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row append_row">
                                    </div>
                                    <label>Langauge Known</label>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" class="english" id="english" name="english">
                                            <label for="english">English
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="english" class="english_class" name="english[read]">
                                            <label for="english">Read
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="english" class="english_class" name="english[write]">
                                            <label for="english">Write
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="english" class="english_class" name="english[speak]">
                                            <label for="english">Speak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="hindi" class="hindi" name="hindi">
                                            <label for="hindi">Hindi
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="hindi" class="hindi_class" name="hindi[read]">
                                            <label for="hindi">Read
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="hindi" class="hindi_class" name="hindi[write]">
                                            <label for="hindi">Write
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="hindi" class="hindi_class" name="hindi[speak]">
                                            <label for="hindi">Speak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="gujarati" class="gujarati" name="gujarati">
                                            <label for="gujarati">Gujarati
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[read]">
                                            <label for="gujarati">Read
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[write]">
                                            <label for="gujarati">Write
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[speak]">
                                            <label for="gujarati">Speak
                                            </label>
                                        </div>
                                    </div>
                                    <label>Technical Experience</label>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="php" class="php" name="skill[php]">
                                            <label for="php">PHP
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="php" class="php_class" name="skill[php]" value="beginer">
                                            <label for="beginer">Beginer
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="php" class="php_class" name="skill[php]" value="mideator">
                                            <label for="mideator">Mideator
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="php" class="php_class" name="skill[php]" value="expert">
                                            <label for="expert">Expert
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="mysql" class="mysql" name="skill[mysql]">
                                            <label for="mysql">Mysql
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="beginer">
                                            <label for="beginer">Beginer
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="mideator">
                                            <label for="mideator">Mideator
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="expert">
                                            <label for="expert">Expert
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="laravel" class="laravel" name="skill[laravel]">
                                            <label for="laravel">Laravel
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="beginer">
                                            <label for="beginer">Beginer
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="mideator">
                                            <label for="mideator">Mideator
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="expert">
                                            <label for="expert">Expert
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check d-inline">
                                            <input type="checkbox" id="oracle" class="oracle" name="skill[oracle]">
                                            <label for="oracle">Oracle
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="beginer">
                                            <label for="beginer">Beginer
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="mideator">
                                            <label for="mideator">Mideator
                                            </label>
                                        </div>
                                        <div class="form-check d-inline">
                                            <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="expert">
                                            <label for="expert">Expert
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Preffered Location</label>
                                        <select class="form-control" name="preferred_location" required>
                                            <option>Select</option>
                                            <option value="Gandhinagar">Gandhinagar</option>
                                            <option value="Ahmedabad">Ahmedabad</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Expected CTC</label>
                                        <input type="text" maxlength="10" class="form-control numeric" placeholder="Expected CTC" name="expected_ctc" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Current CTC</label>
                                        <input type="text" maxlength="10" class="form-control numeric" placeholder="Current CTC" name="current_ctc" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Notice Period</label>
                                        <input type="text" maxlength="2" class="form-control numeric" placeholder="Notice Period" name="notice_period" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('custom_scripts')
<script>
    $('.numeric').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $(document).on('click', '.addMore', function() {
        $.ajax({
            url: "{{ route('add_more') }}",
            type: "GET",
            data: {},
            success: function(value) {
                $('.append_row').append(value);
                $('.numeric').on('input', function(event) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            },
            error: function(value) {
                console.log('error');
            }
        });
    });

    $('.english_class').change(function() {
        if (this.checked) {
            $('.english').prop("checked", true);
        }
    });
    $('.hindi_class').change(function() {
        if (this.checked) {
            $('.hindi').prop("checked", true);
        }
    });
    $('.gujarati_class').change(function() {
        if (this.checked) {
            $('.gujarati').prop("checked", true);
        }
    });

    $('.php_class').change(function() {
        if (this.checked) {
            $('.php').prop("checked", true);
        }
    });
    $('.mysql_class').change(function() {
        if (this.checked) {
            $('.mysql').prop("checked", true);
        }
    });
    $('.laravel_class').change(function() {
        if (this.checked) {
            $('.laravel').prop("checked", true);
        }
    });
    $('.oracle_class').change(function() {
        if (this.checked) {
            $('.oracle').prop("checked", true);
        }
    });
</script>

@endsection
