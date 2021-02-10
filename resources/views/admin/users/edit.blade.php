@section('title', "Dashboard" )
@extends('admin.layouts.main')
@section('main_contant')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User </h3>
                    </div>
                    <form action="{{ route('admin.user.update',$user->id) }}" method="post">
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
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="2" placeholder="Address" name="address" required>{{ $user->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" value="M" name="gender" {{ $user->gender == 'M'?"checked":"" }}>
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" value="F" name="gender" {{ $user->gender == 'F'?"checked":"" }}>
                                    <label class="form-check-label">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control numeric" placeholder="Contact" name="contact" maxlength="11" value="{{ $user->contact }}" required>
                            </div>
                            <div class="form-group">
                                <label>Education Details</label>
                                <select class="form-control" name="education_detail" required>
                                    <option>Select</option>
                                    <option value="SSC" {{ $user->education_detail == 'SSC'?"selected":"" }}>SSC</option>
                                    <option value="HSC" {{ $user->education_detail == 'HSC'?"selected":"" }}>HSC</option>
                                    <option value="Graduation" {{ $user->education_detail == 'Graduation'?"selected":"" }}>Graduation</option>
                                    <option value="Post Graduation" {{ $user->education_detail == 'Post Graduation'?"selected":"" }}>Post Graduation</option>
                                </select>
                            </div>
                            <div class="row">
                                @foreach($user->rel_workex as $k => $we)
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" class="form-control" placeholder="Company Name" name="company_name[]" value="{{ $we->company_name }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Duration Month</label>
                                        <input type="text" class="form-control numeric" maxlength="2" placeholder="Duration Month" name="duration[]" value="{{ $we->duration }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" placeholder="Location" name="location[]" value="{{ $we->location }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" placeholder="Designation" name="designation[]" value="{{ $we->designation }}" required>
                                    </div>
                                </div>
                                @if($k == 0)
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                        <button type="button" class="btn btn-primary addMore"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="row append_row">
                            </div>
                            <label>Langauge Known</label>
                            <div class="form-group">
                                @php
                                $e_check = "";
                                $e_read = "";
                                $e_write = "";
                                $e_speak = "";
                                foreach($user->rel_language as $lang){
                                if($lang->language == 'english'){
                                $e_check = "checked";
                                $e_read = $lang->read == 1?'checked':'';
                                $e_write = $lang->write == 1?'checked':'';
                                $e_speak = $lang->speak == 1?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" class="english" id="english" name="english" {{ $e_check }}>
                                    <label for="english">English
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="english" class="english_class" name="english[read]" {{ $e_read }}>
                                    <label for="english">Read
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="english" class="english_class" name="english[write]" {{ $e_write }}>
                                    <label for="english">Write
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="english" class="english_class" name="english[speak]" {{ $e_speak }}>
                                    <label for="english">Speak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                @php
                                $h_check = "";
                                $h_read = "";
                                $h_write = "";
                                $h_speak = "";
                                foreach($user->rel_language as $lang){
                                if($lang->language == 'hindi'){
                                $h_check = "checked";
                                $h_read = $lang->read == 1?'checked':'';
                                $h_write = $lang->write == 1?'checked':'';
                                $h_speak = $lang->speak == 1?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="hindi" class="hindi" name="hindi" {{ $h_check }}>
                                    <label for="hindi">Hindi
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="hindi" class="hindi_class" name="hindi[read]" {{ $h_read }}>
                                    <label for="hindi">Read
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="hindi" class="hindi_class" name="hindi[write]" {{ $h_write }}>
                                    <label for="hindi">Write
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="hindi" class="hindi_class" name="hindi[speak]" {{ $h_speak }}>
                                    <label for="hindi">Speak
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                @php
                                $g_check = "";
                                $g_read = "";
                                $g_write = "";
                                $g_speak = "";
                                foreach($user->rel_language as $lang){
                                if($lang->language == 'gujarati'){
                                $g_check = "checked";
                                $g_read = $lang->read == 1?'checked':'';
                                $g_write = $lang->write == 1?'checked':'';
                                $g_speak = $lang->speak == 1?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="gujarati" class="gujarati" name="gujarati" {{ $g_check }}>
                                    <label for="gujarati">Gujarati
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[read]" {{ $g_read }}>
                                    <label for="gujarati">Read
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[write]" {{ $g_write }}>
                                    <label for="gujarati">Write
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="gujarati" class="gujarati_class" name="gujarati[speak]" {{ $g_speak }}>
                                    <label for="gujarati">Speak
                                    </label>
                                </div>
                            </div>
                            <label>Technical Experience</label>
                            <div class="form-group">
                                @php
                                $p_skill = "";
                                $p_beginer = "";
                                $p_mideator = "";
                                $p_expert = "";
                                foreach($user->rel_technicalex as $te){
                                if($te->skill == "php"){
                                $p_skill = "checked";
                                $p_beginer = $te->stage == 'beginer'?'checked':'';
                                $p_mideator = $te->stage == 'mideator'?'checked':'';
                                $p_expert = $te->stage == 'expert'?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="php" class="php" name="skill[php]" {{ $p_skill }}>
                                    <label for="php">PHP
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="php" class="php_class" name="skill[php]" value="beginer" {{ $p_beginer }}>
                                    <label for="beginer">Beginer
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="php" class="php_class" name="skill[php]" value="mideator" {{ $p_mideator }}>
                                    <label for="mideator">Mideator
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="php" class="php_class" name="skill[php]" value="expert" {{ $p_expert }}>
                                    <label for="expert">Expert
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                @php
                                $m_skill = "";
                                $m_beginer = "";
                                $m_mideator = "";
                                $m_expert = "";
                                foreach($user->rel_technicalex as $te){
                                if($te->skill == "mysql"){
                                $m_skill = "checked";
                                $m_beginer = $te->stage == 'beginer'?'checked':'';
                                $m_mideator = $te->stage == 'mideator'?'checked':'';
                                $m_expert = $te->stage == 'expert'?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="mysql" class="mysql" name="skill[mysql]" {{ $m_skill }}>
                                    <label for="mysql">Mysql
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="beginer" {{ $m_beginer }}>
                                    <label for="beginer">Beginer
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="mideator" {{ $m_mideator }}>
                                    <label for="mideator">Mideator
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="mysql" class="mysql_class" name="skill[mysql]" value="expert" {{ $m_expert }}>
                                    <label for="expert">Expert
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                @php
                                $l_skill = "";
                                $l_beginer = "";
                                $l_mideator = "";
                                $l_expert = "";
                                foreach($user->rel_technicalex as $te){
                                if($te->skill == "laravel"){
                                $l_skill = "checked";
                                $l_beginer = $te->stage == 'beginer'?'checked':'';
                                $l_mideator = $te->stage == 'mideator'?'checked':'';
                                $l_expert = $te->stage == 'expert'?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="laravel" class="laravel" name="skill[laravel]" {{ $l_skill }}>
                                    <label for="laravel">Laravel
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="beginer" {{ $l_beginer }}>
                                    <label for="beginer">Beginer
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="mideator" {{ $l_mideator }}>
                                    <label for="mideator">Mideator
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="laravel" class="laravel_class" name="skill[laravel]" value="expert" {{ $l_expert }}>
                                    <label for="expert">Expert
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                @php
                                $o_skill = "";
                                $o_beginer = "";
                                $o_mideator = "";
                                $o_expert = "";
                                foreach($user->rel_technicalex as $te){
                                if($te->skill == "laravel"){
                                $o_skill = "checked";
                                $o_beginer = $te->stage == 'beginer'?'checked':'';
                                $o_mideator = $te->stage == 'mideator'?'checked':'';
                                $o_expert = $te->stage == 'expert'?'checked':'';
                                }
                                }
                                @endphp
                                <div class="form-check d-inline">
                                    <input type="checkbox" id="oracle" class="oracle" name="skill[oracle]" {{ $o_skill }}>
                                    <label for="oracle">Oracle
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="beginer" {{ $o_beginer }}>
                                    <label for="beginer">Beginer
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="mideator" {{ $o_mideator }}>
                                    <label for="mideator">Mideator
                                    </label>
                                </div>
                                <div class="form-check d-inline">
                                    <input type="radio" id="oracle" class="oracle_class" name="skill[oracle]" value="expert" {{ $o_expert }}>
                                    <label for="expert">Expert
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Preffered Location</label>
                                <select class="form-control" name="preferred_location" required>
                                    <option>Select</option>
                                    <option value="Gandhinagar" {{ $user->preferred_location == 'Gandhinagar'?"selected":"" }}>Gandhinagar</option>
                                    <option value="Ahmedabad" {{ $user->preferred_location == 'Ahmedabad'?"selected":"" }}>Ahmedabad</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Expected CTC</label>
                                <input type="text" maxlength="10" class="form-control numeric" placeholder="Expected CTC" name="expected_ctc" value="{{ $user->expected_ctc }}" required>
                            </div>
                            <div class="form-group">
                                <label>Current CTC</label>
                                <input type="text" maxlength="10" class="form-control numeric" placeholder="Current CTC" name="current_ctc" value="{{ $user->current_ctc }}" required>
                            </div>
                            <div class="form-group">
                                <label>Notice Period</label>
                                <input type="text" maxlength="2" class="form-control numeric" placeholder="Notice Period" name="notice_period" value="{{ $user->notice_period }}" required>
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
