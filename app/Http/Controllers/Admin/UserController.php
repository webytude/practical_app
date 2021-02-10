<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\WorkExperience;
use App\Models\TechnicalExperience;
use App\Models\LanguageKnown;
use Redirect;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('is_admin', 0)->simplePaginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function view(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view', compact('user'));
    }

    public function delete(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->rel_language()->delete();
        $user->rel_technicalex()->delete();
        $user->rel_workex()->delete();
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::where('id', $id)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'address' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'education_detail' => 'required',
            'preferred_location' => 'required',
            'expected_ctc' => 'required',
            'current_ctc' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $user->rel_language()->delete();
        $user->rel_technicalex()->delete();
        $user->rel_workex()->delete();
        $user = $this->saveUsersData($request->all(), $user);

        if ($user) {
            $message = config('params.msg_success') . ' Success to submit application' . config('params.msg_success');
            $request->session()->flash('message', $message);
            if ($request->session()->has('userindex') && $request->session()->get('userindex') != "") {
                return Redirect::to($request->session()->get('userindex'));
            } else {
                return redirect()->route('admin.user.index');
            }
        }
    }

    public function saveUsersData($data, $user)
    {
        $userdetail = $this->userDetail($data);
        $user->update($userdetail);
        $we_array = $this->workExperience($data);
        $te_array = $this->technicalExperience($data);
        $lang = $this->langaugeKnown($data);

        if ($lang) {
            $user->rel_language()->saveMany($lang);
        }
        if ($te_array) {
            $user->rel_technicalex()->saveMany($te_array);
        }
        $user->rel_workex()->saveMany($we_array);
        return $user;
    }

    public function userDetail($data)
    {
        return $array =
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'address' => $data['address'],
                'gender' => $data['gender'],
                'contact' => $data['contact'],
                'preferred_location' => $data['preferred_location'],
                'education_detail' => $data['education_detail'],
                'current_ctc' => $data['current_ctc'],
                'expected_ctc' => $data['expected_ctc'],
                'notice_period' => $data['notice_period'],
            ];
    }

    public function langaugeKnown($data)
    {
        $lang_array = array();
        if (isset($data['english'])) {
            $lang = new LanguageKnown;
            $lang->language = 'english';
            if (isset($data['english']['read'])) {
                $lang->read = 1;
            }
            if (isset($data['english']['write'])) {
                $lang->write = 1;
            }
            if (isset($data['english']['speak'])) {
                $lang->speak = 1;
            }
            $lang_array[]  = $lang;
        }
        if (isset($data['hindi'])) {
            $lang = new LanguageKnown;
            $lang->language = 'hindi';
            if (isset($data['hindi']['read'])) {
                $lang->read = 1;
            }
            if (isset($data['hindi']['write'])) {
                $lang->write = 1;
            }
            if (isset($data['hindi']['speak'])) {
                $lang->speak = 1;
            }
            $lang_array[]  = $lang;
        }
        if (isset($data['gujarati'])) {
            $lang = new LanguageKnown;
            $lang->language = 'gujarati';
            if (isset($data['gujarati']['read'])) {
                $lang->read = 1;
            }
            if (isset($data['gujarati']['write'])) {
                $lang->write = 1;
            }
            if (isset($data['gujarati']['speak'])) {
                $lang->speak = 1;
            }
            $lang_array[]  = $lang;
        }
        return $lang_array;
    }

    public function workExperience($data)
    {
        $we_array = array();
        if ($data['company_name']) {
            foreach ($data['company_name']  as $k => $d) {
                $we = new WorkExperience;
                $we->company_name = $data['company_name'][$k] ?? null;
                $we->duration = $data['duration'][$k] ?? null;
                $we->location = $data['location'][$k] ?? null;
                $we->designation = $data['designation'][$k] ?? null;
                $we_array[] = $we;
            }
        }
        return $we_array;
    }

    public function technicalExperience($data)
    {
        $te_array = array();
        if (isset($data['skill']) && $data['skill']) {
            foreach ($data['skill']  as $k => $d) {
                $te = new TechnicalExperience;
                $te->skill = $k ?? null;
                $te->stage = isset($d) ? $d : null;
                $te_array[] = $te;
            }
        }
        return $te_array;
    }
}
