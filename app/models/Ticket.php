<?php

class Ticket extends \Eloquent {

	// Add your validation rules here
	//public static $rules = [
		// 'title' => 'required'
	//];

	// Don't forget to fill this array
	protected $fillable = [];

    protected $guarded = array();
    protected $table = 'tickets'; // table name
    public $timestamps = 'false' ; // to disable default timestamp fields

    // model function to store form data to database
    public static function saveFormData($data)
    {
        DB::table('tickets')->insert($data);
    }

    public function store()
    {
        $data =  Input::except(array('_token')) ;
        $rule  =  array(
            'domain'     => 'required',
            'email'      => 'email',
            'problem'   => 'required',
            'answer'  => 'required'
        ) ;

        $validator = Validator::make($data,$rule);

        if ($validator->fails())
        {
            return Redirect::to('ticket')
                ->withErrors($validator->messages());
        }
        else
        {
            Ticket::saveFormData(Input::except(array('_token','cpassword')));

            return Redirect::to('ticket')
                ->withMessage('Data inserted');
        }
    }
}