<?php

function do_upload()
	{
		$file = 'mod/'.date('d-m-Y His').'.jpg';
	    $res = $this->base64_to_jpeg($this->input->post('file1'),$file);
	    if ($res != false)
	    {
	    	echo $res;
	    }
	    else
	    {
	    	echo "gagal";
	    }
	}


function base64_to_jpeg($base64_string,$output_file) {
	    $data = explode( ',', $base64_string );
	    var_dump($data);
	    if ($data[0] != '')
	    {
	    	$ifp = fopen( $output_file, 'wb' ); 
		    // we could add validation here with ensuring count( $data ) > 1
		    fwrite($ifp, base64_decode($data[ 1 ]));
		    // clean up the file resource
		    fclose( $ifp ); 

		    return $output_file; 
	    }
	    else
	    {
	    	return false;
	    }
	}
