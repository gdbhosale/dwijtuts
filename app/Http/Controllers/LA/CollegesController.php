<?php
/**
 * Controller generated using LaraAdmin
 * Help: http://laraadmin.com
 * LaraAdmin is open-sourced software licensed under the MIT license.
 * Developed by: Dwij IT Solutions
 * Developer Website: http://dwijitsolutions.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\College;

class CollegesController extends Controller
{
    public $show_action = true;
    
    /**
     * Display a listing of the Colleges.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('Colleges');
        
        if(Module::hasAccess($module->id)) {
            return View('la.colleges.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => Module::getListingColumns('Colleges'),
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new college.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created college in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Module::hasAccess("Colleges", "create")) {
            
            $rules = Module::validateRules("Colleges", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Colleges", $request);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.colleges.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Display the specified college.
     *
     * @param int $id college ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("Colleges", "view")) {
            
            $college = College::find($id);
            if(isset($college->id)) {
                $module = Module::get('Colleges');
                $module->row = $college;
                
                return view('la.colleges.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('college', $college);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("college"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified college.
     *
     * @param int $id college ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("Colleges", "edit")) {
            $college = College::find($id);
            if(isset($college->id)) {
                $module = Module::get('Colleges');
                
                $module->row = $college;
                
                return view('la.colleges.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('college', $college);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("college"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified college in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id college ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Colleges", "edit")) {
            
            $rules = Module::validateRules("Colleges", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("Colleges", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.colleges.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified college from storage.
     *
     * @param int $id college ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("Colleges", "delete")) {
            College::find($id)->delete();
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.colleges.index');
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Server side Datatable fetch via Ajax
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function dtajax(Request $request)
    {
        $module = Module::get('Colleges');
        $listing_cols = Module::getListingColumns('Colleges');
        
        $values = DB::table('colleges')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('Colleges');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/colleges/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Colleges", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/colleges/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("Colleges", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.colleges.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }
}
