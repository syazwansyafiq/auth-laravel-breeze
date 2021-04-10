<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Managers\UserManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->manager = new UserManager;
    }

    public function index() {
        $data['users'] = $this->manager->getAll();
        return view('modules.users.index', $data);
    }

    public function create() {
        return view('modules.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $data = $request->all();
        $this->manager->create($data);
        return redirect('/users');
    }

    public function edit($id) {
        $data['user'] = $this->manager->find($id);
        return view('modules.users.edit', $data);
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        if(is_null($request->password)) {
            $data = $request->except(['password']);
        } else {
            $request->validate([
                'password' => 'required|string|confirmed|min:8',
            ]);
        }
        $this->manager->update($id, $data);
        return redirect('/users');
    }

    public function delete($id) {
        $this->manager->delete($id);
        return redirect('/users');
    }
}
