<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index() {
        $audits = Audit::all();

        return view('audits.index', [
            'audits' => $audits
        ]);
    }

    public function create() {
        return view('audits.create');
    }

    public function show(Audit $audit) {
        return view('audits.show', ['audit' => $audit]);
    }

    public function store() {
        request()->validate([
            'title' => ['required'],
            'product_control_no' => ['required'],
            'basket_no' => ['required'],
            'serial_no' => ['required'],
            'tracking_no' => ['required'],
        ]);

        Audit::create([
            'title' => request('title'),
            'product_control_no' => request('product_control_no'),
            'basket_no' => request('basket_no'),
            'serial_no' => request('serial_no'),
            'tracking_no' => request('tracking_no'),
        ]);

        return redirect('/audits');
    }

    public function edit(Audit $audit) {
        return view('audits.edit', ['audit' => $audit]);
    }

    public function update(Audit $audit) {
        request()->validate([
            'title' => ['required'],
            'product_control_no' => ['required'],
            'basket_no' => ['required'],
            'serial_no' => ['required'],
            'tracking_no' => ['required'],
        ]);

        $audit->update([
            'title' => request('title'),
            'product_control_no' => request('product_control_no'),
            'basket_no' => request('basket_no'),
            'serial_no' => request('serial_no'),
            'tracking_no' => request('tracking_no'),
        ]);

        return redirect('/audits');
    }

    public function destroy(Audit $audit) {
    }
}
