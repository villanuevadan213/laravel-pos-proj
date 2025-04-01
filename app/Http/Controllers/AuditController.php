<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Tracking;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index() {
        $audits = Audit::with('tracking')->orderBy('id','desc')->simplePaginate(10);

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

    public function store(Request $request)
    {
        // Get the submitted data from the textarea
        $data = $request->input('audit_data');
        
        // Split the data by line breaks
        $lines = explode("\n", $data);
    
        // Initialize the variables for each data field
        $tracking = '';
        $serial = '';
        $basket = '';
        $productControl = '';
        $title = '';
    
        // Ensure there are at least 5 lines
        if (count($lines) >= 5) {
            // Assign data based on the line number
            $tracking = trim(str_replace('Tracking #', '', $lines[0]));
            $serial = trim(str_replace('Serial #', '', $lines[1]));
            $basket = trim(str_replace('Basket #', '', $lines[2]));
            $productControl = trim(str_replace('Product Control #', '', $lines[3]));
            $title = trim($lines[4]); // The last line is the title
        }
    
        // Ensure that all required fields are provided
        if ($tracking && $serial && $basket && $productControl && $title) {
            // Retrieve the tracking record by tracking number
            $trackingRecord = Tracking::where('tracking_no', $tracking)->first();
    
            // If the tracking record exists
            if ($trackingRecord) {
                // Check if the audit with the same tracking_id already exists
                $audit = Audit::where('tracking_id', $trackingRecord->id)->first();
    
                if ($audit) {
                    // If the audit exists, update the existing audit
                    $audit->serial_no = $serial;
                    $audit->basket_no = $basket;
                    $audit->product_control_no = $productControl;
                    $audit->title = $title;
                    $audit->save();
    
                    // Optionally, add a success message for update
                    return redirect('/audits')->with('success', 'Audit updated successfully!');
                } else {
                    // If the audit doesn't exist, create a new audit record
                    $audit = new Audit();
                    $audit->title = $title;
                    $audit->product_control_no = $productControl;
                    $audit->basket_no = $basket;
                    $audit->serial_no = $serial;
                    $audit->tracking_id = $trackingRecord->id; // Use the tracking ID for the foreign key
                    $audit->save();
    
                    // Optionally, add a success message for creation
                    return redirect('/audits')->with('success', 'Audit created successfully!');
                }
            } else {
                // Optionally handle the case where the tracking number isn't found
                return redirect()->back()->with('error', 'Tracking number not found.');
            }
        } else {
            // Optionally handle validation failure for missing data
            return redirect()->back()->with('error', 'Please enter data.');
        }
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
            'missing_data' => ['nullable', 'string'],
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
