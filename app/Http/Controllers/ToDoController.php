<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDo\CreateRequest;
use App\Http\Requests\ToDo\StoreRequest;
use App\Http\Requests\ToDo\UpdateRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ToDoを取得する
        $todos = ToDo::get();
        
        //取得したToDoを返却する
        return view('index', ['todos' => $todos]);
    }

    public function create(Request $request)
    {
        $this->validate($request, ToDo::$rules);
        $todo = new ToDo;
        $form = $request->all();
        unset($form['_token_']);
        $todo->fill($form)->save();
        return redirect('/');
    }


    public function update(Request $request)
    {
        $this->validate($request, ToDo::$rules);
        $form = $request->all();
        //$form = $request->all();
        unset($form['_token']);
        ToDo::where('id', $request->id)->update($form);;
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $form = $request->all();
        ToDo::find($request->id)->delete($form);
        return redirect('/');
    }
}
