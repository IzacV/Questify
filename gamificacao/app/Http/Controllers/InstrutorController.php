<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InstrutorController extends Controller
{
    # - = - = - = - = | Index | = - = - = - = -
    public function index()
    {
        $instrutores = Instrutor::orderByDesc('id')->get();
        return view('intrutores.index', compact('instrutores'));
    }

    # - = - = - = - = | Create | = - = - = - = -
    public function create()
    {
        return view('instrutores.create');
    }

    # - = - = - = - = | Store | = - = - = - = -
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>['required', 'string', 'max:100'],
            'email'=>['required', 'string', 'email', 'unique:instrutores,email'],
            'senha'=>['required', 'string', 'min:4']
        ]);
        
        $dados = request->all();

        $dados['senha'] = Hash::make($request->senha);

        Instrutor::create($request->all());

        return redirect()->route('instrutores.index');
    }

    # - = - = - = - = | Edit | = - = - = - = -
    public function edit(Instrutor $instrutor)
    {
        return view('instrutores.edit', compact('instrutor'));
    }

     # - = - = - = - = | Update | = - = - = - = -
    public function update(Request $request, Instrutor $instrutor)
    {
        $request->validate([
            'nome'=>['required', 'string', 'max100'],
            'email'=>['required', 'string', 'email', Rule::unique('instrutores')->ignore($instrutor->id)],
            'senha'=>['nullable', 'string', 'min:4']
        ]);

        Instrutor::create($request->all());

        return redirect()->route('instrutores.index');
    }

    # - = - = - = - = | Destroy | = - = - = - = -
    public function destroy(Instrutor $instrutor)
    {
        $instrutor->delete();
        return redirect()->route('instrutores.index');
    }
}
